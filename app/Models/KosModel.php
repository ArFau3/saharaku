<?php

namespace App\Models;

use CodeIgniter\Model;

class KosModel extends Model
{
    protected $table = "kos";
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'pemilik', 'nama', 'kamar', 'harga', 'wa', 'deskripsi', 'tipe', 'alamat', 'provinsi',
        'kabupaten', 'kamar_mandi_dalam', 'ac', 'wifi', 'cermin', 'meja', 'kursi', 'bantal', 'guling', 'jenis_promosi', 'daftar_promosi', 'user_id', 'thumbnail',
        'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'created_at', 'updated_at', 'folder',
    ];

    public function getKos($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function search($kabupaten)
    {
        return $this->table('kos')->like('kabupaten', $kabupaten);
    }
}
