<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 'arsip';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_surat', 'judul_surat', 'jenis_surat', 'tipe_surat', 'penginput', 'file_surat'
    ];

    public function getArsipById($id)
    {
        return $this->where('id', $id)->first();
    }
    
    public function addArsip($data)
    {
        return $this->save($data);
    }
}
