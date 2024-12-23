<?php

namespace App\Models;

use CodeIgniter\Model;

class mbkmModel extends Model
{
    protected $table            = 'laporan_mbkm';
    protected $primaryKey       = 'id_mbkm';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'nama_mbkm', 'jenis_mbkm', 'periode', 'keterangan_mbkm','konf_ket_mbkm','konfirmasi_mbkm'];

    public function GetProcessData(){
        return $this->db->table('laporan_mbkm')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_mbkm.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_mbkm.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('konfirmasi_mbkm',2)->Get()->getResultArray();
    }
    public function update_konfirmasi_mbkm($id, $status,$ket_konf) {
        // Memperbarui status konfirmasi mbkm berdasarkan ID yang diberikan
        $data = [
            'konfirmasi_mbkm' => $status,
            'konf_ket_mbkm' => $ket_konf
        ];
        $this->db->table('laporan_mbkm')->where('id_mbkm', $id)->update($data);
        
    }
    public function AllData()
    {
        return $this->db->table('laporan_mbkm')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_mbkm.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_mbkm.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_mbkm')->insert(($data));
    }

    public function DetailData($id_mbkm)
    {
        return $this->db->table('laporan_mbkm')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_mbkm.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_mbkm.id_penerima', 'left')
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('id_mbkm', $id_mbkm)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('laporan_mbkm')->where('id_mbkm', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_mbkm')->where('id_mbkm', $data['id_mbkm'])->delete($data);
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
}
