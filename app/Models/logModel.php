<?php  

namespace App\Models;

use CodeIgniter\Model;

class logModel extends Model
{
    protected $table            = 'log_aktivitas';
    protected $primaryKey       = 'id_log';

    protected $returnType       = 'array';
    protected $allowedFields    = ['log_last_login', 'log_username'];

    public function AllData()
    {
        return $this->db->table('log_aktivitas')
            ->join('user', 'user.username=log_aktivitas.log_username', 'left')
            ->Get()->getResultArray();
    }
}