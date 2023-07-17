<?php  

namespace App\Models;

use CodeIgniter\Model;

class laModel extends Model
{
    protected $table            = 'laporan_akademik';
    protected $primaryKey       = 'id_akademik';

    protected $returnType       = 'array';
    protected $allowedFields    = ['semester', 'tahun_ajaran', 'ipk', 'ipk_lokal', 'ipk_uu', 'rangkuman_nilai'];

    public function AllData()
    {
        return $this->db->table('laporan_akademik')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_akademik.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_akademik.id_penerima', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_akademik')->insert(($data));
    }

    public function DetailData($id_akademik)
    {
        return $this->db->table('laporan_akademik')->where('id_akademik', $id_akademik)->get()->getRow();
    }

    public function UpdateData($data)
    {
        return $this->db->table('laporan_akademik')->where('id_akademik', $data['id_akademik'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_akademik')->where('id_akademik', $data['id_akademik'])->delete($data);
    }
}