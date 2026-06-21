<?php

namespace App\Controllers;

use Myth\Auth\Config\Auth as AuthConfig;
use App\Models\LoginActivityModel;
use App\Models\ArsipModel;

class User extends BaseController
{
    public function index(): string
    {
        if (!logged_in()) {
            return redirect()->to('/login');
        }

        $userId = user_id();

        $loginActivityModel = new LoginActivityModel();
        $arsipModel = new ArsipModel();
        $userModel = new \Myth\Auth\Models\UserModel();

        $data['loginActivities'] = $loginActivityModel->where('user_id', $userId)->findAll();

        $data['totalUsers'] = $userModel->countAllResults();

        $data['totalArsip'] = $arsipModel->countAllResults();

        $data['arsipByUser'] = $arsipModel->where('penginput', user()->fullname)->countAllResults();

        $data['suratMasuk'] = $arsipModel->where('tipe_surat', 'Surat Masuk')->countAllResults();
        $data['suratKeluar'] = $arsipModel->where('tipe_surat', 'Surat Keluar')->countAllResults();

        return view('user/index', $data);
    }
}
