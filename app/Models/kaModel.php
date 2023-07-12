<?php  

namespace App\Models;

use CodeIgniter\Model;

class kaModel extends Model
{
    protected $table            = 'keaktifan';
    protected $primaryKey       = 'id_keaktifan';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'prodi', 'semester', 'tahun_ajaran', 'krs', 'jumlah_ditagihkan', 'jumlah_potongan', 'blanko_pembayaran', 'bukti_pembayaran', 'status'];

    public function AllData()
    {
        return $this->db->table('keaktifan')->Get()->getResultArray();
    }
}