<?php  

namespace App\Models;

use CodeIgniter\Model;

class tahunModel extends Model
{
    protected $table            = 'tahun_ajaran';
    protected $primaryKey       = 'id_tahun';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_tahun', 'semester_tahun','mulai_tahun_ajaran','selesai_tahun_ajaran','queue_tahun'];


    public function AllData()
    {
        return $this->db->table('tahun_ajaran')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tahun_ajaran')->insert(($data));
    }

    public function DetailData($id_tahun)
    {
        return $this->db->table('tahun_ajaran')->where('id_tahun', $id_tahun)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('tahun_ajaran')->where('id_tahun', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tahun_ajaran')->where('id_tahun', $data['id_tahun'])->delete($data);
    }
}