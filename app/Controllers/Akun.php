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
        $data = [
            "title" => "Profil Akun | SahabatRantauKu.com",
        ];
        return view('akun/profilAkun', $data);
    }
}
