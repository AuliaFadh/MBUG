<?php  

namespace App\Models;

use CodeIgniter\Model;

class lgfModel extends Model
{
    protected $table            = 'link_gform';
    protected $primaryKey       = 'id_lgf';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_form', 'jenis_beasiswa', 'tautan', 'tanggal_pembuatan'];

    public function AllData()
    {
        return $this->db->table('link_gform')->Get()->getResultArray();
    }
}