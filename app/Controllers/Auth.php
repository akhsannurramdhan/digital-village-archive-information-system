<?php

namespace App\Controllers;
use Myth\Auth\Config\Auth as AuthConfig;

class Auth extends BaseController
{
    public function index(): string
    {
        $config = new AuthConfig();
        return view('user/index', ['config' => $config]);
    }
}
