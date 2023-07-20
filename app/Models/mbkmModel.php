<?php  

namespace App\Models;

use CodeIgniter\Model;

class mbkmModel extends Model
{
    protected $table            = 'laporan_mbkm';
    protected $primaryKey       = 'id_mbkm';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'kegiatan_mbkm', 'periode', 'keterangan_mbkm'];

    public function AllData()
    {
        return $this->db->table('laporan_mbkm')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_mbkm.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_mbkm.id_penerima', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_mbkm')->insert(($data));
    }

    public function DetailData($id_mbkm)
    {
        return $this->db->table('laporan_mbkm')->where('id_mbkm', $id_mbkm)->get()->getRow();
    }

    public function UpdateData($data)
    {
        return $this->db->table('laporan_mbkm')->where('id_mbkm', $data['id_mbkm'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_mbkm')->where('id_mbkm', $data['id_mbkm'])->delete($data);
    }
}