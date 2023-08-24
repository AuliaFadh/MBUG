<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('/user/login'));
    }

    public function admin_index()
    {
        return redirect()->to(base_url('/admin/login'));
    }
}
