<?php  

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';

    public function login_check_a($username)
    {       
        return $this->db->table('user')        
        ->where('username', $username)
        ->get()->getRowArray();
    }

    public function login_check_u($username)
{
    return $this->db->table('user')
        ->join('penerima_beasiswa', 'penerima_beasiswa.npm=user.username', 'left')
        ->where('username', $username)
        ->get()->getRowArray();
}

}