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
        $data = [
            'title' => 'Form Input Beasiswa'
        ];

        return view('main/tambah-data', $data);
    }

    public function save_beasiswa()
    {
        $this->jbModel->save([
            'nama_beasiswa' => $this->request->getVar('nama'),
            'asal_beasiswa' => $this->request->getVar('asal'),
            'tahun_penerimaan' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Berhasil ditambahkan');

        return redirect()->to('/tambah-beasiswa');
    }

    public function input_penerima()
    {

    }
}