<?php  

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';

    public function login_check($username, $password)
    {
        return $this->db->table('user')
        ->where(array('username' => $username, 'password' => $password))
        ->get()->getRowArray();
    }
}