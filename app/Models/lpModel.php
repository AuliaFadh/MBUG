<?php  

namespace App\Models;

use CodeIgniter\Model;

class lpModel extends Model
{
    protected $table            = 'laporan_prestasi';
    protected $primaryKey       = 'id_prestasi';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'prodi', 'jenis_beasiswa', 'tingkat', 'jenis_prestasi', 'nama_kegiatan', 'capaian', 'tempat', 'tanggal', 'penyelenggara', 'bukti_prestasi', 'publikasi'];

    public function AllData()
    {
        return $this->db->table('laporan_prestasi')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_prestasi')->insert(($data));
    }
}