<?php

namespace App\Models;

use CodeIgniter\Model;

class LihatKosModel extends Model
{
    protected $table = "riwayat_lihat_kos";
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'nama_kos', 'pengunjung', 'id_kos', 'created_at', 'updated_at'
    ];
}
