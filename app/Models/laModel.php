<?php  

namespace App\Models;

use CodeIgniter\Model;

class laModel extends Model
{
    protected $table            = 'laporan_akademik';
    protected $primaryKey       = 'id_akademik';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'semester', 'tahun_ajaran', 'ipk', 'ipk_lokal', 'ipk_uu', 'rangkuman_nilai','konf_ket_akademik','konfirmasi_akademik'];

    public function GetProcessData(){
        return $this->db->table('laporan_akademik')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_akademik.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_akademik.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('konfirmasi_akademik',2)->Get()->getResultArray();
    }
    public function update_konfirmasi_akademik($id, $status,$ket_konf) {
        // Memperbarui status konfirmasi akademik berdasarkan ID yang diberikan
        $data = [
            'konfirmasi_akademik' => $status,
            'konf_ket_akademik' => $ket_konf
        ];
        $this->db->table('laporan_akademik')->where('id_akademik', $id)->update($data);
        
    }
    public function AllData()
    {
        return $this->db->table('laporan_akademik')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_akademik.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_akademik.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_akademik')->insert(($data));
    }

    public function DetailData($id_akademik)
    {
        return $this->db->table('laporan_akademik')
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_akademik.id_beasiswa', 'left')
        ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_akademik.id_penerima', 'left')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->where('id_akademik', $id_akademik)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('laporan_akademik')->where('id_akademik', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_akademik')->where('id_akademik', $data['id_akademik'])->delete($data);
    }

    public function getIDb($data)
    {
        $b = $this->db->table('jenis_beasiswa')->where('jenis', $data)->get()->getRow();
        $b = get_object_vars($b);
        return $b['id_beasiswa'];
    }

    public function getIDp($data)
    {
        $p = $this->db->table('penerima_beasiswa')->where('npm', $data)->get()->getRow();
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
        $b = $this->db->table('laporan_akademik')->where('id_akademik', $id)->get()->getRow();
        $b = get_object_vars($b);
        return $b['rangkuman_nilai'];
    }
}