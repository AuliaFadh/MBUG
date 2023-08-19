<?php  

namespace App\Models;

use CodeIgniter\Model;

class newsModel extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id_pengumuman';

    protected $returnType       = 'array';
    protected $allowedFields    = ['judul_pengumuman', 'tanggal_terbit', 'tanggal_tarik', 'penulis', 'deskripsi'];

    public function AllData()
    {
        return $this->db->table('pengumuman')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('pengumuman')->insert(($data));
    }

    public function DetailData($id_pengumuman)
    {
        return $this->db->table('pengumuman')->where('id_pengumuman', $id_pengumuman)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('pengumuman')->where('id_pengumuman', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('pengumuman')->where('id_pengumuman', $data['id_pengumuman'])->delete($data);
    }
}