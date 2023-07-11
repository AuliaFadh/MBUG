<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Masuk extends BaseController
{
    protected $jbModel;
    protected $pbModel;
    public function __construct()
    {
        $this->jbModel = new \App\Models\jbModel();
        $this->pbModel = new \App\Models\pbModel();
    }

    public function input_beasiswa()
    {
        if(session()->getFlashdata('validation')){
            $val = session()->getFlashdata('validation');
        }
        else{
            $val = ['a'];
        }

        $data = [
            'title' => 'Form Input Beasiswa',
            'validation' => $val,
        ];

        return view('/main/tambah-data', $data);
    }

    public function save_beasiswa()
    {
        if(!$this->validate([
            'nama' => 'required|is_unique[jenis_beasiswa.nama_beasiswa]',
            'asal' => 'required',
            'tahun' => 'required',
            'status' => 'required|in_list[0,1]',
        ]))
        {
            $validation = \Config\Services::validation();
            $val = $validation->getErrors();
            session()->setFlashdata('validation', $val);
            return redirect()->to(base_url('/tambah-beasiswa'));
        }

        $this->jbModel->save([
            'nama_beasiswa' => $this->request->getVar('nama'),
            'asal_beasiswa' => $this->request->getVar('asal'),
            'tahun_penerimaan' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Berhasil ditambahkan');

        return redirect()->to(base_url('/tambah-beasiswa'));
    }

    public function input_penerima()
    {

    }
}