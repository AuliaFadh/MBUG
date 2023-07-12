<?php  

namespace App\Models;

use CodeIgniter\Model;

class pbModel extends Model
{
    protected $table            = 'penerima_beasiswa';
    protected $primaryKey       = 'id_penerima';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'prodi', 'semester', 'alamat', 'no_hp', 'jenis_kelamin', 'tahun_penerimaan', 'status'];

    public function AllData()
    {
        return $this->db->table('penerima_beasiswa')->Get()->getResultArray();
    }
}