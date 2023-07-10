<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class frontend extends BaseController
{
    protected $jbModel;
    protected $pbModel;
    public function __construct()
    {
        $this->jbModel = new \App\Models\jbModel();
        $this->pbModel = new \App\Models\pbModel();
    }

    public function edit_beasiswa()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/edit-beasiswa',$data);
    }
    public function dashboard()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/dashboard',$data);
    }
    public function beasiswa()
    {
        $jb = $this->jbModel->findAll();

        $data = [
            'title' => 'MB UG',
            'jb' => $jb,
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/daftar-jenis-beasiswa',$data);
    }
    public function penerima()
    {
        $pb = $this->pbModel->findAll();
        $data = [
            'title' => 'MB UG',
            'pb' => $pb,
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/data-penerima-beasiswa',$data);
    }
    public function akademik()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/laporan-akademik',$data);
    }
    public function mbkm()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/laporan-mbkm',$data);
    }
    public function prestasi()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/laporan-prestasi',$data);
    }
    public function log_aktivitas()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/log-aktivitas-pengguna',$data);
    }
    public function manajemen()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/manajemen-pengguna',$data);
    }
    public function tambah_data()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/tambah-data',$data);
    }
    public function tambah_user()
    {
        $data = [
            'title' => 'MB UG',
        ];
        // dd($data);
        // Redirect atau tampilkan pesan sukses
        // app\Views\main\dashboard.php
        return view('main/tambah-user',$data);
    }
}
