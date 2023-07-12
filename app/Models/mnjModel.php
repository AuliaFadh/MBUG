<?php  

namespace App\Models;

use CodeIgniter\Model;

class mnjModel extends Model
{
    protected $table            = 'manajemen_pengguna';
    protected $primaryKey       = 'id_manajemen';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_user', 'nama', 'hak_akses', 'last_login', 'status'];

    public function AllData()
    {
        return $this->db->table('manajemen_pengguna')->Get()->getResultArray();
    }
}