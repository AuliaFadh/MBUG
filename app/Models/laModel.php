<?php  

namespace App\Models;

use CodeIgniter\Model;

class laModel extends Model
{
    protected $table            = 'laporan_akademik';
    protected $primaryKey       = 'id_akademik';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'npm', 'prodi', 'semester', 'alamat', 'no_hp', 'email', 'jenis_beasiswa', 'tahun_penerimaan', 'status', 'keterangan'];
}