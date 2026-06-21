<?php

namespace App\Controllers;
use Myth\Auth\Config\Auth as AuthConfig;

class Login extends BaseController
{
    public function index(): string
    {
        $config = new AuthConfig();
        return view('auth/login', ['config' => $config]);
    }
}
