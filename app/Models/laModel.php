<?php  

namespace App\Models;

use CodeIgniter\Model;

class laModel extends Model
{
    protected $table            = 'laporan_akademik';
    protected $primaryKey       = 'id_akademik';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa','uuid_la', 'id_penerima', 'semester', 'tahun_ajaran', 'ipk', 'ipk_lokal', 'ipk_uu', 'rangkuman_nilai','konf_ket_akademik','konfirmasi_akademik'];

    public function AllData()
{
    return $this
        ->select('laporan_akademik.*, jenis_beasiswa.jenis, penerima_beasiswa.npm, penerima_beasiswa.nama, program_studi.nama_prodi')
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa = laporan_akademik.id_beasiswa', 'left')
        ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima = laporan_akademik.id_penerima', 'left')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')  
        ->orderBy('FIELD(konfirmasi_akademik, 2, 0, 1)') 
        ->orderBy('id_akademik', 'ASC') 
        ->get()
        ->getResultArray();    
}

    public function GetProcessData(){
        return $this
        ->select('laporan_akademik.*, jenis_beasiswa.jenis, penerima_beasiswa.npm, penerima_beasiswa.nama, program_studi.nama_prodi')
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa = laporan_akademik.id_beasiswa', 'left')
        ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima = laporan_akademik.id_penerima', 'left')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')  
        ->where('konfirmasi_akademik',2)
        ->orderBy('FIELD(konfirmasi_akademik, 2, 0, 1)') 
        ->orderBy('id_akademik', 'ASC')        
        ->get()
        ->getResultArray();   
        
    }


    public function DetailData_uuid($uuid_la)
    {
        return $this->db->query("SELECT laporan_akademik.*, jenis_beasiswa.jenis 
            FROM laporan_akademik 
            LEFT JOIN jenis_beasiswa ON jenis_beasiswa.id_beasiswa = laporan_akademik.id_beasiswa 
            WHERE laporan_akademik.uuid_la = ?", [$uuid_la])->getRowArray();
    }

    public function EditDetailData_uuid($uuid_la)
    {
        return $this->db->query("SELECT laporan_akademik.id_penerima, laporan_akademik.rangkuman_nilai, laporan_akademik.id_akademik
            FROM laporan_akademik             
            WHERE laporan_akademik.uuid_la = ?", [$uuid_la])->getRowArray();
    }

    public function AllData_ID_pb($id_penerima){
        return $this
            ->select('laporan_akademik.*, jenis_beasiswa.jenis, penerima_beasiswa.npm, penerima_beasiswa.nama, program_studi.nama_prodi')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_akademik.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_akademik.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('id_penerima',$id_penerima)
            ->Get()->getResultArray();
    }

    public function AllData_User_ID($id_penerima, $select = '*')
    {
        // Jika select default `*`, ambil semua kolom laporan_akademik + nama_prodi
        if ($select === '*') {
            $select = 'laporan_akademik.*, jenis_beasiswa.jenis';
        } else {
            // Pisahkan kolom berdasarkan koma
            $columns = explode(',', $select);
            $newColumns = [];
    
            foreach ($columns as $col) {
                $col = trim($col); // Hapus spasi
                // Jika tidak ada titik dalam nama kolom, tambahkan `laporan_akademik.`
                if (!strpos($col, '.')) {
                    $col = 'laporan_akademik.' . $col;
                }
                $newColumns[] = $col;
            }
    
            // Gabungkan kembali kolom-kolom
            $select = implode(', ', $newColumns) . ', jenis_beasiswa.id_beasiswa';
        }
        $query = $this->db->table('laporan_akademik')
        ->select($select)
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa = laporan_akademik.id_beasiswa', 'left')
        ->where('laporan_akademik.id_penerima', $id_penerima)
        ->get()
        ->getResultArray(); // Selalu return array
    
        return $query ?: [];
    }

  
    public function checkSemesterAndTA($id_penerima, $semester, $TA)
    {
        return $this->where('id_penerima', $id_penerima)
                    ->groupStart()
                        ->where('semester', $semester)
                        ->orWhere('TA', $TA)
                    ->groupEnd()
                    ->countAllResults() > 0; // Jika ada data, return true
    }
    
    public function GetDataSemesterAndTA($id_penerima, $semester, $tahun_ajaran)
    {
        return $this->select('laporan_akademik.id_akademik, laporan_akademik.konf_ket_akademik, laporan_akademik.konfirmasi_akademik')
                    ->where('id_penerima', $id_penerima)
                    ->groupStart()
                        ->where('semester', $semester)
                        ->orWhere('tahun_ajaran', $tahun_ajaran) // Pakai nama kolom yang sesuai di DB
                    ->groupEnd()
                    ->get()
                    ->getResultArray(); // Pastikan getResultArray dipanggil setelah get()
    }






    public function update_konfirmasi_akademik($id, $status,$ket_konf) {
        // Memperbarui status konfirmasi akademik berdasarkan ID yang diberikan
        $data = [ 
            'konfirmasi_akademik' => $status,
            'konf_ket_akademik' => $ket_konf
        ];
        $this->db->table('laporan_akademik')->where('id_akademik', $id)->update($data);        
    }
    

    


   
  




    public function InsertData($data)
    {
        $this->insert(($data));
    }


    public function DetailData_id($id_akademik)
    {
        return $this
        ->select('laporan_akademik.*, jenis_beasiswa.jenis, penerima_beasiswa.npm, penerima_beasiswa.nama, program_studi.nama_prodi')
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa = laporan_akademik.id_beasiswa', 'left')
        ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima = laporan_akademik.id_penerima', 'left')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')                 
        ->where('id_akademik', $id_akademik)->get()->getRowArray();
    }


    public function EditDetailData_id($id_akademik)
    {
        return $this->db->query("SELECT laporan_akademik.id_penerima, laporan_akademik.rangkuman_nilai, laporan_akademik.id_akademik
            FROM laporan_akademik             
            WHERE laporan_akademik.id_akademik = ?", [$id_akademik])->getRowArray();
    }




    public function UpdateData($id, $data)
    {
        return $this->db->table('laporan_akademik')->where('id_akademik', $id)->update($data);
    }
    public function UpdateDataUUID($uuid_la, $data)
    {
        return $this->db->table('laporan_akademik')->where('uuid_la', $uuid_la)->update($data);
    }


    public function DeleteData($data)
    {
        $this->db->table('laporan_akademik')->where('id_akademik', $data['id_akademik'])->delete($data);
    }

    public function getIDb($jenis)
{
    return $this->db->table('jenis_beasiswa')
        ->select('id_beasiswa')  // Ambil hanya kolom yang dibutuhkan
        ->where('jenis', $jenis)
        ->get()
        ->getRowArray('id_beasiswa'); // Langsung ambil nilai id_beasiswa
}

    public function getIDp($data)
    {
        $p = $this->db->table('penerima_beasiswa')->where('npm', $data)->get()->getRowArray();
        $p = get_object_vars($p);
        return $p['id_penerima'];
    }

    public function getTA($ta, $bef, $af)
    {
        $tahun_ajaran = $ta . " " . $bef . "/" . $af;
        return($tahun_ajaran);
    }

    public function getDoc($id)
    {
        $b = $this->db->table('laporan_akademik')->where('id_akademik', $id)->get()->getRowArray();
        $b = get_object_vars($b);
        return $b['rangkuman_nilai'];
    }
}