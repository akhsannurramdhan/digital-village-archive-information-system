<?php

namespace App\Controllers;

use App\Models\UserModel as UserModel;
use Myth\Auth\Models\GroupModel as GroupModel;
use App\Models\AuthGroupModel as AuthGroupModel;
use Myth\Auth\Config\Auth as AuthConfig;
use App\Models\LoginActivityModel;
use Myth\Auth\Password as Password;


class Admin extends BaseController
{
    protected $db, $builder, $authGroupModel, $UserModel;


    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->authGroupModel = new AuthGroupModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        if (!logged_in()) {
            return redirect()->to('/login');
        }

        $userId = user_id(); 
        $loginActivityModel = new LoginActivityModel();

        $data['loginActivities'] = $loginActivityModel->where('user_id', $userId)->findAll();

        return view('profile', $data);
    }
    public function user_list()
    {
        $data['title'] = 'User List';

        $this->builder->select('users.id as userid, username, email, fullname, user_image, jabatan, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/user_list', $data);
    }
    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';


        $this->builder->select('users.id as userid, username, email, fullname, user_image, jabatan, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }

    public function addUser()
    {
        $this->builder->select('auth_groups.id as role_id, auth_groups.name as role_name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->groupBy('auth_groups.id');

        $query = $this->builder->get();
        $data['roles'] = $query->getResult();

        return view('admin/addUser', $data);
    }
    public function saveUser()
    {
        $userModel = new UserModel();
        $groupModel = new GroupModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'fullname' => 'required|min_length[3]',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'role'     => 'required',
            'jabatan'     => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $hashedPassword = Password::hash($this->request->getVar('password'));
        log_message('debug', 'Hashed password: ' . $hashedPassword); 

        // Data user
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'jabatan'  => $this->request->getVar('jabatan'), 
            'active'   => 1,
            'password_hash' => $hashedPassword,
        ];

        log_message('debug', 'User Data: ' . print_r($data, true)); 

        $userId = $userModel->insert($data);

        if ($userId) {
            $role = $this->request->getVar('role');
            $groupModel->addUserToGroup($userId, $role);

            return redirect()->to('/admin/user_list')->with('success', 'Pengguna berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal menyimpan data pengguna.');
    }


    public function editUser($id = 0)
    {
        $data['title'] = 'Edit User';
    
        $this->builder->select('users.id as id, fullname, username, email, jabatan, auth_groups_users.group_id as role, auth_groups.name as role_name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
    
        $data['user'] = $query->getRow();
    
        if (empty($data['user'])) {
            return redirect()->to('/admin/user_list')->with('error', 'User tidak ditemukan.');
        }
    
        $data['roles'] = $this->authGroupModel->findAll();
    
        return view('admin/editUser', $data);
    }
    
    public function updateUser($id)
{
    $userModel = new UserModel();
    $authGroupModel = new AuthGroupModel();

    $validation = \Config\Services::validation();
    $validation->setRules([
        'fullname' => 'required|min_length[3]',
        'username' => 'required',
        'email'    => 'required|valid_email',
        'jabatan'  => 'required',
        'role'     => 'required'
    ]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $newData = [
        'fullname' => $this->request->getPost('fullname'),
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'jabatan'  => $this->request->getPost('jabatan'),
    ];

    if ($this->request->getPost('password')) {
        $newData['password_hash'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $userModel->update($id, $newData);

    $role = $this->request->getPost('role');
    $authGroupModel->UpdateUser($id, $role);

    return redirect()->to('/admin/user_list')->with('success', 'User berhasil diperbarui.');
}






    public function deleteUser($id)
    {
        // Inisialisasi UserModel
        $userModel = new UserModel();

        // Hapus data user berdasarkan ID
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/user_list')->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->to('/admin/user_list')->with('error', 'Gagal menghapus user.');
        }
    }
}
?>