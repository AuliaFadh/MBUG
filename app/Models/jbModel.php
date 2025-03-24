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

    public function DetailData($id_beasiswa)
    {      
        return $this->query("SELECT * FROM jenis_beasiswa WHERE id_beasiswa",[$id_beasiswa])->getRow();
    }

    public function UpdateData($id, $data)
    {        
        return $this->update($id, $data);
    }

    public function DeleteData($id_beasiswa)
    {
        return $this->delete($id_beasiswa);
    }
}