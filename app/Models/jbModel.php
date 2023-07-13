<?php  

namespace App\Models;

use CodeIgniter\Model;

class jbModel extends Model
{
    protected $table            = 'jenis_beasiswa';
    protected $primaryKey       = 'id_beasiswa';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_beasiswa', 'asal_beasiswa', 'tahun_penerimaan', 'status'];

    public function AllData()
    {
        return $this->db->table('jenis_beasiswa')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('jenis_beasiswa')->insert(($data));
    }

    public function DetailData($id_beasiswa)
    {
        return $this->db->table('jenis_beasiswa')->where('id_beasiswa', $id_beasiswa)->get()->getRow();
    }

    public function DeleteData($data)
    {
        $this->db->table('jenis_beasiswa')->where('id_beasiswa', $data['id_beasiswa'])->delete($data);
    }
}