<?php

namespace App\Controllers;

class Akun extends BaseController
{
    public function login()
    {
        $data = [
            "title" => "Halaman Login | SahabatRantauKu.com",

        ];

        return view('akun/login', $data);
    }

    public function daftarPemilik()
    {
        $data = [
            "title" => "Halaman Daftar Akun | SahabatRantauKu.com",
        ];
        return view('akun/daftarPemilik', $data);
    }

    public function daftarRantau()
    {
        $data = [
            "title" => "Halaman Daftar Akun | SahabatRantauKu.com",
        ];
        return view('akun/daftarRantau', $data);
    }

    public function profil()
    {
        $profil = user();
        $my_kos = $this->kosModel->where(['user_id' => $profil->id])->findAll();
        $data = [
            "title" => "Profil Akun | SahabatRantauKu.com",
            "profil" => $profil,
            "my_kos" => $my_kos,
        ];
        return view('akun/profilAkun', $data);
    }
}
