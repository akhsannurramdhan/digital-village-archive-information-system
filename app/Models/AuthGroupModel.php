<?php 
namespace App\Models;

use CodeIgniter\Model;

class AuthGroupModel extends Model
{
    protected $table = 'auth_groups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name']; // Sesuaikan dengan kolom yang ada

    public function updateUser($userId, $roleId)
    {
        // Hapus role lama dan tambahkan role baru
        $this->db->table('auth_groups_users')->where('user_id', $userId)->delete();
        return $this->db->table('auth_groups_users')->insert(['user_id' => $userId, 'group_id' => $roleId]);
    }
}
