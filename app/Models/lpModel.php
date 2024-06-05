<?php

namespace App\Models;

use CodeIgniter\Model;

class lpModel extends Model
{
    protected $table            = 'laporan_prestasi';
    protected $primaryKey       = 'id_prestasi';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'tingkat', 'jenis_prestasi', 'nama_kegiatan', 'capaian', 'tempat', 'tanggal', 'penyelenggara', 'bukti_prestasi', 'publikasi','konfirmasi_prestasi'];

    public function AllData()
    {
        return $this->db->table('laporan_prestasi')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_prestasi.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_prestasi.id_penerima', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_prestasi')->insert(($data));
    }

    public function DetailData($id_prestasi)
    {
        return $this->db->table('laporan_prestasi')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_prestasi.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_prestasi.id_penerima', 'left')
            ->where('id_prestasi', $id_prestasi)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('laporan_prestasi')->where('id_prestasi', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_prestasi')->where('id_prestasi', $data['id_prestasi'])->delete($data);
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

    public function getDate($data)
    {
        $tglformat = date_create_from_format('d M, Y', $data);
        return $tglformat->format('Y-m-d');
    }
}
