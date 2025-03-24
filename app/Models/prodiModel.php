<?php  

namespace App\Models;

use CodeIgniter\Model;

class prodiModel extends Model
{
    protected $table            = 'program_studi';
    protected $primaryKey       = 'id_prodi';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_prodi', 'fakultas_prodi','akreditasi_prodi','jenjang_prodi','status_prodi'];
    
    public function GetActiveProdi(){
        return $this->db->table('program_studi')            
            ->where('status_prodi',1)->Get()->getResultArray();
    }


    public function AllData($select = '*')
    {
        // Jika select default `*`, ambil semua kolom program_studi
        if ($select === '*') {
            $select = 'program_studi.*';
        } else {
            // Pisahkan kolom berdasarkan koma
            $columns = explode(',', $select);
            $newColumns = [];
    
            foreach ($columns as $col) {
                $col = trim($col); // Hapus spasi
                // Jika tidak ada titik dalam nama kolom, tambahkan `program_studi.`
                if (!strpos($col, '.')) {
                    $col = 'program_studi.' . $col;
                }
                $newColumns[] = $col;
            }
    
            // Gabungkan kembali kolom-kolom
            $select = implode(', ', $newColumns);
        }
    
        return $this->db->table('program_studi')
            ->select($select)           
            ->get()->getResultArray();;
    }


    public function AllDataActive($select = '*')
    {
        // Jika select default `*`, ambil semua kolom program_studi
        if ($select === '*') {
            $select = 'program_studi.*';
        } else {
            // Pisahkan kolom berdasarkan koma
            $columns = explode(',', $select);
            $newColumns = [];
    
            foreach ($columns as $col) {
                $col = trim($col); // Hapus spasi
                // Jika tidak ada titik dalam nama kolom, tambahkan `program_studi.`
                if (!strpos($col, '.')) {
                    $col = 'program_studi.' . $col;
                }
                $newColumns[] = $col;
            }
    
            // Gabungkan kembali kolom-kolom
            $select = implode(', ', $newColumns);
        }
    
        return $this->db->table('program_studi')
            ->select($select)
            ->where('status_prodi',1)           
            ->get()->getResultArray();;
    }

    public function InsertData($data)
    {
        $this->db->table('program_studi')->insert(($data));
    }

    public function DetailData($id_prodi)
    {
        return $this->db->table('program_studi')->where('id_prodi', $id_prodi)->get()->getRow();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table('program_studi')->where('id_prodi', $id)->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('program_studi')->where('id_prodi', $data['id_prodi'])->delete($data);
    }

    public function getIDprodi($data)
    {
        $p = $this->db->table('program_studi')->where('nama_prodi', $data)->get()->getRow();
        if (!$p) {
            $p = $this->db->table('program_studi')->where('id_prodi', $data)->get()->getRow();
        }
        
        $p = get_object_vars($p);
        return $p['id_prodi'];
    }
    
}