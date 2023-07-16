<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{

    public function user_login()
    {

        $data = [
            'title' => 'Login Penerima Beasiswa | MBUG',
        ];

        return view('user-main/user-login', $data);
    }
    public function home()
    {

        $data = [
            'title' => 'Dashboard | MBUG',
        ];

        return view('user-main/dashboard', $data);
    }
    public function keaktifan()
    {

        $data = [
            'title' => 'Dashboard | MBUG',
        ];

        return view('user-main/keaktifan', $data);
    }
}
