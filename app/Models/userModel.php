<?php  

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_user', 'username', 'password', 'hak_akses', 'last_login', 'status_user'];

    public function AllData()
    {
        return $this->db->table('user')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('user')->insert(($data));
    }

    public function DetailData($id_user)
    {
        return $this->db->table('user')->where('id_user', $id_user)->get()->getRow();
    }

    public function getData_username($uname)
    {
        return $this->db->table('user')
        ->join('penerima_beasiswa', 'penerima_beasiswa.npm=user.username', 'left')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->where('username', $uname)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('user')->where('id_user', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->delete($data);
    }

    public function getDate($data)
    {
        $tglformat = date_create_from_format('d M, Y', $data);
        return $tglformat->format('Y-m-d');
    }

    public function getCurrentDate()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d");
        return $time;
    }
}