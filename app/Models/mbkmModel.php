<?php  

namespace App\Models;

use CodeIgniter\Model;

class mbkmModel extends Model
{
    protected $table            = 'laporan_mbkm';
    protected $primaryKey       = 'id_mbkm';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'nama_mbkm', 'jenis_mbkm', 'periode', 'keterangan_mbkm'];

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

    public function getIDb($data)
    {
        $b = $this->db->table('jenis_beasiswa')->where('jenis', $data)->get()->getRow();
        $b = get_object_vars($b);
        return $b['id_beasiswa'];
    }

    public function getIDp($data)
    {
        $p = $this->db->table('penerima_beasiswa')->where('npm', $data)->get()->getRow();
        $p = get_object_vars($p);
        return $p['id_penerima'];
    }
}