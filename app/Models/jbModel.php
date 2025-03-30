<?php  

namespace App\Models;

use CodeIgniter\Model;

class jbModel extends Model
{
    protected $table            = 'jenis_beasiswa';
    protected $primaryKey       = 'id_beasiswa';

    protected $returnType       = 'array';
    protected $allowedFields    = ['jenis', 'asal', 'tahun_penerimaan', 'status_beasiswa'];

    public function AllData()
    {
        return $this->query("SELECT * FROM jenis_beasiswa ")->getResultArray();
    }

    public function AllDataActive_jenis()
    {      
        return $this->query("SELECT nama_tahun FROM jenis_beasiswa WHERE status_beasiswa",[1])->getResultArray();
    }

    public function InsertData($data)
    {
        $this->insert(($data));
    }


    public function DetailData_id($id_beasiswa)
    {      
        return $this->query("SELECT * FROM jenis_beasiswa WHERE id_beasiswa",[$id_beasiswa])->getRowArray();
    }

    public function checkDetailData_id($id_beasiswa)
    {
        return $this->where('id_beasiswa',$id_beasiswa)
        ->countAllResult()>0;
    }

    public function UpdateData($id, $data)
    {        
        return $this->where('id_beasiswa',$id)->update($id, $data);
    }

    public function DeleteData($id_beasiswa)
    {
        return $this->delete($id_beasiswa);
    }
    public function GetID_jb($jenis){
        return $this->select('jenis_beasiswa.id_beasiswa')
        ->where('jenis',$jenis)
        ->get()
        ->getRowArray('id_beasiswa');
    }
}