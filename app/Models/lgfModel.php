<?php  

namespace App\Models;

use CodeIgniter\Model;

class lgfModel extends Model
{
    protected $table            = 'link_gform';
    protected $primaryKey       = 'id_lgf';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_form', 'id_beasiswa', 'tautan', 'tanggal_pembuatan'];

    public function AllData()
    {
        return $this->db->table('link_gform')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=link_gform.id_beasiswa', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('link_gform')->insert(($data));
    }

    public function DetailData($id_lgf)
    {
        return $this->db->table('link_gform')->where('id_lgf', $id_lgf)->get()->getRow();
    }

    public function UpdateData($data)
    {
        return $this->db->table('link_gform')->where('id_lgf', $data['id_lgf'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('link_gform')->where('id_lgf', $data['id_lgf'])->delete($data);
    }
}