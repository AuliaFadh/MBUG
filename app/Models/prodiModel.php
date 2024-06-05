<?php  

namespace App\Models;

use CodeIgniter\Model;

class prodiModel extends Model
{
    protected $table            = 'program_studi';
    protected $primaryKey       = 'id_prodi';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_prodi', 'fakultas_prodi'];

    public function AllData()
    {
        return $this->db->table('program_studi')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('program_studi')->insert(($data));
    }

    public function DetailData($id_prodi)
    {
        return $this->db->table('program_studi')->where('id_prodi', $id_prodi)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('program_studi')->where('id_prodi', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('program_studi')->where('id_prodi', $data['id_prodi'])->delete($data);
    }
}