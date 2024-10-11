<?php  

namespace App\Models;

use CodeIgniter\Model;

class pbModel extends Model
{
    protected $table            = 'penerima_beasiswa';
    protected $primaryKey       = 'id_penerima';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'id_prodi', 'alamat', 'no_hp', "ppicture", 'jenis_kelamin', 'tahun_diterima', 'status_penerima', 'keterangan'];

    public function __construct()
    {
        parent::__construct();
    }

    public function AllData()
    {
        return $this->db->table('penerima_beasiswa')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('penerima_beasiswa')->insert(($data));
    }

    public function DetailData($id_penerima)
    {
        return $this->db->table('penerima_beasiswa')->
        join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->where('id_penerima', $id_penerima)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('penerima_beasiswa')->where('id_penerima', $id)->update($data);
    }

    public function getPicture($id)
    {
        $b = $this->db->table('penerima_beasiswa')->where('id_penerima', $id)->get()->getRow();
        $b = get_object_vars($b);
        return $b['ppicture'];
    }

    public function getPictureN($npm)
    {
        $b = $this->db->table('penerima_beasiswa')->where('npm', $npm)->get()->getRow();
        $b = get_object_vars($b);
        return $b['ppicture'];
    }

    public function DeleteData($data)
    {
        $this->db->table('penerima_beasiswa')->where('id_penerima', $data['id_penerima'])->delete($data);
    }
}