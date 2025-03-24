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
        return $this->query("SELECT * FROM tahun_ajaran")->getResultArray();
    }

    public function AllData_name()
    {
        return $this->query("SELECT nama_tahun FROM tahun_ajaran")->getResultArray();
    }

    

    public function InsertData($data)
    {
        return $this->insert($data);
    }

    public function DetailData($id_tahun)
    {
        return $this->query("SELECT * FROM tahun_ajaran WHERE id_tahun = ?", [$id_tahun])->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tahun_ajaran')->where('id_tahun', $data['id_tahun'])->delete($data);
    }
    public function DeleteData2($id_tahun)
    {
        return $this->delete($id_tahun);
    }
    public function InsertBatchData($data)
    {
        return $this->insertBatch($data);
    }
}