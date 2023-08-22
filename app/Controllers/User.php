<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $jbModel;
    protected $pbModel;
    protected $laModel;
    protected $lpModel;
    protected $kaModel;
    protected $mbkmModel;
    protected $lgfModel;
    protected $userModel;
    protected $loginModel;
    protected $newsModel;
    protected $logModel;
    public function __construct()
    {
        $this->jbModel = new \App\Models\jbModel();
        $this->pbModel = new \App\Models\pbModel();
        $this->laModel = new \App\Models\laModel();
        $this->lpModel = new \App\Models\lpModel();
        $this->kaModel = new \App\Models\kaModel();
        $this->mbkmModel = new \App\Models\mbkmModel();
        $this->lgfModel = new \App\Models\lgfModel();
        $this->userModel = new \App\Models\userModel();
        $this->loginModel = new \App\Models\loginModel();
        $this->newsModel = new \App\Models\newsModel();
        $this->logModel = new \App\Models\logModel();
    }
    public function user_login()
    {
        $data = [
            'title' => 'Login Penerima Beasiswa | MBUG',
        ];

        return view('user-main/user-login', $data);
    }

    public function user_login_check()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $check = $this->loginModel->login_check($username, $password);

        if (is_null($check)) {
            session()->setFlashdata('no_data', 'Username atau Password Salah');
            return redirect()->to(base_url('/user/login'));
        } elseif ($check["hak_akses"] == "0") {
            $datalog = [
                'log_last_login' => $this->logModel->getCurrentDate(),
                'log_username' => $check["username"],
            ];
            $this->logModel->InsertData($datalog);


            $datamnj = [
                'id_user' => $check["id_user"],
                'username' => $check["username"],
                'password' => $check["password"],
                'hak_akses' => $check["hak_akses"],
                'last_login' => $this->userModel->getCurrentDate(),
                'status_user' => $check["status_user"],
            ];
            $this->userModel->UpdateData($check["id_user"], $datamnj);

            dd($check);
        } elseif ($check["hak_akses"] == "1") {
            session()->setFlashdata('admin', 'Akun terdaftar sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
    }

    public function user_home()
    {

        $data = [
            'title' => 'Dashboard | MBUG',
        ];

        return view('user-main/dashboard', $data);
    }
    public function  user_profile()
    {

        $data = [
            'title' => 'Profile | MBUG',
        ];

        return view('user-main/user-profile', $data);
    }

    public function user_akademik()
    {
        $la = $this->laModel->AllData();
        $data = [
            'title' => 'Akademik | MBUG',
            'la' => $la,
        ];

        return view('user-main/laporan-akademik', $data);
    }
    public function user_add_akademik()
    {
        $data = [
            'title' => 'Form Input Akademik | User',
        ];

        return view('user-main/tambah-akademik', $data);
    }

    public function user_save_akademik()
    {

    }

    public function user_edit_akademik()
    {
        $data = [
            'title' => 'Form edit Akademik | User',
        ];

        return view('user-main/edit-akademik', $data);
    }

    public function user_mbkm()
    {
        $mbkm = $this->mbkmModel->AllData();
        $data = [
            'title' => 'Magang Bersertifikat Kampus Merdeka | MBUG',
            'mbkm' => $mbkm,
        ];

        return view('user-main/laporan-mbkm', $data);
    }
    public function user_add_mbkm()
    {
        $data = [
            'title' => 'Form Input MBKM | User',
        ];

        return view('user-main/tambah-mbkm', $data);
    }

    public function user_edit_mbkm()
    {
        $data = [
            'title' => 'Form Edit MBKM | User',
        ];

        return view('user-main/edit-mbkm', $data);
    }


    public function user_prestasi()
    {
        $lp = $this->lpModel->AllData();
        $data = [
            'title' => 'Laporan Prestasi | MBUG',
            'lp' => $lp,
        ];

        return view('user-main/laporan-prestasi', $data);
    }
    public function user_add_prestasi()
    {
        $data = [
            'title' => 'Form Input Prestasi | User',
        ];

        return view('user-main/tambah-prestasi', $data);
    }
    public function user_edit_prestasi()
    {
        $data = [
            'title' => 'Form Edit Prestasi | User',
        ];

        return view('user-main/edit-prestasi', $data);
    }

    public function user_keaktifan()
    {
        $ka = $this->kaModel->AllData();
        $data = [
            'title' => 'Keaktifan per Semester | MBUG',
            'ka' => $ka,
        ];

        return view('user-main/keaktifan', $data);
    }
    public function user_add_keaktifan()
    {
        $data = [
            'title' => 'Form Input Keaktifan | User',
        ];
        return view('user-main/tambah-keaktifan', $data);
    }
    public function user_edit_keaktifan()
    {
        $data = [
            'title' => 'Form Edit Keaktifan per Semester | User',
        ];

        return view('user-main/edit-keaktifan', $data);
    }

    public function user_panduan()
    {
        $data = [
            'title' => 'Buku Panduan | MBUG',
        ];

        return view('user-main/panduan', $data);
    }
}
