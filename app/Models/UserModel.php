<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';       
    protected $primaryKey = 'id';       
    protected $useTimestamps = true;     

    protected $allowedFields = ['fullname', 'username', 'email', 'password_hash','jabatan', 'role'];

   
    public function createUser($data)
    {
        // Simpan data ke dalam database
        return $this->insert($data);
    }
}
