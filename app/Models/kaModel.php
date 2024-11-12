<?php

namespace App\Models;

use CodeIgniter\Model;

class kaModel extends Model
{
    protected $table            = 'laporan_keaktifan';
    protected $primaryKey       = 'id_keaktifan';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'semester', 'tahun_ajaran', 'krs', 'jumlah_ditagihkan', 'jumlah_potongan', 'blanko_pembayaran', 'bukti_pembayaran','konf_ket_keaktifan','konfirmasi_keaktifan'];

    public function GetProcessData(){
        return $this->db->table('laporan_keaktifan')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_keaktifan.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_keaktifan.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('konfirmasi_keaktifan',2)->Get()->getResultArray();
    }
    public function update_konfirmasi_keaktifan($id, $status,$ket_konf) {
        // Memperbarui status konfirmasi keaktifan berdasarkan ID yang diberikan
        $data = [
            'konfirmasi_keaktifan' => $status,
            'konf_ket_keaktifan' => $ket_konf
        ];
        $this->db->table('laporan_keaktifan')->where('id_keaktifan', $id)->update($data);
        
    }
    public function AllData()
    {
        return $this->db->table('laporan_keaktifan')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_keaktifan.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_keaktifan.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_keaktifan')->insert(($data));
    }

    public function DetailData($id_keaktifan)
    {
        return $this->db->table('laporan_keaktifan')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_keaktifan.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_keaktifan.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('id_keaktifan', $id_keaktifan)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('laporan_keaktifan')->where('id_keaktifan', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_keaktifan')->where('id_keaktifan', $data['id_keaktifan'])->delete($data);
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
        return ($tahun_ajaran);
    }

    public function getDoc($id)
    {
        $b = $this->db->table('laporan_keaktifan')->where('id_keaktifan', $id)->get()->getRow();
        $b = get_object_vars($b);
        return array ($b['krs'], $b['blanko_pembayaran'], $b['bukti_pembayaran']);
    }
}
