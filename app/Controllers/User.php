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
        $viewData = [
            'title' => 'Login Penerima Beasiswa | MBUG',
        ];

        return view('user-main/user-login', $viewData);
    }

    public function user_login_check()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($session->has('login_block_time') && time() < $session->get('login_block_time')) {
            session()->setFlashdata('errors',            
                ['general' => 'Terlalu banyak percobaan gagal. Coba lagi setelah '
                .ceil(($session->get('login_block_time') - time())) . ' detik.']
            );          
            return redirect()->to(base_url('/user/login'))->withInput();                    
        }

        if ($session->get('login_attempts') >= 5) {
            $session->set('login_block_time', time() + (3)); // Blokir selama 3 detik
            $session->set('login_attempts', 0); 
            session()->setFlashdata('errors',             
                ['general' => 'Terlalu banyak percobaan gagal. Coba lagi dalam beberapa detik.']
            );
            return redirect()->to(base_url('/user/login'))->withInput();            
        }
       
        $check = $this->loginModel->login_check_u($username);  
        if (!$check || !password_verify($password, $check["password"])) {
            $session->set('login_attempts', ($session->get('login_attempts') ?? 0) + 1);
            session()->setFlashdata('errors',             
                ['general' => 'Username atau Password salah.']
            );
            return redirect()->to(base_url('/user/login'))->withInput();                       
        }
        
   
        if ($check["hak_akses"] == "0") {
            
            $session->remove('login_attempts');
            $session->remove('login_block_time');
            $session->regenerate(true);

            $userData = [
                'uuid_user' => $check["uuid_user"],
                'id_penerima'=>$check["id_penerima"],
                'username' => $check["username"],
                'nama_user' => $check["nama"],
                'hak_akses' => $check["hak_akses"],
                'status_user' => $check["status_user"],
                'pp' => $check["ppicture"],
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
            return redirect()->to(base_url('/user/home'));              
        } elseif ($check["hak_akses"] == "1") {
            session()->setFlashdata('errors', ['general' => 'Akun terdaftar sebagai Admin.']);
            return redirect()->to(base_url('/admin/login'))->withHeaders(['Cache-Control' => 'no-store'])->send();
            session()->destroy();
            exit;               
        } else {
            session()->setFlashdata('errors', ['general' => 'Terjadi kesalahan, silakan coba lagi.']);
            return redirect()->to(base_url('/user/login'))->withHeaders(['Cache-Control' => 'no-store'])->send();
            session()->destroy();
            exit;                    
        }
    }

    public function user_logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/user/login'));
    }

    public function user_home()
    {                         
        $news = $this->newsModel->AllData();
        $viewData = [
            'title' => 'Dashboard | MBUG',
            'news' => $news,
        ];
        return view('user-main/dashboard', $viewData);
    }

    

    public function  user_profile()
    {
        $session = session();    
        $profile = $this->pbModel->DetailDataUUID($session->get('uuid_user'));
        if(!$profile){
            session()->setFlashdata('errors',             
                ['general' => 'Profile tidak ditemukan']
            );
            return redirect()->to(base_url('/user/home'));
        }
        $viewData = [
            'title' => 'Profile | MBUG',          
            'profile' => $profile,
        ];

        return view('user-main/user-profile', $viewData);
    }

   
    public function cedit_user_profile($uuid_pb)
    {
        $session=session();
        $id_penerima = $session->get('id_penerima');
        $penerima = $this->pbModel->DetailDataUUID($uuid_pb,'id_penerima, ppicture');
        if(!$penerima){
            session()->setFlashdata('errors',             
                ['general' => 'Profile tidak ditemukan']
            );            
            return redirect()->to(base_url('/user/home'))->withInput();            
        }
        if($penerima['id_penerima']!=$id_penerima){
            session()->setFlashdata('errors',             
            ['general' => 'Anda tidak memiliki izin.']
            );            
            return redirect()->to(base_url('/user/home'));
        }

        
        $validationRules = [
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor HP harus diisi.',
                    'numeric' => 'Nomor HP hanya boleh berisi angka.',
                    'min_length' => 'Nomor HP minimal 10 digit.',
                    'max_length' => 'Nomor HP maksimal 15 digit.'
                ]
            ],
            'file-input' => [
                'rules' => 'max_size[file-input,2048]|is_image[file-input]|mime_in[file-input,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format gambar yang diperbolehkan: PNG, JPG, JPEG.'
                ]
            ]
        ];
        if (!$this->validate($validationRules)) {
            $err_msg = 'Profile Gagal diubah';        
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url('/user/profile'))->withInput();
        }

        $pp = $penerima['ppicture']; // Foto lama dari database
        $foto_pp = $this->request->getFile('file-input');
        
        // Jika ada file baru yang diunggah, lakukan validasi
        if ($foto_pp->isValid() && !$foto_pp->hasMoved()) {
            // Hapus foto lama jika ada dan file-nya masih tersedia
            if (!empty($pp) && file_exists(WRITEPATH . 'uploads/images/profile_pictures/' . $pp)) {
                unlink(WRITEPATH . 'uploads/images/profile_pictures/' . $pp);
            }
        
            // Simpan foto baru dengan nama acak
            $nama_pp = $foto_pp->getRandomName();
            $foto_pp->move(WRITEPATH . 'uploads/images/profile_pictures/', $nama_pp);
        } else {
            // Jika tidak ada file baru, gunakan foto lama
            $nama_pp = $pp;
        }
        
        $data = [            
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'ppicture' => $nama_pp, // Gunakan foto baru jika ada, jika tidak pakai yang lama
        ];
        
        $this->pbModel->UpdateData($id_penerima, $data);
        
        // Update session dengan foto baru atau tetap yang lama
        session()->set([
            'pp' => $nama_pp,
        ]);
        session()->setFlashdata('success',             
                ['general' => 'Profile berhasil diubah']
            );
            return redirect()->to(base_url('/user/profile'));         
    }
 
  
   
    public function cedit_password_profile($uuid_user)
    {
        $session=session();
        $uuid_session = $session->get('uuid_user');
        $account = $this->userModel->DetailDataUUID($uuid_user,'id_user, uuid_user, password');
        if (!$account) {                       
            session()->setFlashdata('errors',             
                ['general' => 'User tidak ditemukan.']
            );
            return redirect()->to(base_url('/user/home'));
        }
        if($account['uuid_user']!=$uuid_session){
            session()->setFlashdata('errors',             
                ['general' => 'Anda tidak memiliki izin.']
            );            
            return redirect()->to('/user/home');
        }
    

        // Ambil input password lama & baru
        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');

        if (!password_verify($passwordLama, $account['password'])) {
            session()->setFlashdata('errors',             
                ['general' => 'Password lama salah.']
            );
            return redirect()->to(base_url('/user/profile'));
        }
        // ✅ 1. Validasi input password dengan aturan dan pesan custom
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
            return redirect()->to(base_url('/user/profile'));
        }

        // ✅ 2. Cek apakah password lama benar
        
        $this->userModel->updatePassword($account->id_user, $passwordBaru);
        session()->setFlashdata('success',             
        ['general' => 'Kata sandi berhasil diubah']
        );
        return redirect()->to(base_url('/user/profile'));

    }


    public function user_akademik()
    {
        $session = session();       
        $listDataLA = $this-laModel->AllData_User_ID($session->get('id_penerima'));      
           
        $viewData = [
            'title' => 'Akademik | MBUG',
            'listDataLA' => $listDataLA,
        ];
        return view('user-main/laporan-akademik', $viewData);
    }

    public function user_add_akademik()
    {

        $listDataJB = $this->jbModel->AllDataActive_jenis();                
        $listDataTA = $this->tahunModel->AllData_name();
        $viewData = [
            'title' => 'Form Input Akademik | User',            
            'listDataJB' => $listDataJB,
            'listDataTA'=> $listDataTA,
        ];

        return view('user-main/tambah-akademik', $viewData);
    }

    public function user_save_akademik()
    {
        // ✅ 1. Validasi Input
        $validationRules = [
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
            ]
        ];
    
        if (!$this->validate($validationRules)) {
            $err_msg = 'Laporan Akademik Gagal Ditambahkan';       
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url('/user/akademik/add'))->withInput();                                 
        }

        $session= session();
        $id_penerima= $session->get('id_penerima');  
        $semesterInput = $this->request->getPost('semester');
        $TAInput = $this->request->getPost('TA');                      
        $checkLA = $this->laModel->checkSemesterAndTA($id_penerima, $semesterInput, $TAInput);
        if ($checkLA) {
            session()->setFlashdata('errors',             
                ['general' => "Laporan Akademik dengan Semester ke-{$semesterInput} atau Tahun Ajaran {$TAInput} sudah ada. Silakan cek kembali."]
            );
            return redirect()->to(base_url('/user/akademik'));            
        }

        
        $id_beasiswa = $this->jbModel->GetID_jb($this->request->getPost('jenis_beasiswa'));
        if (!$id_beasiswa) {  
            session()->setFlashdata('errors', [              
                'jenis_beasiswa' => 'Jenis Beasiswa Not found!'
            ]);
            return redirect()->to(base_url('/user/beasiswa/add'))->withInput();            
        }
    
        // ✅ 2. Ambil & Pindahkan File
        $rangkuman_nilai = $this->request->getFile('rangkuman_nilai');
        $nama_rn = time() . '_' . bin2hex(random_bytes(8)) . '.pdf';
        $rangkuman_nilai->move(WRITEPATH . 'uploads/documents/akademik/rangkuman_nilai/', $nama_rn);
    
        $maxAttempts = 5; // Batasi percobaan maksimal
        $attempt = 0;
        do {
            try {
                $uuidLA = bin2hex(random_bytes(16)); // Generate UUID unik

                $data = [
                    'id_beasiswa' => (int) $id_beasiswa,
                    'id_penerima' => (int)  session()->get('id_penerima'),
                    'uuid_la' => $uuidLA, // Gunakan UUID yang sudah dibuat
                    'semester' => (int) $semesterInput,
                    'tahun_ajaran' => $TAInput,
                    'ipk' => (float) $this->request->getPost('ipk'),
                    'ipk_lokal' => (float) $this->request->getPost('ipk_lokal'),
                    'ipk_uu' => (float) $this->request->getPost('ipk_uu'),
                    'rangkuman_nilai' => $nama_rn,
                    'konfirmasi_akademik' => 2,
                ];

                $this->laModel->InsertData($data);
                session()->setFlashdata('success',             
                    ['general' => 'Data berhasil disimpan.']
                );
                return redirect()->to(base_url('/user/akademik'));                

            } catch (\Exception $e) {
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    $attempt++;
                    if ($attempt >= $maxAttempts) {
                        session()->setFlashdata('errors',             
                            ['general' => 'Gagal menyimpan data setelah beberapa percobaan.']
                        );
                        return redirect()->to(base_url('/user/akademik'));                        
                    }
                    continue; // Coba lagi dengan UUID baru
                } else {
                    session()->setFlashdata('errors',             
                        ['general' => 'Terjadi kesalahan saat menyimpan data.']
                    );
                    return redirect()->to(base_url('/user/akademik'));                                            
                }
            }
        } while ($attempt < $maxAttempts);
    }
    
    public function user_edit_akademik($uuid_la)
    {
        $session = session();

        $dataLA =  $this->laModel->DetailData_uuid($uuid_la);
        if(!$dataLA){
            session()->setFlashdata('errors',             
                ['general' => 'Laporan Akademik tidak ditemukan']
            );
            return redirect()->to(base_url('/user/akademik'));
        }

        if($dataLA['id_penerima']!=$session->get('id_penerima')){
            session()->setFlashdata('errors',             
                ['general' => 'Anda tidak memiliki izin.']
            );
            return redirect()->to(base_url('/user/home'));            
        }

        $listDataJB = $this->jbModel->AllDataActive_jenis();                
        $listDataTA = $this->tahunModel->AllData_name();        
        $viewData = [
            'title' => 'Form edit Akademik | User',            
            'dataLA' => $dataLA,
            'listDataJB' => $listDataJB,
            'listDataTA'=>$$listDataTA
        ];        
        return view('user-main/edit-akademik', $viewData);

    }

    

    public function user_cedit_akademik($uuid_la)
    {
        $session= session();
        $id_penerima= $session->get('id_penerima');  
        
        $dataLA =  $this->laModel->EditDetailData_uuid($uuid_la);
        if(!$dataLA){
            session()->setFlashdata('errors',             
                ['general' => 'Laporan Akademik tidak ditemukan']
            );
            return redirect()->to(base_url('/user/akademik'));
        }

        if($dataLA['id_penerima']!=$session->get('id_penerima')){
            session()->setFlashdata('errors',             
                ['general' => 'Anda tidak memiliki izin.']
            );
            return redirect()->to(base_url('/user/home'));            
        }




        $validationRules = [
            'jenis_beasiswa' => [
                'rules' => 'required|is_not_unique[jenis_beasiswa.jenis]',
                'errors' => [
                    'required' => 'Jenis beasiswa harus dipilih.',
                    'is_not_unique' => 'Jenis beasiswa tidak valid.'
                ]
            ],
            'semester' => [
                'rules' => 'required|greater_than_equal_to[0]|less_than_equal_to[14]',
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
            ]
        ];

        if (!$this->validate($validationRules)) {
            $err_msg = 'Laporan Akademik Gagal diubah';        
            session()->setFlashdata('errors', array_merge(
                ['general' => $err_msg], 
                $this->validator->getErrors()
            ));
            return redirect()->to(base_url("/user/akademik/edit/{$uuid_la}"))->withInput();           
        }

        
        $semesterInput = $this->request->getPost('semester');
        $TAInput = $this->request->getPost('TA');  

        $id_beasiswa = $this->jbModel->GetID_jb($this->request->getPost('jenis'));
        if(!$id_beasiswa){            
            session()->setFlashdata('errors', [
                
                'jenis_beasiswa' => 'Jenis Beasiswa Not found!'
            ]);
            return redirect()->to(base_url("/user/akademik/edit/{$uuid}")); 
        }


        $duplicateLA = $this->laModel->GetDataSemesterAndTA($id_penerima, $semesterInput, $TAInput);
        if($duplicateLA){
            $count=0;
            foreach ($duplicateLA as $key => $value){
                if($value['konfirmasi_akademik']=='1'){                    
                    session()->setFlashdata('errors',             
                    ['general' => "Laporan Akademik dengan Semester ke-{$semesterInput} atau Tahun Ajaran {$TAInput} sudah ada dan disetujui. Silakan cek kembali."]
                    );
                    return redirect()->to(base_url('/user/akademik'));
                }
                $dataDuplicate = [
                    'konfirmasi_akademik' => 0,
                    'konf_ket_akademik'=>'Laporan Anda ditolak karena terdapat duplikasi laporan. Mohon di check kembali'
                ];
                $this->laModel->UpdateData($value['id_akademik'],$dataDuplicate);
                $count+=1;
            };
            session()->setFlashdata('warning', 
                ['general' => "[!] Terdapat {$count} Laporan yang ditolak karena duplikasi."]              
            );
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
            'konfirmasi_akademik' => 2,
        ];

        $this->UpdateAndDirect($this->$laModel,$dataLA['id_akademik'],$data,'/user/akademik','Laporan Akademik');             

    }

//  ---------------------------
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
            session()->setFlashdata('success', 'Data berhasil ditambahkan');

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
            $fixedIT
            'former' => $this->mbkmModel->DetailData_id($id_mbkm),
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
            session()->setFlashdata('success', 'Data berhasil diubah');

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
            session()->setFlashdata('success', 'Data berhasil ditambahkan');

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
            session()->setFlashdata('success', 'Data berhasil diubah');

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
            session()->setFlashdata('success', 'Data berhasil ditambahkan');

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
            $fixedIT
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
            session()->setFlashdata('success', 'Data berhasil diubah');

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