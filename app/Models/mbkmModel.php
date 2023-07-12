<?php  

namespace App\Models;

use CodeIgniter\Model;

class mbkmModel extends Model
{
    protected $table            = 'mbkm';
    protected $primaryKey       = 'id_mbkm';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'prodi', 'jenis_beasiswa', 'kegiatan_mbkm', 'periode', 'keterangan'];

    public function AllData()
    {
        return $this->db->table('mbkm')->Get()->getResultArray();
    }
}