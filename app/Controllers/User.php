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
        if (session()->get('username') == "") {
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
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

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
        if ($this->validate([
            'alamat' => 'required',
            'no_hp' => 'required',

        ])) {
            $penerima = $this->pbModel->DetailData($id_penerima);
            $data = [
                'id_penerima' => $id_penerima,
                'nama' => $penerima->nama,
                'npm' => $penerima->npm,
                'prodi' => $penerima->prodi,
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'jenis_kelamin' => $penerima->jenis_kelamin,
                'tahun_diterima' => $penerima->tahun_diterima,
                'status_penerima' => $penerima->status_penerima,
                'keterangan' => $penerima->keterangan,
            ];

            $this->pbModel->UpdateData($id_penerima, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/user/profile'));
        } else {
            dd($this->request->getPost('password_baru'));
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function cedit_password_profile($uname)
    {
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
        if (session()->get('username') == "") {
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
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Input Akademik | User',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb
        ];

        return view('user-main/tambah-akademik', $data);
    }

    public function user_save_akademik()
    {
        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'semester' => 'required',
            'TA' => 'required',
            'bef' => 'required',
            'af' => 'required',
            'ipk' => 'required',
            'ipk_lokal' => 'required',
            'ipk_uu' => 'required',
            #'rangkuman_nilai' => 'required',
        ])) {
            $data = [
                'id_beasiswa' => $this->laModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->laModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->laModel->getTA($this->request->getPost('TA'), $this->request->getPost('bef'), $this->request->getPost('af')),
                'ipk' => $this->request->getPost('ipk'),
                'ipk_lokal' => $this->request->getPost('ipk_lokal'),
                'ipk_uu' => $this->request->getPost('ipk_uu'),
                'rangkuman_nilai' => $this->request->getPost('TA'),
            ];

            $this->laModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/user/akademik'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input Akademik | User',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('user-main/tambah-akademik', $data);
        }
    }

    public function user_edit_akademik($id_akademik)
    {
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form edit Akademik | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->laModel->DetailData($id_akademik),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/edit-akademik', $data);
    }

    public function user_cedit_akademik($id_akademik)
    {
        if ($this->validate([
            'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
            'semester' => 'required',
            'TA' => 'required',
            'bef' => 'required',
            'af' => 'required',
            'ipk' => 'required',
            'ipk_lokal' => 'required',
            'ipk_uu' => 'required',
            #'rangkuman_nilai' => 'required',
        ])) {
            $data = [
                'id_akademik' => $id_akademik,
                'id_beasiswa' => $this->laModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->laModel->getIDp(session()->get('username')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->laModel->getTA($this->request->getPost('TA'), $this->request->getPost('bef'), $this->request->getPost('af')),
                'ipk' => $this->request->getPost('ipk'),
                'ipk_lokal' => $this->request->getPost('ipk_lokal'),
                'ipk_uu' => $this->request->getPost('ipk_uu'),
                'rangkuman_nilai' => $this->request->getPost('TA'),
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
        if (session()->get('username') == "") {
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
        if (session()->get('username') == "") {
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

    public function user_edit_mbkm($id_mbkm)
    {
        if (session()->get('username') == "") {
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


    public function user_prestasi()
    {
        if (session()->get('username') == "") {
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
        if (session()->get('username') == "") {
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
        if ($this->validate([
            'tingkat' => 'required',
            'jenis_prestasi' => 'required',
            'nama_kegiatan' => 'required',
            'capaian' => 'required',
            'tempat' => 'required',
            'datepicker' => 'required',
            'penyelenggara' => 'required',
            #'bukti_prestasi' => 'required',
            'publikasi' => 'required',
        ])) {
            $data = [
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp(session()->get('username')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $this->request->getPost('capaian'),
                'tempat' => $this->request->getPost('tempat'),
                'tanggal' => $this->lpModel->getDate($this->request->getPost('datepicker')),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => "-",
                'publikasi' => $this->request->getPost('publikasi'),
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
        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Edit Prestasi | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->lpModel->DetailData($id_prestasi),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/edit-prestasi', $data);
    }

    public function user_cedit_prestasi($id_prestasi)
    {
        if ($this->validate([
            'tingkat' => 'required',
            'jenis_prestasi' => 'required',
            'nama_kegiatan' => 'required',
            'capaian' => 'required',
            'tempat' => 'required',
            'datepicker' => 'required',
            'penyelenggara' => 'required',
            #'bukti_prestasi' => 'required',
            'publikasi' => 'required',
        ])) {
            $data = [
                'id_prestasi' => $id_prestasi,
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp(session()->get('username')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $this->request->getPost('capaian'),
                'tempat' => $this->request->getPost('tempat'),
                'tanggal' => $this->lpModel->getDate($this->request->getPost('datepicker')),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => "-",
                'publikasi' => $this->request->getPost('publikasi'),
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
        if (session()->get('username') == "") {
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
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Input Keaktifan | User',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
        ];
        return view('user-main/tambah-keaktifan', $data);
    }
    public function user_edit_keaktifan($id_keaktifan)
    {
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Edit Keaktifan per Semester | User',
            'validation' => \Config\Services::validation(),
            'former' => $this->kaModel->DetailData($id_keaktifan),
            'jenis_beasiswa' => $jb,
        ];

        return view('user-main/edit-keaktifan', $data);
    }

    public function user_panduan()
    {
        if (session()->get('username') == "") {
            session()->setFlashdata("belum_login", "Anda Belum Login Sebagai User");
            return redirect()->to(base_url('/user/login'));
        }

        $data = [
            'title' => 'Buku Panduan | MBUG',
        ];

        return view('user-main/panduan', $data);
    }
}
