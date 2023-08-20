<?php  

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_user', 'nama_user', 'username', 'password', 'hak_akses', 'last_login', 'status_user'];

    public function AllData()
    {
        return $this->db->table('user')->Get()->getResultArray();
    }
}