<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

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

    public function updateAkun($id)
    {
        //Menyiapkan data foto lama
        if ($this->request->getFile('profil')->getError() == 4) {
            $nama_profil = $this->request->getVar('profil_lama');
        } else {
            $file_profil = $this->request->getFile('profil');
            if ($file_profil->getSize() <= 10240000) {
                $ext = $file_profil->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_profil = $file_profil->getRandomName();
                    $file_profil->move('assets/images', $nama_profil);
                } else {
                    session()->setFlashdata('pesanKontak', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/profil#infoKontak');
                }
            } else {
                session()->setFlashdata('pesanKontak', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/profil#infoKontak');
            }
        }

        //Mengolah nomor hp 08->628
        //Terlebih dahulu kita trim dl
        $nomorhp = trim($this->request->getVar('phone'));
        //bersihkan dari karakter yang tidak perlu
        $nomorhp = strip_tags($nomorhp);

        //cek apakah mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nomorhp), 0, 3) == '+62') {
                $nomorhp = substr($nomorhp, 1);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '62' . substr($nomorhp, 1);
            }
        }

        $this->userModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'phone' => $nomorhp,
            'foto' => $nama_profil,
            'updated_at' => Time::now(),
        ]);

        session()->setFlashdata('pesanKontak', 'Data berhasil diubah!');

        return redirect()->to('/profil#infoKontak');
    }
}
