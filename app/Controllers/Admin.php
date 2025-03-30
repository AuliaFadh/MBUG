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

    public function login_admin()
    {
        // oke
        $viewData = [
            'title' => 'Login Admin | Admin',
        ];

        return view('main/admin-login', $viewData);
    }

    public function admin_login_check()
    {
        // oke
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($session->has('login_block_time') && time() < $session->get('login_block_time')) {
            session()->setFlashdata('errors',            
                ['general' => 'Terlalu banyak percobaan gagal. Coba lagi setelah '
                .ceil(($session->get('login_block_time') - time())) . ' detik.']
            );          
            return redirect()->to(base_url('/admin/login'))->withInput();                    
        }

        if ($session->get('login_attempts') >= 5) {
            $session->set('login_block_time', time() + (3)); // Blokir selama 3 detik
            $session->set('login_attempts', 0); 
            session()->setFlashdata('errors',             
                ['general' => 'Terlalu banyak percobaan gagal. Coba lagi dalam beberapa detik.']
            );
            return redirect()->to(base_url('/admin/login'))->withInput();            
        }

        $check = $this->loginModel->login_check_a($username);  
        if (!$check || !password_verify($password, $check["password"])) {
            $session->set('login_attempts', ($session->get('login_attempts') ?? 0) + 1);
            session()->setFlashdata('errors',             
                ['general' => 'Username atau Password salah.']
            );
            return redirect()->to(base_url('/admin/login'))->withInput();                       
        }

        if ($check["hak_akses"] == "1") {
            
            $session->remove('login_attempts');
            $session->remove('login_block_time');
            $session->regenerate(true);

            $userData = [
                'uuid_user' => $check["uuid_user"],                
                'username' => $check["username"],
                'nama_user' => $check["nama"],
                'hak_akses' => $check["hak_akses"],
                'status_user' => $check["status_user"],                
                'islogin' => true,
                'ip_address' => $this->request->getIPAddress(), // Tambahan proteksi
                'user_agent' => $this->request->getUserAgent(), // Tambahan proteksi
            ];
            $session->set($userData);
            
            $datalog = [
                'log_last_login' => $this->logModel->getCurrentDate(),
                'log_username' => $check["username"],
            ];
            $this->logModel->InsertData($datalog); 

            $datamnj = [
                'last_login' => $this->userModel->getCurrentDate(),
            ];

            $this->userModel->UpdateData($check["id_user"], $datamnj);

            session()->setFlashdata('success',             
                ['general' => 'Selamat datang ' . $check['nama'] . '!']
            );
            return redirect()->to(base_url('/admin/home'));              
        } elseif ($check["hak_akses"] == "0") {
            session()->setFlashdata('errors', ['general' => 'Akun terdaftar sebagai User.']);
            return redirect()->to(base_url('/user/login'))->withHeaders(['Cache-Control' => 'no-store'])->send();
            session()->destroy();
            exit;               
        } else {
            session()->setFlashdata('errors', ['general' => 'Terjadi kesalahan, silakan coba lagi.']);
            return redirect()->to(base_url('/admin/login'))->withHeaders(['Cache-Control' => 'no-store'])->send();
            session()->destroy();
            exit;                    
        }


        
    }

    public function logout_admin()
    {
        // oke
        session()->destroy();
        return redirect()->to(base_url('/admin/login'));
    }

    public function profile_admin()
    {
        // oke
        $session = session();    
        $profile = $this->userModel->DetailDataUUID($session->get('uuid_user'));
        if(!$profile){
            session()->setFlashdata('errors',             
                ['general' => 'Profile tidak ditemukan']
            );
            return redirect()->to(base_url('/admin/home'));
        }
        $viewData = [
            'title' => 'Profile | MBUG',          
            'profile' => $profile,
        ];

        return view('main/admin-profile', $viewData);

    }

    public function cedit_profile($uuid_user)
    {
        // oke
        $session = session();
        $uuid_session = $session->get('uuid_user');
        $account = $this->userModel->DetailDataUUID($uuid_user);
        if (!$account) {                       
            session()->setFlashdata('errors',             
                ['general' => 'User tidak ditemukan.']
            );
            return redirect()->to(base_url('/admin/home'));
        }
        if($account['uuid_user']!=$uuid_session){
            session()->setFlashdata('errors',             
                ['general' => 'Anda tidak memiliki izin.']
            );            
            return redirect()->to('/admin/home');
        }

        $passwordLama = $this->request->getPost('password_lama');
        if (!password_verify($passwordLama, $account['password'])) {
            session()->setFlashdata('errors',             
                ['general' => 'Password lama salah.']
            );
            return redirect()->to(base_url('/admin/profile'));
        }

        $passwordBaru = $this->request->getPost('password_baru');
        $validationRules = 
        [
            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi.'
                ]
            ],
            'password_baru' => [
                'rules' => 'required|min_length[8]|uppercase|contains_digit|contains_symbol',
                'errors' => [
                    'required' => 'Password baru harus diisi.',
                    'min_length' => 'Password baru harus minimal 8 karakter.',
                    'uppercase' => 'Password harus mengandung minimal 1 huruf besar.',
                    'contains_digit' => 'Password harus mengandung minimal 1 angka.',
                    'contains_symbol' => 'Password harus mengandung minimal 1 simbol (@$!%*?&).'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('errors', array_merge(
                ['general' => 'Gagal mengubah password'], 
                $this->validator->getErrors()
            ));            
            return redirect()->to(base_url('/admin/profile'));
        }

        $processingData = $this->userModel->updatePassword($account['id_user'], $passwordBaru);

        if ($processingData) {
            $this->session->setFlashdata('success',[
                'general'=> "Kata Sandi berhasil diubah"]);
        } else {
            log_message('error', 'Insert data gagal: ' . json_encode($data));
            $this->session->setFlashdata('errors',[
                'general'=> "Kata Sandi gagal diubah. Terjadi kesalahan."]);
        }      
        return redirect()->to(base_url('/admin/profile'));
    }

    public function home()
    {
        // oke
        $listDataNews = $this->newsModel->AllData();
        $viewData = [
            'title' => 'Dashboard | Admin',
            'listDataNews' => $listDataNews,
        ];

        return view('main/dashboard', $viewData);
    }

    public function beasiswa()
    {        

        // oke        
        $listDataJB = $this->jbModel->AllData();
        
        $viewData = [
            'title' => 'Jenis Beasiswa | Admin',
            'listDataJB' => $listDataJB,
        ];

        return view('main/daftar-jenis-beasiswa', $viewData);
    }

    public function add_beasiswa()
    {
        // oke
        $viewData = [
            'title' => 'Tambah Beasiswa | Admin',            
        ];

        return view('/main/tambah-beasiswa', $viewData);
    }

    public function edit_beasiswa($id_beasiswa)
    {
        // oke
        $dataJB = $this->jbModel->DetailData_id($id_beasiswa);   
        if(!$dataJB){
            session()->setFlashdata('errors',             
                ['general' => 'Jenis Beasiswa tidak ditemukan']
            );
            return redirect()->to(base_url('/admin/beasiswa'));
        }

        $data = [
            'title' => 'Form Edit Beasiswa | Admin',            
            'dataJB' => $dataJB,
        ];

        return view('main/edit-beasiswa', $data);
    }

    public function cedit_beasiswa($id_beasiswa)
    {
        // oke
        $dataJB = $this->jbModel->checkDetailData_id($id_beasiswa);   
        if(!$dataJB){
            session()->setFlashdata('errors',             
                ['general' => 'Jenis Beasiswa tidak ditemukan']
            );
            return redirect()->to(base_url('/admin/beasiswa'));
        }
        
        $validationRules = [
            'jenis' => [
                'rules' => 'required|is_unique[jenis_beasiswa.jenis]',
                'errors' => [
                    'required' => 'Jenis beasiswa harus diisi.',
                    'is_unique' => 'Jenis beasiswa adalah Unik'
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal beasiswa harus diisi',                    
                ]
            ],
            'tahun_penerimaan' => [
                'rules' => 'required|greater_than_equal_to[1981]|integer',
                'errors' => [
                    'required' => 'Tahun penerimaan harus diisi.',
                    'greater_than_equal_to' => 'Tahun penerimaa tidak boleh kurang dari tahun 1981',
                    'integer'=>'Tahun penerimaan harus integer'
                    
                ]
            ],
            'status_beasiswa' => [
                'rules' => 'required|in_list[0,1]',
                'errors' => [
                    'required' => 'Status beasiswa harus dipilih.',
                    'in_list' => 'Status beasiswa hanya pilih Aktif atau Tidak aktif',                    
                ]
            ]
            
        ];

        if (!$this->validate($validationRules)) {
            $err_msg = 'Jenis Beasiswa Gagal Diubah';       
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url("/admin/beasiswa/edit/{$id_beasiswa}"))->withInput();                                 
        }

        $data = [            
            'jenis' => $this->request->getPost('jenis'),
            'asal' => $this->request->getPost('asal'),
            'tahun_penerimaan' => $this->request->getPost('tahun_penerimaan'),
            'status_beasiswa' => $this->request->getPost('status_beasiswa'),
        ];
        $this->UpdateAndDirect($this->$jbModel,$id_beasiswa,$data,'/admin/beasiswa','Jenis Beasiswa');
    }

    public function save_beasiswa()
    {
        $validationRules = [
            'jenis' => [
                'rules' => 'required|is_unique[jenis_beasiswa.jenis]',
                'errors' => [
                    'required' => 'Jenis beasiswa harus diisi.',
                    'is_unique' => 'Jenis beasiswa adalah Unik'
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal beasiswa harus diisi',                    
                ]
            ],
            'tahun_penerimaan' => [
                'rules' => 'required|greater_than_equal_to[1981]|integer',
                'errors' => [
                    'required' => 'Tahun penerimaan harus diisi.',
                    'greater_than_equal_to' => 'Tahun penerimaa tidak boleh kurang dari tahun 1981',
                    'integer'=>'Tahun penerimaan harus integer'
                    
                ]
            ],
            'status_beasiswa' => [
                'rules' => 'required|in_list[0,1]',
                'errors' => [
                    'required' => 'Status beasiswa harus dipilih.',
                    'in_list' => 'Status beasiswa hanya pilih Aktif atau Tidak aktif',                    
                ]
            ]
            
        ];

        if (!$this->validate($validationRules)) {
            $err_msg = 'Jenis Beasiswa Gagal Ditambahkan';       
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url("/admin/beasiswa/add"))->withInput();                                 
        }
        $data = [
            'jenis' => $this->request->getPost('jenis'),
            'asal' => $this->request->getPost('asal'),
            'tahun_penerimaan' => $this->request->getPost('tahun_penerimaan'),
            'status_beasiswa' => $this->request->getPost('status_beasiswa'),
        ];
                     
        $this->SaveAndDirect($this->jbModel,$data,'/admin/beasiswa','Jenis Beasiswa');
    }

    public function del_beasiswa($id_beasiswa)
    {  
        // oke     

        $data = [
            'id_beasiswa' => $id_beasiswa,
        ];

        $this->jbModel->DeleteData($data);
        session()->setFlashdata('success',             
                    ['general' => 'Jenis Beasiswa berhasil dihapus.']
                );
                return redirect()->to(base_url('/admin/beasiswa')); 
    }

   
    public function penerima()
    {
       
        $listDataPB = $this->pbModel->AllData();
        $viewData = [
            'title' => 'Daftar Penerima Beasiswa | Admin',
            'listDataPB' => $listDataPB,
        ];

        return view('main/data-penerima-beasiswa', $viewData);
    }

    public function add_penerima()
    {
        
        $listDataPS = $this->prodiModel->AllData();

        $viewData = [
            'title' => 'Form Input Penerima | Admin',            
            'listDataPS' => $listDataPS,
        ];

        return view('main/tambah-penerima', $viewData);
    }

    public function edit_penerima($id_penerima)
    {
       $dataPB = $this->PBModel-> DetailData_id($id_penerima);
       
        if(!$dataPB){
            session()->setFlashdata('errors',             
                ['general' => 'Penerima Beasiswa tidak ditemukan']
            );
            return redirect()->to(base_url('/admin/beasiswa'));
        }
        $viewData = [
            'title' => 'Form Edit Penerima | Admin',            
            'dataPB' => $dataPB,
        ];

        return view('main/edit-penerima', $viewData);
    }
// checkpoint
    public function cedit_penerima($id_penerima)
    {

        if (
            $this->validate([
                'nama' => 'required',
                'npm' => 'required',
                'prodi' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'tahun_diterima' => 'required',
                'status_penerima' => 'required',
            ])
        ) {
            $data = [
                'id_penerima' => $id_penerima,
                'nama' => $this->request->getPost('nama'),
                'npm' => $this->request->getPost('npm'),
                'id_prodi' => $this->prodiModel->getIDprodi($this->request->getPost('prodi')),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'ppicture' => null,
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tahun_diterima' => $this->request->getPost('tahun_diterima'),
                'status_penerima' => $this->request->getPost('status_penerima'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            $this->pbModel->UpdateData($id_penerima, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/penerima'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/penerima'));
        }
    }

    public function save_penerima()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'nama' => 'required|is_unique[penerima_beasiswa.nama]',
                'npm' => 'required|is_unique[penerima_beasiswa.npm]',
                'prodi' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'tahun_diterima' => 'required',
                'status_penerima' => 'required',
                'keterangan' => 'required',
            ])
        ) {
            $npm = $this->request->getPost('npm');
            $default_password = $npm . '.beasiswa';
            $hak_akses_pb = 0;
            $status_user = 1;
            $data = [
                'nama' => $this->request->getPost('nama'),
                'npm' => $npm,
                'id_prodi' => $this->request->getPost('prodi'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tahun_diterima' => $this->request->getPost('tahun_diterima'),
                'status_penerima' => $this->request->getPost('status_penerima'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];
            $data_user = [
                'username' => $npm,
                'password' => $default_password,
                'hak_akses' => $hak_akses_pb,
                'last_login' => $this->userModel->getCurrentDate(),
                'status_user' => $status_user,
            ];
            $this->pbModel->InsertData($data);
            $this->userModel->InsertData($data_user);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/penerima'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Edit Penerima | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-penerima', $data);
        }
    }

    public function import_penerima()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'title' => 'Import Data Penerima | Admin',
        ];

        return view('main/import-data-peserta', $data);
    }

    public function cimport_penerima()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if ($this->request->getPost()) {
            $filename = $_FILES['csv-file-input']['tmp_name'];

            if ($_FILES['csv-file-input']['size'] > 0) {
                $file = fopen($filename, 'r');
                $num = 0;

                $penerimaData = [];
                $userData = [];

                while (($column = fgetcsv($file, 5000, ',')) !== false) {
                    if ($num == 0) {
                        $num++;
                    } else {
                        $nama = $column[0];
                        $npm = $column[1];
                        $prodi = $column[2];
                        $id_prodi = $this->prodiModel->getIDprodi($prodi);
                        $alamat = $column[3];
                        $no_hp = $column[4];
                        $ppicture = null;
                        $jenis_kelamin = $column[5];
                        $tahun_diterima = $column[6];
                        $status_penerima = $column[7];
                        $keterangan = $column[8];

                        // Siapkan data untuk insert penerima_beasiswa
                        $penerimaData[] = [
                            'nama' => $nama,
                            'npm' => $npm,
                            'id_prodi' => $id_prodi,
                            'alamat' => $alamat,
                            'no_hp' => '0'.$no_hp,
                            'ppicture' => $ppicture,
                            'jenis_kelamin' => $jenis_kelamin,
                            'tahun_diterima' => $tahun_diterima,
                            'status_penerima' => $status_penerima,
                            'keterangan' => $keterangan
                        ];

                        // Siapkan data untuk insert user
                        $hak_akses_pb = 0;
                        $status_user = 1;
                        $last_login = $this->userModel->getCurrentDate();
                        $default_password = $npm . '.beasiswa';

                        $userData[] = [
                            'username' => $npm,
                            'password' => $default_password,  // Enkripsi password
                            'hak_akses' => $hak_akses_pb,
                            'last_login' => $last_login,
                            'status_user' => $status_user
                        ];
                    }
                }

                // Batch insert ke database menggunakan query builder
                if (!empty($penerimaData)) {
                    $this->pbModel->insertBatchData($penerimaData);
                }

                if (!empty($userData)) {
                    $this->userModel->table('user')->insertBatchData($userData);
                }
            }
        }

        return redirect()->to(base_url('/admin/penerima'));
    }

    public function del_penerima($id_penerima)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'id_penerima' => $id_penerima,
        ];

        $this->pbModel->DeleteData($data);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to(base_url('/admin/penerima'));
    }

    public function akademik()
    {
        //   oke

        $listDataLA = $this->laModel->AllData();
        $listDataTA = $this->tahunModel->AllData_name();
        
        $viewData = [
            'title' => 'Akademik | Admin',
            'listDataLA' => $listDataLA,
            'listDataTA' => $listDataTA,
            
        ];

        return view('main/laporan-akademik', $viewData);
    }

    public function confirm_akademik()
    {        
        // oke

        $listDataLA_processed = $this->laModel->GetProcessData();
        $listDataTA = $this->tahunModel->AllData_name();
        $viewData = [
            'title' => 'Konfirmasi Akademik | Admin',
            'listDataLA_processed' => $listDataLA_processed,
            'listDataTA' => $listDataTA
        ];

        return view('main/confirm-akademik', $viewData);
    }

    public function save_confirm_akademik()
    {       
        // oke
        $konfirmasi = $this->request->getPost('status_data');
        $keterangan = $this->request->getPost('konfirmasi_keterangan'); // Ambil keterangan
        $count_success = 0;
        $count_errors = 0;

        // Validasi jika tidak ada data konfirmasi atau keterangan
        if (empty($konfirmasi) || empty($keterangan)) {
            // Jika tidak ada konfirmasi atau keterangan, arahkan kembali ke halaman mbkm dengan pesan error            
            session()->setFlashdata('errors',             
            ['general' => "Tidak ada Laporan Akademik yang dikonfirmasi"]
            );
            return redirect()->to(base_url('/admin/akademik'));
        }

        // Jika ada konfirmasi dan keterangan, lakukan update
        foreach ($konfirmasi as $id => $status) {
            // Cek apakah ada keterangan untuk setiap konfirmasi
            $ket_konf = isset($keterangan[$id]) ? $keterangan[$id] : '-'; // Ambil keterangan yang sesuai
            
            $processingData = $this->laModel->update_konfirmasi_akademik($id, $status, $ket_konf);
            if($processingData){
                $count_success++;
            }else{
                $count_errors++;
            }
        }

        if($count_success){
            session()->setFlashdata('success',             
            ['general' => "{$count_success} Laporan Akademik berhasil dikonfirmasi"]
            );
        }

        if($count_errors){
            session()->setFlashdata('errors',             
            ['general' => "{$count_errors} Laporan Akademik gagal dikonfirmasi. Terjadi kesalahan"]
            );
        }

        return redirect()->to(base_url('/admin/akademik'));     
    }

    public function add_akademik()
    {
        // oke
        
        $listDataJB = $this->jbModel->AllDataActive_jenis();                
        $listDataTA = $this->tahunModel->AllData_name();
        $viewData = [
            'title' => 'Form Input Akademik | Admin',            
            'listDataJB' => $listDataJB,
            'listDataTA'=> $listDataTA,
        ];

        return view('main/tambah-akademik', $data);
    }

    public function edit_akademik($id_akademik)
    {
        $dataLA =  $this->laModel->DetailData_id($id_akademik);
        $listDataJB = $this->jbModel->AllDataActive_jenis();                
        $listDataTA = $this->tahunModel->AllData_name();
        $data = [
            'title' => 'Form edit Akademik | Admin',           
            'dataLA' => $dataLA,           
            'listDataJB' => $listDataJB,
            'listDataTA' => $listDataTA,
        ];
        return view('main/edit-akademik', $data);
    }

    public function cedit_akademik($id_akademik)
    {
        // oke
        $dataLA =  $this->laModel->EditDetailData_uuid($id_akademik);
        if(!$dataLA){
            session()->setFlashdata('errors',             
                ['general' => 'Laporan Akademik tidak ditemukan']
            );
            return redirect()->to(base_url('/user/akademik'));
        }

        $validationRules = [
            'npm'=>[
                'rules'=> 'required | numeric',
                'errors'=>[
                    'required' => 'NPM harus diisi',
                    'numeric'=>'NPM seharusnya angka'
                ]
                ],
            'jenis_beasiswa' => [
                'rules' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'errors' => [
                    'required' => 'Jenis beasiswa harus dipilih.',
                    'is_not_unique' => 'Jenis beasiswa tidak valid.'
                ]
            ],
            'semester' => [
                'rules' => 'required|greater_than_equal_to[0]||less_than_equal_to[14]',
                'errors' => [
                    'required' => 'Semester harus diisi.',
                    'greater_than_equal_to' => 'Semester tidak boleh kurang dari 0',
                    'less_than_equal_to' => 'Semester tidak boleh lebih dari 14'
                ]
            ],
            'TA' => [
                'rules' => 'required|regex_match[/^(PTA|ATA) \d{4}\/\d{4}$/]',
                'errors' => [
                    'required' => 'Tahun Ajaran harus diisi.',
                    'regex_match' => 'Tahun Ajaran tidak sesuai format'
                    
                ]
            ],
            'ipk' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK harus diisi.',
                    'decimal' => 'IPK harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK tidak boleh lebih dari 4.00.'
                ]
            ],
            'ipk_lokal' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK Lokal harus diisi.',
                    'decimal' => 'IPK Lokal harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK Lokal tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK Lokal tidak boleh lebih dari 4.00.'
                ]
            ],
            'ipk_uu' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                   'required' => 'IPK UU harus diisi.',
                    'decimal' => 'IPK UU harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK UU tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK UU tidak boleh lebih dari 4.00.'
                ]
            ],
            'rangkuman_nilai' => [
                'rules' => 'uploaded[rangkuman_nilai]|max_size[rangkuman_nilai,4096]|ext_in[rangkuman_nilai,pdf]',
                'errors' => [
                    'uploaded' => 'File rangkuman nilai harus diunggah.',
                    'max_size' => 'Ukuran file maksimal 4MB.',
                    'ext_in' => 'File harus berformat PDF.'
                ]
            ],
            'konfirmasi_akademik'=>[
                'rules'=> 'required|in_list[0,1,2]',
                'errors'=>[
                    'required'=> 'Konfirmasi Akademik harus dipilih',
                    'in_list'=>'Konfirmasi Akademik hanya pilih Diproses, Distujui, dan Ditolak'
                ]
            ]

        ];

        if (!$this->validate($validationRules)) {
            $err_msg = 'Jenis Beasiswa Gagal Diubah';       
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url("/admin/beasiswa/edit/{$id_akademik}"))->withInput();                                 
        }

        $npmInput = $this->request->getPost('npm');
        $id_penerima= $this->pbModel->GetID_pb($npmInput);
        if(!$id_penerima){
            $err_msg = 'NPM penerima beasiswa tidak ditemukan';   
            session()->setFlashdata('errors', [
                'general' => $err_msg,
                'npm' => 'NPM Not found!'
            ]);
            return redirect()->to(base_url("/admin/beasiswa/edit/{$id_akademik}"))->withInput();
        }

        $semesterInput = $this->request->getPost('semester');
        $TAInput = $this->request->getPost('TA'); 
        $checkLA = $this->laModel->checkSemesterAndTA($id_penerima, $semesterInput, $TAInput);
        if ($checkLA) {
            session()->setFlashdata('errors',             
                ['general' => "
                Laporan Akademik dengan 
                Semester ke-{$semesterInput} atau Tahun Ajaran {$TAInput} 
                untuk NPM {$npmInput} sudah ada. Silakan cek kembali."]
            );
            $listDataLA = $this->laModel->AllData_ID_pb($id_penerima);
            $listDataJB = $this->jbModel->AllDataActive_jenis();                
            $listDataTA = $this->tahunModel->AllData_name(); 
            $viewData=[
                "title" => "Akademik | ${npm}",
                'listDataLA' => $listDataLA,
                'listDataTA' => $listDataTA,
                'listDataJB' => $listDataJB
            ];
            return view('main/laporan-akademik', $viewData);            
        }

        $id_beasiswa = $this->jbModel->GetID_jb($this->request->getPost('jenis_beasiswa'));
        if (!$id_beasiswa) {  
            $err_msg = 'jenis beasiswa tidak ditemukan';
            session()->setFlashdata('errors', [
                
                'jenis_beasiswa' => 'Jenis Beasiswa Not found!'
            ]);
            return redirect()->to(base_url("/admin/beasiswa/edit/{$id_akademik}"))->withInput();            
        }

        $RNdoc_data = $dataLA['rangkuman_nilai'];
        $Directory_db = 'uploads/documents/akademik/rangkuman_nilai/';
        $RNdoc_Input = $this->request->getFile('rangkuman_nilai');
        if($RNdoc_Input->isValid() && !$RNdoc_Input->hasMoved()){
            if($RNdoc_data && file_exists(WRITEPATH . $Directory_db ,$RNdoc_data)){
                unlink(WRITEPATH . $Directory_db . $pp);
            }
            $RNdoc_name = time() . '_' . bin2hex(random_bytes(8)) . '.pdf'; ;
            $RNdoc_Input->move(WRITEPATH . $Directory_db,$RNdoc_name);
        }else{
            $RNdoc_name = $RNdoc_data;
        }
        $data = [            
            'id_beasiswa' => $id_beasiswa,
            'semester' => $semesterInput,
            'tahun_ajaran' => $TAInput,
            'ipk' => $this->request->getPost('ipk'),
            'ipk_lokal' => $this->request->getPost('ipk_lokal'),
            'ipk_uu' => $this->request->getPost('ipk_uu'),
            'rangkuman_nilai' => $RNdoc_name,
            'konfirmasi_akademik' => $this->request->getPost('konfirmasi_akademik'),
        ]; 

        $this->UpdateAndDirect($this->laModel,$id_akademik,$data,'admin/akademik','Laporan Akademik');
    }

    public function save_akademik()
    {
        $validationRules = [
            'npm'=>[
                'rules'=> 'required | numeric',
                'errors'=>[
                    'required' => 'NPM harus diisi',
                    'numeric'=>'NPM seharusnya angka'
                ]
                ],
            'jenis_beasiswa' => [
                'rules' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'errors' => [
                    'required' => 'Jenis beasiswa harus dipilih.',
                    'is_not_unique' => 'Jenis beasiswa tidak valid.'
                ]
            ],
            'semester' => [
                'rules' => 'required|greater_than_equal_to[0]||less_than_equal_to[14]',
                'errors' => [
                    'required' => 'Semester harus diisi.',
                    'greater_than_equal_to' => 'Semester tidak boleh kurang dari 0',
                    'less_than_equal_to' => 'Semester tidak boleh lebih dari 14'
                ]
            ],
            'TA' => [
                'rules' => 'required|regex_match[/^(PTA|ATA) \d{4}\/\d{4}$/]',
                'errors' => [
                    'required' => 'Tahun Ajaran harus diisi.',
                    'regex_match' => 'Tahun Ajaran tidak sesuai format'
                    
                ]
            ],
            'ipk' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK harus diisi.',
                    'decimal' => 'IPK harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK tidak boleh lebih dari 4.00.'
                ]
            ],
            'ipk_lokal' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'IPK Lokal harus diisi.',
                    'decimal' => 'IPK Lokal harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK Lokal tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK Lokal tidak boleh lebih dari 4.00.'
                ]
            ],
            'ipk_uu' => [
                'rules' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
                'errors' => [
                   'required' => 'IPK UU harus diisi.',
                    'decimal' => 'IPK UU harus berupa angka desimal.',
                    'greater_than_equal_to' => 'IPK UU tidak boleh kurang dari 0.00.',
                    'less_than_equal_to' => 'IPK UU tidak boleh lebih dari 4.00.'
                ]
            ],
            'rangkuman_nilai' => [
                'rules' => 'uploaded[rangkuman_nilai]|max_size[rangkuman_nilai,4096]|ext_in[rangkuman_nilai,pdf]',
                'errors' => [
                    'uploaded' => 'File rangkuman nilai harus diunggah.',
                    'max_size' => 'Ukuran file maksimal 4MB.',
                    'ext_in' => 'File harus berformat PDF.'
                ]
                ],
                'konfirmasi_akademik'=>[
                'rules'=> 'required|in_list[0,1,2]',
                'errors'=>[
                    'required'=> 'Konfirmasi Akademik harus dipilih',
                    'in_list'=>'Konfirmasi Akademik hanya pilih Diproses, Distujui, dan Ditolak'
                ]
                ],
        ];
        if (!$this->validate($validationRules)) {
            $err_msg = 'Jenis Beasiswa Gagal Ditambahkan';       
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url("/admin/beasiswa/add"))->withInput();                                 
        }
        $npmInput = $this->request->getPost('npm');
        $id_penerima= $this->pbModel->GetID_pb($npmInput);
        if(!$id_penerima){
            $err_msg = 'NPM penerima beasiswa tidak ditemukan';   
            session()->setFlashdata('errors', [
                'general' => $err_msg,
                'npm' => 'NPM Not found!'
            ]);
            return redirect()->to(base_url("/admin/beasiswa/add"))->withInput();
        }

        $semesterInput = $this->request->getPost('semester');
        $TAInput = $this->request->getPost('TA'); 
        $checkLA = $this->laModel->checkSemesterAndTA($id_penerima, $semesterInput, $TAInput);
        if ($checkLA) {
            session()->setFlashdata('errors',             
                ['general' => "
                Laporan Akademik dengan 
                Semester ke-{$semesterInput} atau Tahun Ajaran {$TAInput} 
                untuk NPM {$npmInput} sudah ada. Silakan cek kembali."]
            );
            $listDataLA = $this->laModel->AllData_ID_pb($id_penerima);
            $listDataJB = $this->jbModel->AllDataActive_jenis();                
            $listDataTA = $this->tahunModel->AllData_name(); 
            $viewData=[
                "title" => "Akademik | ${npm}",
                'listDataLA' => $listDataLA,
                'listDataTA' => $listDataTA,
                'listDataJB' => $listDataJB
            ];
            return view('main/laporan-akademik', $viewData);            
        }

        $id_beasiswa = $this->jbModel->GetID_jb($this->request->getPost('jenis_beasiswa'));
        if (!$id_beasiswa) {  
            $err_msg = 'jenis beasiswa tidak ditemukan';
            session()->setFlashdata('errors', [
                
                'jenis_beasiswa' => 'Jenis Beasiswa Not found!'
            ]);
            return redirect()->to(base_url('/admin/beasiswa/add'))->withInput();            
        }

        $rangkuman_nilai = $this->request->getFile('rangkuman_nilai');
        $nama_rn = time() . '_' . bin2hex(random_bytes(8)) . '.pdf';
        $rangkuman_nilai->move(WRITEPATH . 'uploads/documents/akademik/rangkuman_nilai/', $nama_rn);

        $maxAttempts = 5; // Batasi percobaan maksimal
        $attempt = 0;
        do {
            try {
                $uuidLA = bin2hex(random_bytes(16)); // Generate UUID unik

                $data = [
                    'id_penerima' => $id_penerima,
                    'id_beasiswa' =>  $id_beasiswa,                    
                    'uuid_la' => $uuidLA, // Gunakan UUID yang sudah dibuat
                    'semester' =>  $semesterInput,
                    'tahun_ajaran' => $TAInput,
                    'ipk' =>  $this->request->getPost('ipk'),
                    'ipk_lokal' =>  $this->request->getPost('ipk_lokal'),
                    'ipk_uu' =>  $this->request->getPost('ipk_uu'),
                    'rangkuman_nilai' => $nama_rn,
                    'konfirmasi_akademik' => $this->request->getPost('konfirmasi_akademik'),
                ];                
                $this->SaveAndDirect($this->laModel,$data,'/admin/akademik','Laporan Akademik');              

            } catch (\Exception $e) {
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    $attempt++;
                    if ($attempt >= $maxAttempts) {
                        session()->setFlashdata('errors',             
                            ['general' => 'Gagal menyimpan data setelah beberapa percobaan.']
                        );
                        return redirect()->to(base_url('/admin/akademik'));                        
                    }
                    continue; // Coba lagi dengan UUID baru
                } else {
                    session()->setFlashdata('errors',             
                        ['general' => 'Terjadi kesalahan saat menyimpan data.']
                    );
                    return redirect()->to(base_url('/admin/akademik'));                                            
                }
            }
        } while ($attempt < $maxAttempts);
                                     
    }

    public function prestasi()
    {
       
        $lp = $this->lpModel->AllData();

        $DataDiproses = $this->lpModel->GetProcessData();
        $data = [
            'title' => 'Laporan Prestasi | Admin',
            'lp' => $lp,
            'DataDiproses' => $DataDiproses,
        ];

        return view('main/laporan-prestasi', $data);
    }

    public function add_prestasi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Input Prestasi | Admin',
            'validation' => \Config\Services::validation(),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/tambah-prestasi', $data);
    }

    public function save_prestasi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
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
            ])
        ) {
            if ($this->lpModel->calc($this->lpModel->getDate($this->request->getPost('tanggal-mulai')), $this->lpModel->getDate($this->request->getPost('tanggal-selesai'))) < 0) {
                session()->setFlashdata('gagal', 'Tanggal terbit setelah batas pengumuman');
                return redirect()->to(base_url('/admin/prestasi'));
            }

            $bukti_prestasi = $this->request->getFile('bukti_prestasi');
            $nama_bp = $bukti_prestasi->getRandomName();
            $bukti_prestasi->move('asset/doc/database/bukti_prestasi', $nama_bp);
            $tanggal_mulai = $this->request->getPost('tanggal-mulai');
            $tanggal_selesai = $this->request->getPost('tanggal-selesai');
            $formatted_mulai = date('d F, Y', strtotime($tanggal_mulai)); // Pastikan format yang diterima valid
            $formatted_selesai = date('d F, Y', strtotime($tanggal_selesai));

            $capaianValue = $this->request->getPost('capaian');

            // Jika "Lainnya" dipilih, ambil nilai dari input "other_form"
            if ($capaianValue === 'Lainnya') {
                $capaianValue = $this->request->getPost('other_form'); // Ambil nilai custom dari input teks
            }
            $data = [
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp($this->request->getPost('npm')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $capaianValue,

                'tempat' => $this->request->getPost('tempat'),

                'tanggal_mulai' => $this->lpModel->getDate($formatted_mulai),
                'tanggal_selesai' => $this->lpModel->getDate($formatted_selesai),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => $nama_bp,
                'publikasi' => $this->request->getPost('publikasi'),
                'konfirmasi_prestasi' => 2,
            ];

            $this->lpModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/prestasi'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input Prestasi | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-prestasi', $data);
        }
    }

    public function edit_prestasi($id_prestasi)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Edit Prestasi | Admin',
            'validation' => \Config\Services::validation(),
            'former' => $this->lpModel->DetailData($id_prestasi),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/edit-prestasi', $data);
    }

    public function cedit_prestasi($id_prestasi)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
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
            ])
        ) {
            $tanggal_mulai = $this->request->getPost('tanggal-mulai');
            $tanggal_selesai = $this->request->getPost('tanggal-selesai');
            $formatted_mulai = date('d F, Y', strtotime($tanggal_mulai)); // Pastikan format yang diterima valid
            $formatted_selesai = date('d F, Y', strtotime($tanggal_selesai));

            $bukti_prestasi = $this->request->getFile('bukti_prestasi');
            $nama_bp = $bukti_prestasi->getRandomName();
            $bukti_prestasi->move('asset/doc/database/bukti_prestasi', $nama_bp);
            $capaianValue = $this->request->getPost('capaian');

            // Jika "Lainnya" dipilih, ambil nilai dari input "other_form"
            if ($capaianValue === 'Lainnya') {
                $capaianValue = $this->request->getPost('other_form'); // Ambil nilai custom dari input teks
            }
            $data = [
                'id_prestasi' => $id_prestasi,
                'id_beasiswa' => $this->lpModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->lpModel->getIDp($this->request->getPost('npm')),
                'tingkat' => $this->request->getPost('tingkat'),
                'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
                'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
                'capaian' => $capaianValue,
                'tempat' => $this->request->getPost('tempat'),
                'tanggal_mulai' => $this->lpModel->getDate($formatted_mulai),
                'tanggal_selesai' => $this->lpModel->getDate($formatted_selesai),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'bukti_prestasi' => $nama_bp,
                'publikasi' => $this->request->getPost('publikasi'),
                'konfirmasi_prestasi' => 2,
                'konf_ket_prestasi' => $this->request->getPost('konf_ket_prestasi'),
            ];

            $this->lpModel->UpdateData($id_prestasi, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/prestasi'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/prestasi'));
        }
    }

    public function confirm_prestasi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
        
        $DataDiproses = $this->lpModel->GetProcessData();
        $data = [
            'title' => 'Konfirmasi Prestasi | Admin',
            'lp' => $DataDiproses,
        ];

        return view('main/confirm-prestasi', $data);
    }
    public function save_confirm_prestasi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        // Ambil data konfirmasi dan keterangan
        $konfirmasi = $this->request->getPost('status_data');
        $keterangan = $this->request->getPost('konfirmasi_keterangan'); // Ambil keterangan
        $count = 0;

        // Validasi jika tidak ada data konfirmasi atau keterangan
        if (empty($konfirmasi) || empty($keterangan)) {
            // Jika tidak ada konfirmasi atau keterangan, arahkan kembali ke halaman prestasi dengan pesan error
            session()->setFlashdata('gagal', 'Tidak ada Data yang Dikonfirmasi');
            return redirect()->to(base_url('/admin/prestasi'));
        }

        // Jika ada konfirmasi dan keterangan, lakukan update
        foreach ($konfirmasi as $id => $status) {
            // Cek apakah ada keterangan untuk setiap konfirmasi
            $ket_konf = isset($keterangan[$id]) ? $keterangan[$id] : '-'; // Ambil keterangan yang sesuai
            $this->lpModel->update_konfirmasi_prestasi($id, $status, $ket_konf);
            $count++; // Increment jika data berhasil dikonfirmasi
        }

        // Jika data berhasil disimpan, beri notifikasi sukses

        // Jika ada data yang berhasil dikonfirmasi, beri notifikasi sukses
        session()->setFlashdata('berhasil', "$count data berhasil dikonfirmasi.");

        return redirect()->to(base_url('/admin/prestasi'));
    }

    public function mbkm()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $mbkm = $this->mbkmModel->AllData();
        $DataDiproses = $this->mbkmModel->GetProcessData();
        $data = [
            'title' => 'Magang Bersertifikat Kampus Merdeka | Admin',
            'mbkm' => $mbkm,
            'DataDiproses' => $DataDiproses,
        ];

        return view('main/laporan-mbkm', $data);
    }

    public function add_mbkm()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Input MBKM | Admin',
            'validation' => \Config\Services::validation(),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/tambah-mbkm', $data);
    }

    public function save_mbkm()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'nama_mbkm' => 'required',
                'jenis_mbkm' => 'required',
                'periode' => 'required',
                'keterangan_mbkm' => 'required',
            ])
        ) {
            $data = [
                'id_beasiswa' => $this->mbkmModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->mbkmModel->getIDp($this->request->getPost('npm')),
                'nama_mbkm' => $this->request->getPost('nama_mbkm'),
                'jenis_mbkm' => $this->request->getPost('jenis_mbkm'),
                'periode' => $this->request->getPost('periode'),
                'keterangan_mbkm' => $this->request->getPost('keterangan_mbkm'),
                'konfirmasi_mbkm' => 2,
            ];

            $this->mbkmModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/mbkm'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input MBKM | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-mbkm', $data);
        }
    }

    public function edit_mbkm($id_mbkm)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Edit MBKM | Admin',
            'validation' => \Config\Services::validation(),
            'former' => $this->mbkmModel->DetailData($id_mbkm),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/edit-mbkm', $data);
    }

    public function cedit_mbkm($id_mbkm)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'nama_mbkm' => 'required',
                'jenis_mbkm' => 'required',
                'periode' => 'required',
                'keterangan_mbkm' => 'required',
            ])
        ) {
            $data = [
                'id_mbkm' => $id_mbkm,
                'id_beasiswa' => $this->mbkmModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->mbkmModel->getIDp($this->request->getPost('npm')),
                'nama_mbkm' => $this->request->getPost('nama_mbkm'),
                'jenis_mbkm' => $this->request->getPost('jenis_mbkm'),
                'periode' => $this->request->getPost('periode'),
                'keterangan_mbkm' => $this->request->getPost('keterangan_mbkm'),
                'konfirmasi_mbkm' => 2,
                'konf_ket_mbkm' => $this->request->getPost('konf_ket_mbkm'),
            ];

            $this->mbkmModel->UpdateData($id_mbkm, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/mbkm'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/mbkm'));
        }
    }

    public function confirm_mbkm()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $DataDiproses = $this->mbkmModel->GetProcessData();
        $data = [
            'title' => 'Konfirmasi MBKM | Admin',
            'mbkm' => $DataDiproses,
        ];

        return view('main/confirm-mbkm', $data);
    }
    public function save_confirm_mbkm()
    {
        // Ambil data konfirmasi dan keterangan
        $konfirmasi = $this->request->getPost('status_data');
        $keterangan = $this->request->getPost('konfirmasi_keterangan'); // Ambil keterangan
        $count_success = 0;
        $count_errors = 0;

        // Validasi jika tidak ada data konfirmasi atau keterangan
        if (empty($konfirmasi) || empty($keterangan)) {
            // Jika tidak ada konfirmasi atau keterangan, arahkan kembali ke halaman mbkm dengan pesan error            
            session()->setFlashdata('errors',             
            ['general' => "Tidak ada Laporan MBKM yang dikonfirmasi"]
        )
            return redirect()->to(base_url('/admin/mbkm'));
        }

        // Jika ada konfirmasi dan keterangan, lakukan update
        foreach ($konfirmasi as $id => $status) {
            // Cek apakah ada keterangan untuk setiap konfirmasi
            $ket_konf = isset($keterangan[$id]) ? $keterangan[$id] : '-'; // Ambil keterangan yang sesuai
            
            $processingData = $this->mbkmModel->update_konfirmasi_mbkm($id, $status, $ket_konf);
            if($processingData){
                $count_success++;
            }else{
                $count_errors++;
            }
             // Increment jika data berhasil dikonfirmasi
        }

        if($count_success){
            session()->setFlashdata('success',             
            ['general' => "{$count_success} Laporan MBKM berhasil dikonfirmasi"]
        )}
        if($count_errors){
            session()->setFlashdata('errors',             
            ['general' => "{$count_errors} Laporan MBKM gagal dikonfirmasi. Terjadi kesalahan"]
        )}
        return redirect()->to(base_url('/admin/mbkm'));     

    }
    
      
    

    public function manajemen()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $user = $this->userModel->getAllUsersWithProfile();
        
        
        $data = [
            'title' => 'User Manajemen | Admin',
            'user' => $user,
            
        ];

        return view('main/manajemen-pengguna', $data);
    }

    public function add_manajemen()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Input User | Admin',
            'validation' => \Config\Services::validation(),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/tambah-manajemen', $data);
    }

    public function save_manajemen()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'username' => 'required|is_unique[jenis_beasiswa.jenis]',
                'password' => 'required',
                'hak_akses' => 'required',
                'status_user' => 'required',
            ])
        ) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'hak_akses' => $this->request->getPost('hak_akses'),
                'last_login' => $this->userModel->getCurrentDate(),
                'status_user' => $this->request->getPost('status_user'),
            ];

            $this->userModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/manajemen'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input User | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-manajemen', $data);
        }
    }

    public function edit_manajemen($id_user)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $data = [
            'title' => 'Form Edit User | Admin',
            'validation' => \Config\Services::validation(),

            $fixedIT
            'former' => $this->userModel->DetailData($id_user),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
        ];

        return view('main/edit-manajemen', $data);
    }

    public function cedit_manajemen($id_user)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'username' => 'required',
                'password_lama' => 'required|matches[password]',
                'password_baru' => 'required',
                'hak_akses' => 'required',
                'status_user' => 'required',
            ])
        ) {
            $data = [
                'id_user' => $id_user,
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password_baru'),
                'hak_akses' => $this->request->getPost('hak_akses'),
                'last_login' => $this->userModel->getCurrentDate(),
                'status_user' => $this->request->getPost('status_user'),
            ];

            $this->userModel->UpdateData($id_user, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/manajemen'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/manajemen'));
        }
    }

    public function del_manajemen($id_user)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'id_user' => $id_user,
        ];

        $this->userModel->DeleteData($data);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to(base_url('/admin/manajemen'));
    }

    public function keaktifan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
        $TA = $this->tahunModel->AllData();
        $ka = $this->kaModel->AllData();
        $DataDiproses = $this->kaModel->GetProcessData();
        $data = [
            'title' => 'Keaktifan per Semester | Admin',
            'ka' => $ka,
            'TA'=>$TA,
            'DataDiproses' => $DataDiproses,
        ];

        return view('main/keaktifan', $data);
    }
    public function confirm_keaktifan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
        $TA = $this->tahunModel->AllData();


        $DataDiproses = $this->kaModel->GetProcessData();
        $data = [
            'title' => 'Konfirmasi Keaktifan | Admin',
            'ka' => $DataDiproses,
            'TA'=> $TA
        ];

        return view('main/confirm-keaktifan', $data);
    }

    public function save_confirm_keaktifan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $konfirmasi = $this->request->getPost('status_data');
        $keterangan = $this->request->getPost('konfirmasi_keterangan'); // Ambil keterangan
        $jumlah_berhasil_dikonfirmasi = 0;
        if (empty($konfirmasi) || empty($keterangan)) {
            // Jika tidak ada konfirmasi atau keterangan, arahkan kembali ke halaman akademik dengan pesan error
            session()->setFlashdata('gagal', 'Tidak ada Data yang Dikonfirmasi');
            return redirect()->to(base_url('/admin/akademik'));
        }

        foreach ($konfirmasi as $id => $status) {
            // Cek apakah ada keterangan untuk setiap konfirmasi
            $ket_konf = isset($keterangan[$id]) ? $keterangan[$id] : '-'; // Ambil keterangan yang sesuai
            $this->laModel->update_konfirmasi_akademik($id, $status, $ket_konf);
            $jumlah_berhasil_dikonfirmasi++; // Increment jika data berhasil dikonfirmasi
        }
        session()->setFlashdata('berhasil', "$jumlah_berhasil_dikonfirmasi data berhasil dikonfirmasi.");

        return redirect()->to(base_url('/admin/keaktifan'));
    }

    public function add_keaktifan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $TA = $this->tahunModel->AllData();

        $data = [
            'title' => 'Form Input Keaktifan | Admin',
            'validation' => \Config\Services::validation(),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
            'TA' => $TA,
        ];
        return view('main/tambah-keaktifan', $data);
    }

    public function edit_keaktifan($id_keaktifan)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $pb = $this->pbModel->AllData();
        $TA = $this->tahunModel->AllData();
        $data = [
            'title' => 'Form Edit Keaktifan | Admin',
            'validation' => \Config\Services::validation(),
            $fixedit
            'former' => $this->kaModel->DetailData($id_keaktifan),
            'penerima' => $pb,
            'jenis_beasiswa' => $jb,
            'TA' => $TA,
        ];
        return view('main/edit-keaktifan', $data);
    }

    public function cedit_keaktifan($id_keaktifan)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'semester' => 'required',
                'TA' => 'required',
                'krs' => 'uploaded[krs]|max_size[krs,4096]|ext_in[krs,pdf]',
                'jumlah_ditagihkan' => 'required',
                'jumlah_potongan' => 'required',
                'blanko_pembayaran' => 'uploaded[blanko_pembayaran]|max_size[blanko_pembayaran,4096]|ext_in[blanko_pembayaran,pdf]',
                'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,4096]|ext_in[bukti_pembayaran,pdf]',
            ])
        ) {
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
                'id_keaktifan' => $id_keaktifan,
                'id_beasiswa' => $this->kaModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'id_penerima' => $this->kaModel->getIDp($this->request->getPost('npm')),
                'semester' => $this->request->getPost('semester'),
                'tahun_ajaran' => $this->request->getPost('TA'),
                'krs' => $nama_krs,
                'jumlah_ditagihkan' => $this->request->getPost('jumlah_ditagihkan'),
                'jumlah_potongan' => $this->request->getPost('jumlah_potongan'),
                'blanko_pembayaran' => $nama_blanko,
                'bukti_pembayaran' => $nama_bukti,
                'konfirmasi_keaktifan' => $this->request->getPost('konfirmasi_keaktifan'),
                'konf_ket_keaktifan' => $this->request->getPost('konf_ket_keaktifan'),
            ];

            $this->kaModel->UpdateData($id_keaktifan, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/keaktifan'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/keaktifan'));
        }
    }
    public function save_keaktifan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'npm' => 'required|is_not_unique[penerima_beasiswa.npm]',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',

                'semester' => 'required',
                'TA' => 'required',

                'krs' => 'uploaded[krs]|max_size[krs,4096]|ext_in[krs,pdf]',
                'jumlah_ditagihkan' => 'required',
                'jumlah_potongan' => 'required',
                'blanko_pembayaran' => 'uploaded[blanko_pembayaran]|max_size[blanko_pembayaran,4096]|ext_in[blanko_pembayaran,pdf]',
                'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,4096]|ext_in[bukti_pembayaran,pdf]',
            ])
        ) {
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
                'id_penerima' => $this->kaModel->getIDp($this->request->getPost('npm')),
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

            return redirect()->to(base_url('/admin/keaktifan'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $jb = $this->jbModel->AllData();
            $pb = $this->pbModel->AllData();
            $TA = $this->tahunModel->AllData();

            $data = [
                'title' => 'Form Input Keaktifan | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'jenis_beasiswa' => $jb,
                'TA' => $TA,
                'penerima' => $pb,
            ];

            return view('main/tambah-keaktifan', $data);
        }
    }

    public function gform()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $lgf = $this->lgfModel->AllData();
        $data = [
            'title' => 'Daftar Link Google Form | Admin',
            'lgf' => $lgf,
        ];
        return view('main/gform', $data);
    }

    public function add_gform()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Input Google Form | Admin',
            'validation' => \Config\Services::validation(),
            'jenis_beasiswa' => $jb,
        ];
        return view('main/tambah-gform', $data);
    }

    public function save_gform()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'nama_form' => 'required',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'tautan' => 'required',
                'datepicker' => 'required',
            ])
        ) {
            $data = [
                'nama_form' => $this->request->getPost('nama_form'),
                'id_beasiswa' => $this->lgfModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'tautan' => $this->request->getPost('tautan'),
                'tanggal_pembuatan' => $this->lgfModel->getDate($this->request->getPost('datepicker')),
            ];

            $this->lgfModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/gform'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input Google Form | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-gform', $data);
        }
    }

    public function edit_gform($id_lgf)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $jb = $this->jbModel->AllData();
        $data = [
            'title' => 'Form Edit Google Form | Admin',
            'validation' => \Config\Services::validation(),
            'former' => $this->lgfModel->DetailData($id_lgf),
            'jenis_beasiswa' => $jb,
        ];
        return view('main/edit-gform', $data);
    }

    public function cedit_gform($id_lgf)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'nama_form' => 'required',
                'jenis_beasiswa' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'tautan' => 'required',
                'datepicker' => 'required',
            ])
        ) {
            $data = [
                'id_lgf' => $id_lgf,
                'nama_form' => $this->request->getPost('nama_form'),
                'id_beasiswa' => $this->lgfModel->getIDb($this->request->getPost('jenis_beasiswa')),
                'tautan' => $this->request->getPost('tautan'),
                'tanggal_pembuatan' => $this->lgfModel->getDate($this->request->getPost('datepicker')),
            ];

            $this->lgfModel->UpdateData($id_lgf, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/gform'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/gform'));
        }
    }

    public function del_gform($id_lgf)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'id_lgf' => $id_lgf,
        ];

        $this->lgfModel->DeleteData($data);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to(base_url('/admin/gform'));
    }

    public function pengumuman()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $news = $this->newsModel->AllData();
        $data = [
            'title' => 'Pengumuman | Admin',
            'news' => $news,
        ];

        return view('main/pengumuman', $data);
    }

    public function add_pengumuman()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'title' => 'Form Input Pengumuman | Admin',
            'validation' => \Config\Services::validation(),
        ];

        return view('main/tambah-pengumuman', $data);
    }

    public function save_pengumuman()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'tanggal_terbit' => 'required',
                'tanggal_tarik' => 'required',
                'judul_pengumuman' => 'required',
                'deskripsi' => 'required',
            ])
        ) {
            if ($this->newsModel->calc($this->newsModel->getDate($this->request->getPost('tanggal_terbit')), $this->newsModel->getDate($this->request->getPost('tanggal_tarik'))) < 0) {
                session()->setFlashdata('gagal', 'Tanggal terbit setelah batas pengumuman');
                return redirect()->to(base_url('/admin/pengumuman'));
            }

            $data = [
                'tanggal_terbit' => $this->newsModel->getDate($this->request->getPost('tanggal_terbit')),
                'tanggal_tarik' => $this->newsModel->getDate($this->request->getPost('tanggal_tarik')),
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'penulis' => session()->get('username'),
            ];

            $this->newsModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/pengumuman'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());

            $data = [
                'title' => 'Form Input Pengumuman | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];

            return view('main/tambah-pengumuman', $data);
        }
    }

    public function edit_pengumuman($id_pengumuman)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $former = $this->newsModel->DetailData($id_pengumuman);
        $data = [
            'title' => 'Form Edit Pengumuman | Admin',
            'validation' => \Config\Services::validation(),
            'former' => $former,
            'terbit' => $this->newsModel->convDate($former->tanggal_terbit),
        ];

        return view('main/edit-pengumuman', $data);
    }

    public function cedit_pengumuman($id_pengumuman)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                // 'tanggal_terbit' => 'required',
                'tanggal_tarik' => 'required',
                'judul_pengumuman' => 'required',
                'deskripsi' => 'required',
            ])
        ) {
            $former = $this->newsModel->DetailData($id_pengumuman);

            if ($this->newsModel->calc($former->tanggal_terbit, $this->newsModel->getDate($this->request->getPost('tanggal_tarik'))) < 0) {
                session()->setFlashdata('gagal', 'Tanggal terbit setelah batas pengumuman');
                return redirect()->to(base_url('/admin/pengumuman'));
            }

            $data = [
                'id_pengumuman' => $id_pengumuman,
                'tanggal_terbit' => $former->tanggal_terbit,
                'tanggal_tarik' => $this->newsModel->getDate($this->request->getPost('tanggal_tarik')),
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'penulis' => $former->penulis,
            ];

            $this->newsModel->UpdateData($id_pengumuman, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/pengumuman'));
        } else {
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');
            return redirect()->to(base_url('/admin/pengumuman'));
        }
    }

    public function del_pengumuman($id_pengumuman)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'id_pengumuman' => $id_pengumuman,
        ];

        $this->newsModel->DeleteData($data);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to(base_url('/admin/pengumuman'));
    }

    public function panduan()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $data = [
            'title' => 'Buku Panduan | Admin',
        ];

        return view('main/panduan', $data);
    }

    public function log()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $log = $this->logModel->AllData();
        $data = [
            'title' => 'Log Aktivitas Pengguna | Admin',
            'log' => $log,
        ];

        return view('main/log-aktivitas', $data);
    }

    public function tahun_ajaran()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $TA = $this->tahunModel->AllData();

        $data = [
            'title' => 'Tahun Ajaran | Admin',
            'tahunAjaran' => $TA, // Kirim data ke view
        ];

        return view('main/tahun-ajaran', $data);
    }
    public function save_tahun_ajaran()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }
        // Lakukan validasi
        if (
            $this->validate([
                'TA' => 'required',
                'TAawal_get' => 'required',
                'TAakhir_get' => 'required',
            ])
        ) {
            $semester_tahun = $this->request->getPost('TA');
            $mulai_tahun_ajaran = $this->request->getPost('TAawal_get');
            $selesai_tahun_ajaran = $this->request->getPost('TAakhir_get');
            $nama_tahun = ($semester_tahun == 0 ? 'PTA' : 'ATA') . ' ' . $mulai_tahun_ajaran . '/' . $selesai_tahun_ajaran;
            $queue_tahun = intval($mulai_tahun_ajaran . $selesai_tahun_ajaran . '0' . $semester_tahun);
            // Proses data jika validasi berhasil
            

            $data = [
                'semester_tahun' => $semester_tahun,
                'mulai_tahun_ajaran' => $mulai_tahun_ajaran,
                'selesai_tahun_ajaran' => $selesai_tahun_ajaran,
                'nama_tahun' => $nama_tahun,
                'queue_tahun' => $queue_tahun,
            ];

            // Simpan data
            $this->tahunModel->InsertData($data);

            // Set flashdata sukses
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('/admin/tahun-ajaran')); // Redirect ke halaman lain
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $TA = $this->tahunModel->AllData();

            $data = [
                'title' => 'Tahun Ajaran | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'tahunAjaran' => $TA,
            ];
            session()->setFlashdata('gagal', 'Data tidak berhasil ditambahkan');

            return view('/main/tahun-ajaran', $data);
        }
    }

    public function cedit_tahun_ajaran($id_tahun)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'TA_cedit' => 'required',
                'TA_awal_cedit' => 'required',
                'TA_akhir_cedit' => 'required',
            ])
        ) {
            $semester_tahun = $this->request->getPost('TA_cedit');
            $mulai_tahun_ajaran = $this->request->getPost('TA_awal_cedit');
            $selesai_tahun_ajaran = $this->request->getPost('TA_akhir_cedit');
            $nama_tahun = ($semester_tahun == 0 ? 'PTA' : 'ATA') . ' ' . $mulai_tahun_ajaran . '/' . $selesai_tahun_ajaran;
            $queue_tahun = intval($mulai_tahun_ajaran . $selesai_tahun_ajaran . '0' . $semester_tahun);
            // Proses data jika validasi berhasil
            $data = [
                'id_tahun' => $id_tahun,
                'semester_tahun' => $semester_tahun,
                'mulai_tahun_ajaran' => $mulai_tahun_ajaran,
                'selesai_tahun_ajaran' => $selesai_tahun_ajaran,
                'nama_tahun' => $nama_tahun,
                'queue_tahun' => $queue_tahun,
            ];

            $this->tahunModel->UpdateData($id_tahun, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/tahun-ajaran'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $TA = $this->tahunModel->AllData();

            $data = [
                'title' => 'Tahun Ajaran | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'tahunAjaran' => $TA,
            ];
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');

            return view('/main/tahun-ajaran', $data);
            return redirect()->to(base_url('/admin/tahun-ajaran'));
        }
    }


    public function program_studi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        $PS = $this->prodiModel->AllData();

        $data = [
            'title' => 'Program Studi | Admin',
            'programStudi' => $PS, // Kirim data ke view
        ];

        return view('main/program-studi', $data);
    }
    public function save_program_studi()
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'id_prodi_input' => 'required',
                'nama_prodi_input' => 'required',
                'fakultas_prodi_input' => 'required',
                'akreditasi_prodi_input' => 'required',

                'jenjang_prodi_input' => 'required',
                'status_prodi_input' => 'required',
                
            ])
        ) {
            
            $data = [
                'id_prodi' => $this->request->getPost('id_prodi_input'),
                'nama_prodi' => $this->request->getPost('nama_prodi_input'),
                'fakultas_prodi' => $this->request->getPost('fakultas_prodi_input'),
                'akreditasi_prodi' => $this->request->getPost('akreditasi_prodi_input'),
                'jenjang_prodi' => $this->request->getPost('jenjang_prodi_input'),
                'status_prodi' => $this->request->getPost('status_prodi_input'),
            ];
       

            $this->prodiModel->InsertData($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');

            return redirect()->to(base_url('/admin/program-studi'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $PS = $this->prodiModel->AllData();

            $data = [
            'title' => 'Program Studi | Admin',
            'programStudi' => $PS,
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
            ];
            session()->setFlashdata('gagal', 'Data tidak berhasil ditambahkan');
            return view('main/program-studi', $data);
        }
    }
    public function cedit_program_studi($id_prodi)
    {
        if (session()->get('hak_akses') != '1') {
            session()->setFlashdata('belum_login', 'Anda Belum Login Sebagai Admin');
            return redirect()->to(base_url('/admin/login'));
        }

        if (
            $this->validate([
                'id_prodi_cedit' => 'required',
                'nama_prodi_cedit' => 'required',
                'fakultas_prodi_cedit' => 'required',
                'akreditasi_prodi_cedit' => 'required',

                'jenjang_prodi_cedit' => 'required',
                'status_prodi_cedit' => 'required',
            ])
        ) {
            
            $data = [
                'id_prodi' => $this->request->getPost('id_prodi_cedit'),
                'nama_prodi' => $this->request->getPost('nama_prodi_cedit'),
                'fakultas_prodi' => $this->request->getPost('fakultas_prodi_cedit'),
                'akreditasi_prodi' => $this->request->getPost('akreditasi_prodi_cedit'),
                'jenjang_prodi' => $this->request->getPost('jenjang_prodi_cedit'),
                'status_prodi' => $this->request->getPost('status_prodi_cedit'),
            ];

            $this->prodiModel->UpdateData($id_prodi, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diubah');

            return redirect()->to(base_url('/admin/program-studi'));
        } else {
            $session = session();
            $session->setFlashdata('input', $this->request->getPost());
            $PS = $this->prodiModel->AllData();


            $data = [
                'title' => 'Tahun Ajaran | Admin',
                'validation' => \Config\Services::validation(),
                'input' => $session->getFlashdata('input'),
                'programStudi' => $PS,
                
            ];
            session()->setFlashdata('gagal', 'Data tidak berhasil diubah');

            return view('/main/program-studi', $data);
       
        }
    }
}