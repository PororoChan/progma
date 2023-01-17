<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Page | ProgMa',
        ];
        return view('v_login', $data);
    }

    public function loginAuth()
    {
    }
}
