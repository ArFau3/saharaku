<?php

namespace App\Controllers;

use App\Models\KosModel;
use App\Models\WilayahModel;

class Kos extends BaseController
{
    protected $wilayahModel;

    public function index()
    {
        $kos = $this->kosModel->getKos();
        $total_kos = count($kos);
        $data = [
            "title" => "Daftar Kos | SahabatRantauKu.com",
            "total_kos" => $total_kos,
            "data_koses" => $kos,
        ];
        return view('kos/listKos', $data);
    }

    public function filterWilayah()
    {
        // UNTUK FUNCTION CARI KOS
        $wilayah = $this->kosModel->where('provinsi', 'KALIMANTAN BARAT')->findAll();
        $total_kos = count($wilayah);
        $data = [
            "title" => "Daftar Kos | SahabatRantauKu.com",
            "data_filter" => [
                "provinsi" => "Kalimantan Barat",
                "kota" => "Pontinak",
            ],
            "total_kos" => $total_kos,
            "data_koses" => $wilayah,
        ];
        return view('kos/listKos', $data);
    }

    public function dataKos($id)
    {
        $kos = $this->kosModel->getKos($id);
        $data = [
            "title" => "Info Kos | SahabatRantauKu.com",
            "data_kos" => $kos,
        ];
        return view('kos/dataKos', $data);
    }

    public function tambahKos()
    {
        $data = [
            "title" => "Info Kos | SahabatRantauKu.com",
        ];
        return view('kos/tambahKos', $data);
    }
}
