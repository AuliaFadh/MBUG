<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $jbModel;
    protected $pbModel;
    protected $laModel;
    public function __construct()
    {
        $this->jbModel = new \App\Models\jbModel();
        $this->pbModel = new \App\Models\pbModel();
        $this->laModel = new \App\Models\laModel();
    }

    public function home()
    {
        
        $data = [
            'title' => 'Dashboard | MBUG',
        ];
        
        return view('main/dashboard',$data);
    }


    public function beasiswa()
    {
        $jb = $this->jbModel->AllData();

        $data = [
            'title' => 'Jenis Beasiswa | MBUG',
            'jb' => $jb,
        ];
        
        return view('main/daftar-jenis-beasiswa',$data);
    }

    public function add_beasiswa()
    {
        $data = [
            'title' => 'Form Input Beasiswa',
            'validation' => \Config\Services::validation(),
        ];

        return view('/main/tambah-beasiswa', $data);
    }
    public function edit_beasiswa()
    {
        $data = [
            'title' => 'Form Edit Beasiswa | MBUG',
        ];
        
        return view('main/edit-beasiswa',$data);
    }
    public function save_beasiswa()
    {
        if($this->validate([
            'nama' => 'required|is_unique[jenis_beasiswa.nama_beasiswa]',
            'asal' => 'required',
            'tahun' => 'required',
        ]))
        {
            
        } else 
        {
         $session = session();
         $session->setFlashdata('input', $this->request->getPost());

         $data = [
            'title' => 'Add User | Admin',
            'validation' => \Config\Services::validation(),
            'input' => $session->getFlashdata('input'),
        ];

            return view('main/tambah-beasiswa',$data);
        }
    }

    public function penerima()
    {
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Daftar Penerima Beasiswa | MBUG',
            'pb' => $pb,
        ];
        
        return view('main/data-penerima-beasiswa',$data);
    }
    public function add_penerima()
    {
        $data = [
            'title' => 'Form Input Penerima | MBUG',
        ];
        
        return view('main/tambah-penerima',$data);
    }
    public function edit_penerima()
    {
        $data = [
            'title' => 'Form Edit Penerima | MBUG',
        ];
        
        return view('main/edit-penerima',$data);
    }
    public function save_penerima()
    {

    }
// V
    public function akademik()
    {
        $la = $this->laModel->findAll();
        $data = [
            'title' => 'Akademik | MBUG',
            'la' => $la,
        ];
        
        return view('main/laporan-akademik',$data);
    }
    public function add_akademik()
    {
        $data = [
            'title' => 'Form Input Akademik | MBUG',
        ];
        
        return view('main/tambah-akademik',$data);
    }

    public function edit_akademik()
    {
        $data = [
            'title' => 'Form edit Akademik | MBUG',
        ];
        
        return view('main/edit-akademik',$data);
    }

    public function save_akademik()
    {      
    }

    public function prestasi()
    {
        $data = [
            'title' => 'Laporan Prestasi | MBUG',
        ];
        
        return view('main/laporan-prestasi',$data);
    }
    public function add_prestasi()
    {
        $data = [
            'title' => 'Form Input Prestasi | MBUG',
        ];
        
        return view('main/tambah-prestasi',$data);
    }
    public function edit_prestasi()
    {
        $data = [
            'title' => 'Form Edit Prestasi | MBUG',
        ];
        
        return view('main/edit-prestasi',$data);
    }

    
    public function mbkm()
    {
        $data = [
            'title' => 'Magang Bersertifikat Kampus Merdeka | MBUG',
        ];
        
        return view('main/laporan-mbkm',$data);
    }
    public function add_mbkm()
    {
        $data = [
            'title' => 'Form Input MBKM | MBUG',
        ];
        
        return view('main/tambah-mbkm',$data);
    }

    public function edit_mbkm()
    {
        $data = [
            'title' => 'Form Edit MBKM | MBUG',
        ];
        
        return view('main/edit-mbkm',$data);
    }
    
    public function manajemen()
    {
        $data = [
            'title' => 'User Manajemen | MBUG',
        ];
        
        return view('main/manajemen-pengguna',$data);
    }

    public function add_manajemen()
    {
        $data = [
            'title' => 'Form Input User | MBUG',
        ];
        
        return view('main/tambah-manajemen',$data);
    }
    public function edit_manajemen()
    {
        $data = [
            'title' => 'Form Edit User | MBUG',
        ];
        
        return view('main/edit-manajemen',$data);
    }

    
    
    public function keaktifan()
    {
        $data = [
            'title' => 'Keaktifan per Semester | MBUG',
        ];
        
        return view('main/keaktifan',$data);
    }
    public function add_keaktifan()
    {
        $data = [
            'title' => 'Form Input Keaktifan | MBUG',
        ];
        
        return view('main/tambah-keaktifan',$data);
    }
    public function edit_keaktifan()
    {
        $data = [
            'title' => 'Form Edit Keaktifan per Semester | MBUG',
        ];
        
        return view('main/edit-keaktifan',$data);
    }

    public function gform()
    {
        $data = [
            'title' => 'Daftar Link Google Form |MB UG',
        ]; 
        return view('main/gform',$data);
    }

    public function add_gform()
    {
        $data = [
            'title' => 'Form Input Google Form |MB UG',
        ]; 
        return view('main/tambah-gform',$data);
    }
    public function edit_gform()
    {
        $data = [
            'title' => 'Form Input Google Form |MB UG',
        ]; 
        return view('main/edit-gform',$data);
    }

    
    public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman | MBUG',
        ];

        return view('main/pengumuman',$data);
    }
   
    public function add_pengumuman()
    {
        $data = [
            'title' => 'Form Input Pengumuman | MBUG',
        ];

        return view('main/add-pengumuman',$data);
    }
    public function edit_pengumuman()
    {
        $data = [
            'title' => 'Form Edit Pengumuman | MBUG',
        ];

        return view('main/edit-pengumuman',$data);
    }
    
    public function panduan()
    {
        $data = [
            'title' => 'Buku Panduan | MBUG',
        ];
        
        return view('main/panduan',$data);
    }
    
    public function log()
    {
        $data = [
            'title' => 'Log Aktivitas User|MBUG',
        ];
        
        return view('main/log-aktivitas',$data);
    }
    
   
}

