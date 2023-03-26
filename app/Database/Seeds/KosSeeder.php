<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Saharaku Kos',
                'jenis_promosi' => 'D.FREE',
                'daftar_promosi' => Time::now(),
                'pemilik' => 'Arr',
                "wa" => '08123345345',
                'harga'    => 250000,
                'deskripsi' => 'aerbnetnyerdtby5evtef3wgtfewy',
                'tipe'    => 'Kos Putra',
                'provinsi' => 'KALIMANTAN BARAT',
                'kabupaten' => 'KOTA PONTIANAK',
                'alamat' => 'Jl. apafet',
                'kamar_mandi_dalam'    => true,
                'ac' => false,
                'wifi'    => false,
                'thumbnail' => 'kos1.jpg',
                'created_at' => Time::now(),
            ],
            [
                'nama' => 'Saharaku Kos',
                'jenis_promosi' => 'D.FREE',
                'daftar_promosi' => Time::now(),
                'pemilik' => 'Arrf',
                "wa" => '08123345645',
                'harga'    => 850000,
                'deskripsi' => 'aerbnerrrrrrrrrrre7tyjuykasiasdndfsdajkdnioernrrvohertetnyerdtby5evtef3wgtfewy',
                'tipe'    => 'Kos Putri',
                'provinsi' => 'KALIMANTAN BARAT',
                'kabupaten' => 'KOTA PONTIANAK',
                'alamat' => 'Jl. apafeweerybrtbyrtbyb5t',
                'kamar_mandi_dalam'    => true,
                'ac' => true,
                'wifi'    => true,
                'thumbnail' => 'kos2.jpg',
                'created_at' => Time::now(),
            ],
            [
                'nama' => 'Saharaku Kos 3',
                'jenis_promosi' => 'C.SEBULAN',
                'pemilik' => 'Asrr',
                "wa" => '08123349845',
                'daftar_promosi' => Time::now(),
                'harga'    => 250000,
                'deskripsi' => 'aerbnetnyerdtby5evtertnrntf3wgtfewy',
                'tipe'    => 'Kos Putra',
                'provinsi' => 'ACEH',
                'kabupaten' => 'KAB. ACEH SELATAN',
                'alamat' => 'Jl. apafegnyjytjttt',
                'kamar_mandi_dalam'    => true,
                'ac' => false,
                'wifi'    => false,
                'thumbnail' => 'kos3.jpg',
                'created_at' => Time::now(),
            ],
            [
                'nama' => 'Saharaku Kos 235',
                'jenis_promosi' => 'B.TIGABULAN',
                'pemilik' => 'Ar4vr',
                "wa" => '08123983445',
                'daftar_promosi' => Time::now(),
                'harga'    => 100000,
                'deskripsi' => 'erwyne5vtrgrthbrrtbtrbyrbrbyrtbyr',
                'tipe'    => 'Kos Putra',
                'provinsi' => 'ACEH',
                'kabupaten' => 'KAB. ACEH SELATAN',
                'alamat' => 'Jl. apatimyubrvecfet',
                'kamar_mandi_dalam'    => false,
                'ac' => false,
                'wifi'    => false,
                'thumbnail' => 'kos4.jpg',
                'created_at' => Time::now(),
            ],
            [
                'nama' => 'Saharaku Kos 31',
                'jenis_promosi' => 'A.PLUS',
                'daftar_promosi' => Time::now(),
                'pemilik' => 'Arffr',
                "wa" => '081233445345',
                'harga'    => 2500000,
                'deskripsi' => 'srbvrtetvwb45644444444444444444444444trvgfvdfvdf',
                'tipe'    => 'Kos Campuran',
                'provinsi' => 'KALIMANTAN BARAT',
                'kabupaten' => 'KAB. SANGGAU',
                'alamat' => 'Jl. getscesr',
                'kamar_mandi_dalam'    => true,
                'ac' => true,
                'wifi'    => true,
                'thumbnail' => 'kos5.jpg',
                'created_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO kos (nama, harga, deskripsi, tipe, alamat, kamar_mandi_dalam, ac, wifi, thumbnail, created_at) VALUES(:nama:, :harga:, :deskripsi:, :tipe:, :alamat:, :kamar_mandi_dalam:, :ac:, :wifi:, :thumbnail:, :created_at:)', $data);

        // Using Query Builder
        $this->db->table('kos')->insertBatch($data);
    }
}
