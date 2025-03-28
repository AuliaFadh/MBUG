<?php  

namespace App\Models;

use CodeIgniter\Model;

class pbModel extends Model
{
    protected $table            = 'penerima_beasiswa';
    protected $primaryKey       = 'id_penerima';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama','uuid_pb', 'npm', 'id_prodi', 'alamat', 'no_hp', "ppicture", 'jenis_kelamin', 'tahun_diterima', 'status_penerima', 'keterangan'];

    public function __construct()
    {
        parent::__construct();
    }

    public function AllData()
    {
        return $this->select('penerima_beasiswa.*, program_studi.id_prodi, program_studi.nama')
        return $this->db->table('penerima_beasiswa')
        ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->Get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('penerima_beasiswa')->insert(($data));
    }
    public function insertBatchData($data)
{
    return $this->db->table('penerima_beasiswa')->insertBatch($data);
}

    public function DetailData($id_penerima)
    {
        return $this->db->table('penerima_beasiswa')->
        join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
        ->where('id_penerima', $id_penerima)->get()->getRowArray();
    }

    public function DetailDataUUID($uuid_pb, $select = '*')
    {
        // Jika select default `*`, ambil semua kolom penerima_beasiswa + nama_prodi
        if ($select === '*') {
            $select = 'penerima_beasiswa.*, program_studi.nama_prodi';
        } else {
            // Pisahkan kolom berdasarkan koma
            $columns = explode(',', $select);
            $newColumns = [];
    
            foreach ($columns as $col) {
                $col = trim($col); // Hapus spasi
                // Jika tidak ada titik dalam nama kolom, tambahkan `penerima_beasiswa.`
                if (!strpos($col, '.')) {
                    $col = 'penerima_beasiswa.' . $col;
                }
                $newColumns[] = $col;
            }
    
            // Gabungkan kembali kolom-kolom
            $select = implode(', ', $newColumns) . ', program_studi.nama_prodi';
        }
    
        return $this->db->table('penerima_beasiswa')
            ->select($select)
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('penerima_beasiswa.uuid_pb', $uuid_pb)
            ->get()
            ->getRowArray();
    }
    
    public function DetailDataID($id_penerima, $select = '*')
    {
        // Jika select default `*`, ambil semua kolom penerima_beasiswa + nama_prodi
        if ($select === '*') {
            $select = 'penerima_beasiswa.*, program_studi.nama_prodi';
        } else {
            // Pisahkan kolom berdasarkan koma
            $columns = explode(',', $select);
            $newColumns = [];
    
            foreach ($columns as $col) {
                $col = trim($col); // Hapus spasi
                // Jika tidak ada titik dalam nama kolom, tambahkan `penerima_beasiswa.`
                if (!strpos($col, '.')) {
                    $col = 'penerima_beasiswa.' . $col;
                }
                $newColumns[] = $col;
            }
    
            // Gabungkan kembali kolom-kolom
            $select = implode(', ', $newColumns) . ', program_studi.nama_prodi';
        }
    
        return $this->db->table('penerima_beasiswa')
            ->select($select)
            ->join('program_studi', 'program_studi.id_prodi = penerima_beasiswa.id_prodi', 'left')
            ->where('penerima_beasiswa.id_penerima', $id_penerima)
            ->get()
            ->getRowArray();
    }
    


    public function UpdateData($id, $data)
    {
        return $this->db->table('penerima_beasiswa')->where('id_penerima', $id)->update($data);
    }
   
    public function DeleteData($data)
    {
        $this->db->table('penerima_beasiswa')->where('id_penerima', $data['id_penerima'])->delete($data);
    }
}