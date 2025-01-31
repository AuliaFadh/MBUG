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
    protected $prodiModel;
    protected $tahunModel;
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
        $this->prodiModel = new \App\Models\prodiModel();
        $this->tahunModel = new \App\Models\tahunModel();
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

        $check = $this->loginModel->login_check_u($username, $password);

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

            session()->set('username', $check["username"]);
            session()->set('nama_user', $check["nama"]);
            session()->set('hak_akses', $check["hak_akses"]);
            $pp = $this->pbModel->getPictureN($username);
            
            session()->set('pp', $pp);
            
            return redirect()->to(base_url('/user/home'));
        } elseif ($check["hak_akses"] == "1") {
            session()->setFlashdata('admin', 'Akun terdaftar sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
    }

    public function user_logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/user/login'));
    }

    public function user_home()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $news = $this->newsModel->AllData();
        $data = [
            'title' => 'Dashboard | MBUG',
            'news' => $news,
        ];

        return view('user-main/dashboard', $data);
    }

    public function  user_profile()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }
        $sessionData = session()->get();
        
        $uname = session()->get('username');
        $profile = $this->userModel->getData_username($uname);
        $data = [
            'title' => 'Profile | MBUG',
            'profile' => $profile,
        ];

        return view('user-main/user-profile', $data);
    }

    public function cedit_user_profile($id_penerima)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'alamat' => 'required',
            'no_hp' => 'required',

        ])) {
            $penerima = $this->pbModel->DetailData($id_penerima);

            $pp = $this->pbModel->getPicture($id_penerima);

            $foto_pp = $this->request->getFile('file-input');
            if ($foto_pp->getSize() > 0) {
                if (!is_null($pp)){
                    unlink('asset/img/database/picture/' . $pp);
                }
                $nama_pp = $foto_pp->getRandomName();
                $foto_pp->move('asset/img/database/picture/', $nama_pp);
            } else {
                $nama_pp = $pp;
            }
            

            $data = [
                'id_penerima' => $id_penerima,
                'nama' => $penerima->nama,
                'npm' => $penerima->npm,
                'id_prodi' => $penerima->id_prodi,
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'ppicture' => $nama_pp,
                'jenis_kelamin' => $penerima->jenis_kelamin,
                'tahun_diterima' => $penerima->tahun_diterima,
                'status_penerima' => $penerima->status_penerima,
                'keterangan' => $penerima->keterangan,
            ];

            $this->pbModel->UpdateData($id_penerima, $data);
            
            

            session()->set([
                'nama_user' => $penerima->nama, // Update nama di session
                'pp' => $nama_pp, // Update foto profil di session
            ]);
    
            
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/profile'));
        } else {
            
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function cedit_password_profile($uname)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'password_lama' => 'required|matches[password]',
            'password_baru' => 'required',

        ])) {
            $penerima = $this->userModel->getData_username($uname);
            $data = [
                'id_user' => $penerima->id_user,
                'username' => $penerima->username,
                'password' => $this->request->getPost('password_baru'),
                'hak_akses' => $penerima->hak_akses,
                'last_login' => $penerima->last_login,
                'status_user' => $penerima->status_user,
            ];

            $this->userModel->UpdateData($penerima->id_user, $data);
            session()->setFlashdata('pass_berhasil', 'Password berhasil diubah');

            return redirect()->to(base_url('/user/profile'));
        } else {
            session()->setFlashdata('pass_gagal', 'Password tidak berhasil diubah');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function user_akademik()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $la = $this->laModel->AllData();
        $data = [
            'title' => 'Akademik | MBUG',
            'la' => $la,
        ];

        return view('user-main/laporan-akademik', $data);
    }

    public function user_add_akademik()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();                
        $TA = $this->tahunModel->AllData();
        $data = [
            'title' => 'Form Input Akademik | User',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
            'TA'=>$TA,
        ];

        return view('user-main/tambah-akademik', $data);
    }

    public function user_save_akademik()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'semester' => 'required',
            'TA' => 'required',
            
            'ipk' => 'required',
            'ipk_lokal' => 'required',
            'ipk_uu' => 'required',
            'rangkuman_nilai' => 'uploaded[rangkuman_nilai]|max_size[rangkuman_nilai,4096]|ext_in[rangkuman_nilai,pdf]',
        ])) {
            $rangkuman_nilai = $this->request->getFile('rangkuman_nilai');
            $nama_rn = $rangkuman_nilai->getRandomName();
            $rangkuman_nilai->move('asset/doc/database/rangkuman_nilai', $nama_rn);
            $data = [
                'id_beasiswa' => $this->laModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->laModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->request->getPost('TA'),
                'ipk' => $this->request->getPost('ipk'),
                'ipk_lokal' => $this->request->getPost('ipk_lokal'),
                'ipk_uu' => $this->request->getPost('ipk_uu'),
                'rangkuman_nilai' => $nama_rn,
                'konfirmasi_akademik' => 2,
            ];

            $this->laModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/user/akademik'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $jb = $this->jbModel->AllData();  
            $TA = $this->tahunModel->AllData();   

            $data = [
                'title' => 'Form Input Akademik | User',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'jenis_beasiswa'=>$jb,
                'TA'=>$TA,
            ];

            return view('user-main/tambah-akademik', $data);
        }
    }

    public function user_edit_akademik($id_akademik)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }
                   
        $TA = $this->tahunModel->AllData();

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form edit Akademik | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->laModel->DetailData($id_akademik),
            'jenis_beasiswa' => $jb,
            'TA'=>$TA
        ];
        
        return view('user-main/edit-akademik', $data);
    }

    public function user_cedit_akademik($id_akademik)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'semester' => 'required',
            'TA' => 'required',
            
            'ipk' => 'required',
            'ipk_lokal' => 'required',
            'ipk_uu' => 'required',
            'rangkuman_nilai' => 'max_size[rangkuman_nilai,4096]|ext_in[rangkuman_nilai,pdf]',
        ])) {
            $rn = $this->laModel->getDoc($id_akademik);

            $doc_rn = $this->request->getFile('rangkuman_nilai');
            if ($doc_rn->getSize() > 0) {
                if (!is_null($rn)){
                    unlink('asset/doc/database/rangkuman_nilai/' . $rn);
                }
                $nama_rn = $doc_rn->getRandomName();
                $doc_rn->move('asset/doc/database/rangkuman_nilai/', $nama_rn);
            } else {
                $nama_rn = $rn;
            }

            $data = [
                'id_akademik' => $id_akademik,
                'id_beasiswa' => $this->laModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->laModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->request->getPost('TA'),
                'ipk' => $this->request->getPost('ipk'),
                'ipk_lokal' => $this->request->getPost('ipk_lokal'),
                'ipk_uu' => $this->request->getPost('ipk_uu'),
                'rangkuman_nilai' => $nama_rn,
                'konfirmasi_akademik' => 2,
            ];

            $this->laModel->UpdateData($id_akademik, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/akademik'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/akademik'));
        }
    }

    public function user_mbkm()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $mbkm = $this->mbkmModel->AllData();
        $data = [
            'title' => 'Magang Bersertifikat Kampus Merdeka | MBUG',
            'mbkm' => $mbkm,
        ];

        return view('user-main/laporan-mbkm', $data);
    }
    
    public function user_add_mbkm()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Input MBKM | User',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/tambah-mbkm', $data);
    }

    public function user_save_mbkm()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'nama_mbkm' => 'required',
            'jenis_mbkm' => 'required',
            'periode' => 'required',
            'keterangan_mbkm' => 'required',

        ])) {
            $data = [
                'id_beasiswa' => $this->mbkmModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->mbkmModel->getIDp(session()->get('username')),
                'nama_mbkm' => $this->request->getPost('nama_mbkm'),
                'jenis_mbkm' => $this->request->getPost('jenis_mbkm'),
                'periode' => $this->request->getPost('periode'),
                'keterangan_mbkm' => $this->request->getPost('keterangan_mbkm'),
                'konfirmasi_mbkm' => 2,
            ];

            $this->mbkmModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/user/mbkm'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input MBKM | User',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('user-main/tambah-mbkm', $data);
        }
    }

    public function user_edit_mbkm($id_mbkm)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Edit MBKM | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->mbkmModel->DetailData($id_mbkm),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/edit-mbkm', $data);
    }

    public function user_cedit_mbkm($id_mbkm)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'nama_mbkm' => 'required',
            'jenis_mbkm' => 'required',
            'periode' => 'required',
            'keterangan_mbkm' => 'required',

        ])) {
            $data = [
                'id_mbkm' => $id_mbkm,
                'id_beasiswa' => $this->mbkmModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->mbkmModel->getIDp(session()->get('username')),
                'nama_mbkm' => $this->request->getPost('nama_mbkm'),
                'jenis_mbkm' => $this->request->getPost('jenis_mbkm'),
                'periode' => $this->request->getPost('periode'),
                'keterangan_mbkm' => $this->request->getPost('keterangan_mbkm'),
                'konfirmasi_mbkm' => 2,
            ];

            $this->mbkmModel->UpdateData($id_mbkm, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/mbkm'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/mbkm'));
        }
    }

    public function user_prestasi()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $lp = $this->lpModel->AllData();
        $data = [
            'title' => 'Laporan Prestasi | MBUG',
            'lp' => $lp,
        ];

        return view('user-main/laporan-prestasi', $data);
    }

    public function user_add_prestasi()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Input Prestasi | Admin',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/tambah-prestasi', $data);
    }

    public function user_save_prestasi()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'tingkat' => 'required',
            'jenis_prestasi' => 'required',
            'nama_kegiatan' => 'required',
            'capaian' => 'required',
            'tempat' => 'required',
            'tanggal-mulai' => 'required',
            'tanggal-selesai' => 'required',
            'penyelenggara' => 'required',
            'bukti_prestasi' => 'uploaded[bukti_prestasi]|max_size[bukti_prestasi,4096]|ext_in[bukti_prestasi,pdf]',
            'publikasi' => 'required',
        ])) {
            

            if ($this->lpModel->calc($this->lpModel->getDate($this->request->getPost('tanggal-mulai')), $this->lpModel->getDate($this->request->getPost('tanggal-selesai'))) < 0) {
                session()->setFlashdata('gagal', 'Tanggal terbit setelah batas pengumuman');
                return redirect()->to(base_url('/user/prestasi'));
            }


            $bukti_prestasi = $this->request->getFile('bukti_prestasi');
            $nama_bp = $bukti_prestasi->getRandomName();
            $bukti_prestasi->move('asset/doc/database/bukti_prestasi', $nama_bp);
            $data = [
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp(session()->get('username')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $this->request->getPost('capaian'),
                'tempat' => $this->request->getPost('tempat'),
                'tanggal_mulai' => $this->lpModel->getDate($this->request->getPost('tanggal-mulai')),
                'tanggal_selesai' => $this->lpModel->getDate($this->request->getPost('tanggal-selesai')),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => $nama_bp,
                'publikasi' => $this->request->getPost('publikasi'),
                'konfirmasi_prestasi' => 2,
            ];
            

            $this->lpModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/user/prestasi'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $data = [
                'title' => 'Form Input Prestasi | User',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('user-main/tambah-prestasi', $data);
        }
    }

    public function user_edit_prestasi($id_prestasi)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }
        $TA = $this->tahunModel->AllData();

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Edit Prestasi | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->lpModel->DetailData($id_prestasi),
            'jenis_beasiswa' => $jb,
            'TA' => $TA,
        ];

        return view('user-main/edit-prestasi', $data);
    }

    public function user_cedit_prestasi($id_prestasi)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'tingkat' => 'required',
            'jenis_prestasi' => 'required',
            'nama_kegiatan' => 'required',
            'capaian' => 'required',
            'tempat' => 'required',
            'tanggal-mulai' => 'required',
            'tanggal-selesai' => 'required',
            'penyelenggara' => 'required',
            'bukti_prestasi' => 'max_size[bukti_prestasi,4096]|ext_in[bukti_prestasi,pdf]',
            'publikasi' => 'required',
        ])) {

            if ($this->lpModel->calc($this->lpModel->getDate($this->request->getPost('tanggal-mulai')), $this->lpModel->getDate($this->request->getPost('tanggal-selesai'))) < 0) {
                session()->setFlashdata('gagal', 'Tanggal terbit setelah batas pengumuman');
                return redirect()->to(base_url('/user/prestasi'));
            }

            $bp = $this->lpModel->getDoc($id_prestasi);

            $doc_bp = $this->request->getFile('bukti_prestasi');
            if ($doc_bp->getSize() > 0) {
                if (!is_null($bp)){
                    unlink('asset/doc/database/bukti_prestasi/' . $bp);
                }
                $nama_bp = $doc_bp->getRandomName();
                $doc_bp->move('asset/doc/database/bukti_prestasi/', $nama_bp);
            } else {
                $nama_bp = $bp;
            }
            
            $data = [
                'id_prestasi' => $id_prestasi,
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp(session()->get('username')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $this->request->getPost('capaian'),
                'tempat' => $this->request->getPost('tempat'),
                'tanggal_mulai' => $this->lpModel->getDate($this->request->getPost('tanggal-mulai')),
                'tanggal_selesai' => $this->lpModel->getDate($this->request->getPost('tanggal-selesai')),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => $nama_bp,
                'publikasi' => $this->request->getPost('publikasi'),
                'konfirmasi_prestasi' => 2,
            ];

            $this->lpModel->UpdateData($id_prestasi, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/prestasi'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/prestasi'));
        }
    }

    public function user_keaktifan()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $ka = $this->kaModel->AllData();
        $data = [
            'title' => 'Keaktifan per Semester | MBUG',
            'ka' => $ka,
        ];

        return view('user-main/keaktifan', $data);
    }

    public function user_add_keaktifan()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $TA = $this->tahunModel->AllData();
        $data = [
            'title' => 'Form Input Keaktifan | User',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
            'TA' => $TA,
        ];
        return view('user-main/tambah-keaktifan', $data);
    }
    
    public function user_save_keaktifan()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'semester' => 'required',
                'TA' => 'required',
                'krs' => 'uploaded[krs]|max_size[krs,4096]|ext_in[krs,pdf]',
                'jumlah_ditagihkan' => 'required',
                'jumlah_potongan' => 'required',
                'blanko_pembayaran' => 'uploaded[blanko_pembayaran]|max_size[blanko_pembayaran,4096]|ext_in[blanko_pembayaran,pdf]',
                'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,4096]|ext_in[bukti_pembayaran,pdf]',
        ])) {
            $krs = $this->request->getFile('krs');
            $nama_krs = $krs->getRandomName();
            $krs->move('asset/doc/database/krs', $nama_krs);

            $blanko_pembayaran = $this->request->getFile('blanko_pembayaran');
            $nama_blanko = $blanko_pembayaran->getRandomName();
            $blanko_pembayaran->move('asset/doc/database/blanko_pembayaran', $nama_blanko);

            $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
            $nama_bukti = $bukti_pembayaran->getRandomName();
            $bukti_pembayaran->move('asset/doc/database/bukti_pembayaran', $nama_bukti);

            $data = [
                'id_beasiswa' => $this->kaModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->kaModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->request->getPost('TA'),
                'krs' => $nama_krs,
                'jumlah_ditagihkan' => $this->request->getPost('jumlah_ditagihkan'),
                'jumlah_potongan' => $this->request->getPost('jumlah_potongan'),
                'blanko_pembayaran' => $nama_blanko,
                'bukti_pembayaran' => $nama_bukti,
                'konfirmasi_keaktifan' => 2,
            ];

            $this->kaModel->InsertData($data);            
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/user/keaktifan'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            
            $jb = $this->jbModel->AllData();
            $TA = $this->tahunModel->AllData();

            $data = [
                'title' => 'Form Input Keaktifan | User',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'jenis_beasiswa' => $jb,
                'TA' => $TA,
                
            ];
            
            return view('user-main/tambah-keaktifan', $data);
        }
    }

    public function user_edit_keaktifan($id_keaktifan)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $TA = $this->tahunModel->AllData();
        $data = [
            'title' => 'Form Edit Keaktifan per Semester | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->kaModel->DetailData($id_keaktifan),
            'jenis_beasiswa' => $jb,
            'TA' => $TA,
        ];

        return view('user-main/edit-keaktifan', $data);
    }

    public function user_cedit_keaktifan($id_keaktifan)
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'semester' => 'required',
            'TA' => 'required',
            
            'krs' => 'max_size[krs,4096]|ext_in[krs,pdf]',
            'jumlah_ditagihkan' => 'required',
            'jumlah_potongan' => 'required',
            'blanko_pembayaran' => 'max_size[blanko_pembayaran,4096]|ext_in[blanko_pembayaran,pdf]',
            'bukti_pembayaran' => 'max_size[bukti_pembayaran,4096]|ext_in[bukti_pembayaran,pdf]',
        ])) {
            list($krs, $blanko, $bukti) = $this->kaModel->getDoc($id_keaktifan);

            $doc_krs = $this->request->getFile('krs');
            if ($doc_krs->getSize() > 0) {
                if (!is_null($krs)){
                    unlink('asset/doc/database/krs/' . $krs);
                }
                $nama_krs = $doc_krs->getRandomName();
                $doc_krs->move('asset/doc/database/krs/', $nama_krs);
            } else {
                $nama_krs = $krs;
            }

            $doc_blanko = $this->request->getFile('blanko_pembayaran');
            if ($doc_blanko->getSize() > 0) {
                if (!is_null($blanko)){
                    unlink('asset/doc/database/blanko_pembayaran/' . $blanko);
                }
                $nama_blanko = $doc_blanko->getRandomName();
                $doc_blanko->move('asset/doc/database/blanko_pembayaran/', $nama_blanko);
            } else {
                $nama_blanko = $blanko;
            }

            $doc_bukti = $this->request->getFile('bukti_pembayaran');
            if ($doc_bukti->getSize() > 0) {
                if (!is_null($bukti)){
                    unlink('asset/doc/database/bukti_pembayaran/' . $bukti);
                }
                $nama_bukti = $doc_bukti->getRandomName();
                $doc_bukti->move('asset/doc/database/bukti_pembayaran/', $nama_bukti);
            } else {
                $nama_bukti = $bukti;
            }

            $data = [
                'id_keaktifan' => $id_keaktifan,
                'id_beasiswa' => $this->kaModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->kaModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->request->getPost('TA'),
                'krs' => $nama_krs,
                'jumlah_ditagihkan' => $this->request->getPost('jumlah_ditagihkan'),
                'jumlah_potongan' => $this->request->getPost('jumlah_potongan'),
                'blanko_pembayaran' => $nama_blanko,
                'bukti_pembayaran' => $nama_bukti,
                'konfirmasi_keaktifan' => 2,
            ];

            $this->kaModel->UpdateData($id_keaktifan, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/keaktifan'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/keaktifan'));
        }
    }

    public function user_panduan()
    {
        if (session()->get('hak_akses') != "0") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $data = [
            'title' => 'Buku Panduan | MBUG',
        ];

        return view('user-main/panduan', $data);
    }
}
