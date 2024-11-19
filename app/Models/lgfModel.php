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
        return $this->db->table('link_gform')
        ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=link_gform.id_beasiswa', 'left')
        ->where('id_lgf', $id_lgf)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('link_gform')->where('id_lgf', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('link_gform')->where('id_lgf', $data['id_lgf'])->delete($data);
    }

    public function getIDb($data)
    {
        $b = $this->db->table('jenis_beasiswa')->where('jenis', $data)->get()->getRow();
        $b = get_object_vars($b);
        return $b['id_beasiswa'];
    }

    public function getDate($data)
    {
        $tglformat = date_create_from_format('d F, Y', $data);
        return $tglformat->format('Y-m-d');
    }
}