<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $jbModel;
    protected $pbModel;
    protected $laModel;
    protected $lpModel;
    protected $kaModel;
    protected $mbkmModel;
    protected $lgfModel;
    protected $mnjModel;
    public function __construct()
    {
        $this->jbModel = new \App\Models\jbModel();
        $this->pbModel = new \App\Models\pbModel();
        $this->laModel = new \App\Models\laModel();
        $this->lpModel = new \App\Models\lpModel();
        $this->kaModel = new \App\Models\kaModel();
        $this->mbkmModel = new \App\Models\mbkmModel();
        $this->lgfModel = new \App\Models\lgfModel();
        $this->mnjModel = new \App\Models\mnjModel();
    }

    public function login_admin()
    {

        $data = [
            'title' => 'Login | MBUG',
        ];

        return view('main/admin-login', $data);
    }
    public function profile_admin()
    {

        $data = [
            'title' => 'Profile | MBUG',
        ];

        return view('main/admin-profile', $data);
    }
    public function home()
    {

        $data = [
            'title' => 'Dashboard | MBUG',
        ];

        return view('main/dashboard', $data);
    }


    public function beasiswa()
    {
        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Jenis Beasiswa | MBUG',
            'jb' => $jb,
        ];

        return view('main/daftar-jenis-beasiswa', $data);
    }

    public function add_beasiswa()
    {
        $data = [
            'title' => 'Form Input Beasiswa',
            'validation' => \Config\Services::validation(),
        ];

        return view('/main/tambah-beasiswa', $data);
    }

    public function edit_beasiswa($id_beasiswa)
    {
        $data = [
            'title' => 'Form Edit Beasiswa | MBUG',
            'mhs' => $this->jbModel->DetailData($id_beasiswa),
        ];

        return view('main/edit-beasiswa', $data);
    }

    public function save_beasiswa()
    {
        if ($this->validate([
            'jenis' => 'required|is_unique[jenis_beasiswa.jenis]',
            'asal' => 'required',
            'tahun' => 'required',
        ])) {
            $data = [
                'jenis' => $this->request->getPost('jenis'),
                'asal' => $this->request->getPost('asal'),
                'tahun_penerimaan' => $this->request->getPost('tahun'),
                'status_beasiswa' => $this->request->getPost('status'),
            ];

            $this->jbModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/beasiswa'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Add User | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-beasiswa', $data);
        }
    }

    public function del_beasiswa($id_beasiswa)
    {
        $data = [
            'id_beasiswa' => $id_beasiswa,
        ];
        
        $this->jbModel->DeleteData($data);
        return redirect()->to(base_url('/admin/beasiswa'));
    }

    public function penerima()
    {
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Daftar Penerima Beasiswa | MBUG',
            'pb' => $pb,
        ];

        return view('main/data-penerima-beasiswa', $data);
    }

    public function add_penerima()
    {
        $data = [
            'title' => 'Form Input Penerima | MBUG',
        ];


        return view('main/tambah-penerima', $data);
    }

    public function edit_penerima()
    {
        $data = [
            'title' => 'Form Edit Penerima | MBUG',
        ];

        return view('main/edit-penerima', $data);
    }

    public function save_penerima()
    {
    }

    public function import_penerima()
    {

        $data = [
            'title' => 'Import Data | MBUG',
        ];

        return view('main/import-data-peserta', $data);
    }
    // V

    public function del_penerima($id_penerima)
    {
        $data = [
            'id_penerima' => $id_penerima,
        ];
        
        $this->pbModel->DeleteData($data);
        return redirect()->to(base_url('/admin/penerima'));
    }

    public function akademik()
    {
        $la = $this->laModel->AllData();
        $data = [
            'title' => 'Akademik | MBUG',
            'la' => $la,
        ];

        return view('main/laporan-akademik', $data);
    }
    public function add_akademik()
    {
        $data = [
            'title' => 'Form Input Akademik | MBUG',
        ];

        return view('main/tambah-akademik', $data);
    }

    public function edit_akademik()
    {
        $data = [
            'title' => 'Form edit Akademik | MBUG',
        ];

        return view('main/edit-akademik', $data);
    }

    public function save_akademik()
    {

    }

    public function prestasi()
    {
        $lp = $this->lpModel->AllData();
        $data = [
            'title' => 'Laporan Prestasi | MBUG',
            'lp' => $lp,
        ];

        return view('main/laporan-prestasi', $data);
    }
    public function add_prestasi()
    {
        $data = [
            'title' => 'Form Input Prestasi | MBUG',
        ];

        return view('main/tambah-prestasi', $data);
    }
    public function edit_prestasi()
    {
        $data = [
            'title' => 'Form Edit Prestasi | MBUG',
        ];

        return view('main/edit-prestasi', $data);
    }


    public function mbkm()
    {
        $mbkm = $this->mbkmModel->AllData();
        $data = [
            'title' => 'Magang Bersertifikat Kampus Merdeka | MBUG',
            'mbkm' => $mbkm,
        ];

        return view('main/laporan-mbkm', $data);
    }
    public function add_mbkm()
    {
        $data = [
            'title' => 'Form Input MBKM | MBUG',
        ];

        return view('main/tambah-mbkm', $data);
    }

    public function edit_mbkm()
    {
        $data = [
            'title' => 'Form Edit MBKM | MBUG',
        ];

        return view('main/edit-mbkm', $data);
    }

    public function manajemen()
    {
        $mnj = $this->mnjModel->AllData();
        $data = [
            'title' => 'User Manajemen | MBUG',
            'mnj' => $mnj,
        ];

        return view('main/manajemen-pengguna', $data);
    }

    public function add_manajemen()
    {
        $data = [
            'title' => 'Form Input User | MBUG',
        ];

        return view('main/tambah-manajemen', $data);
    }
    public function edit_manajemen()
    {
        $data = [
            'title' => 'Form Edit User | MBUG',
        ];

        return view('main/edit-manajemen', $data);
    }



    public function keaktifan()
    {
        $ka = $this->kaModel->AllData();
        $data = [
            'title' => 'Keaktifan per Semester | MBUG',
            'ka' => $ka,
        ];

        return view('main/keaktifan', $data);
    }
    public function add_keaktifan()
    {
        $data = [
            'title' => 'Form Input Keaktifan | MBUG',
        ];

        return view('main/tambah-keaktifan', $data);
    }
    public function edit_keaktifan()
    {
        $data = [
            'title' => 'Form Edit Keaktifan per Semester | MBUG',
        ];

        return view('main/edit-keaktifan', $data);
    }

    public function gform()
    {
        $lgf = $this->lgfModel->AllData();
        $data = [
            'title' => 'Daftar Link Google Form |MB UG',
            'lgf' => $lgf
        ];
        return view('main/gform', $data);
    }

    public function add_gform()
    {
        $data = [
            'title' => 'Form Input Google Form |MB UG',
        ];
        return view('main/tambah-gform', $data);
    }
    public function edit_gform()
    {
        $data = [
            'title' => 'Form Input Google Form |MB UG',
        ];
        return view('main/edit-gform', $data);
    }


    public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman | MBUG',
        ];

        return view('main/pengumuman', $data);
    }

    public function add_pengumuman()
    {
        $data = [
            'title' => 'Form Input Pengumuman | MBUG',
        ];

        return view('main/tambah-pengumuman', $data);
    }
    public function edit_pengumuman()
    {
        $data = [
            'title' => 'Form Edit Pengumuman | MBUG',
        ];

        return view('main/edit-pengumuman', $data);
    }

    public function panduan()
    {
        $data = [
            'title' => 'Buku Panduan | MBUG',
        ];

        return view('main/panduan', $data);
    }

    public function log()
    {
        $data = [
            'title' => 'Log Aktivitas User|MBUG',
        ];

        return view('main/log-aktivitas', $data);
    }
}
