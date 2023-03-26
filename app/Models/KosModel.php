<?php

namespace App\Models;

use CodeIgniter\Model;

class KosModel extends Model
{
    protected $table = 'kos';
    protected $useTimestamps = true;

    public function getKos($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
