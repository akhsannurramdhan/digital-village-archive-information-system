<?php 
namespace App\Models;

use CodeIgniter\Model;

class UpdateUser extends Model
{
    protected $table = 'auth_groups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name']; 


public function UpdateUser($userId, $roleId)
{
    // Hapus role lama dan tambahkan role baru
    $this->db->table('user_roles')->where('user_id', $userId)->delete();
    return $this->db->table('user_roles')->insert(['user_id' => $userId, 'role_id' => $roleId]);
}

}