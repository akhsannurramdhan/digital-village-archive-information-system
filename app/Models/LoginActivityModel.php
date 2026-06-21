<?php 
namespace App\Models;

use CodeIgniter\Model;

class LoginActivityModel extends Model
{
    protected $table = 'auth_logins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'ip_address', 'user_agent', 'date', 'success'];
    protected $returnType = 'array';
}
