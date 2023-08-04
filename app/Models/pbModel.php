<?php  

namespace App\Models;

use CodeIgniter\Model;

class pbModel extends Model
{
    protected $table            = 'penerima_beasiswa';
    protected $primaryKey       = 'id_penerima';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'prodi', 'alamat', 'no_hp', 'jenis_kelamin', 'tahun_diterima', 'status_penerima', 'keterangan'];

    public function AllData()
    {
        return $this->db->table('penerima_beasiswa')->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('penerima_beasiswa')->insert(($data));
    }

    public function DetailData($id_penerima)
    {
        return $this->db->table('penerima_beasiswa')->where('id_penerima', $id_penerima)->get()->getRow();
    }

    public function UpdateData($data)
    {
        return $this->db->table('penerima_beasiswa')->where('id_penerima', $data['id_penerima'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('penerima_beasiswa')->where('id_penerima', $data['id_penerima'])->delete($data);
    }
}