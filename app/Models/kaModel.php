<?php  

namespace App\Models;

use CodeIgniter\Model;

class kaModel extends Model
{
    protected $table            = 'laporan_keaktifan';
    protected $primaryKey       = 'id_keaktifan';

    protected $returnType       = 'array';
    protected $allowedFields    = ['id_beasiswa', 'id_penerima', 'semester', 'tahun_ajaran', 'krs', 'jumlah_ditagihkan', 'jumlah_potongan', 'blanko_pembayaran', 'bukti_pembayaran', 'status_keaktifan'];

    public function AllData()
    {
        return $this->db->table('laporan_keaktifan')
            ->join('jenis_beasiswa', 'jenis_beasiswa.id_beasiswa=laporan_keaktifan.id_beasiswa', 'left')
            ->join('penerima_beasiswa', 'penerima_beasiswa.id_penerima=laporan_keaktifan.id_penerima', 'left')
            ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('laporan_keaktifan')->insert(($data));
    }

    public function DetailData($id_keaktifan)
    {
        return $this->db->table('laporan_keaktifan')->where('id_keaktifan', $id_keaktifan)->get()->getRow();
    }

    public function UpdateData($data)
    {
        return $this->db->table('laporan_keaktifan')->where('id_keaktifan', $data['id_keaktifan'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('laporan_keaktifan')->where('id_keaktifan', $data['id_keaktifan'])->delete($data);
    }
}