<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = "riwayat_chat";
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'nama', 'kos', 'id_kos', 'pesan', 'created_at', 'updated_at'
    ];
}
