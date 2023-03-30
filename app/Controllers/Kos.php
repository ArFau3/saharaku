<?php

namespace App\Controllers;

use App\Models\KosModel;
use CodeIgniter\I18n\Time;

class Kos extends BaseController
{
    protected $wilayahModel;

    public function index()
    {
        $kos = new \App\Models\KosModel();

        $kabupaten = $this->request->getVar('kabupaten');
        if ($kabupaten) {
            $kos = $this->kosModel->search($kabupaten);
        } else {
            $kos = $this->kosModel;
        }
        $data = [
            "title" => "Daftar Kos | SahabatRantauKu.com",
            "data_koses" => $kos->paginate(6, 'kos'),
            "pager" => $this->kosModel->pager,
            "kabupaten" => $kabupaten,
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
        // session();
        $profil = user();
        $data = [
            "title" => "Tambah Kos | SahabatRantauKu.com",
            "data_profil" => $profil,
            // 'validation' => \Config\Services::validation(),
        ];
        return view('kos/tambahKos', $data);
    }

    public function save()
    {
        // Validasi awal
        if (!$this->validate([
            'nama' => 'required',
            'harga' => 'required',
            'pemilik' => 'required',
            'user_id' => 'required',
            'wa' => 'required',
            'tipe' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'thumbnail' => 'max_size[thumbnail,10240]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]',
            'foto1' => 'max_size[foto1,10240]|is_image[foto1]|mime_in[foto1,image/jpg,image/jpeg,image/png]',
            'foto2' => 'max_size[foto2,10240]|is_image[foto2]|mime_in[foto2,image/jpg,image/jpeg,image/png]',
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('pesan', 'Pastikan data yang anda masukkan sudah benar!');
            return redirect()->to('/tambahKos');
        }

        // membuat string-> integer
        $user_id = (int)$this->request->getVar('user_id');
        $harga = (int)$this->request->getVar('harga');
        $kamar = (int)$this->request->getVar('kamar');

        // Mengambil file foto
        if ($this->request->getFile('thumbnail') == null) {
            session()->setFlashdata('pesan', 'Pastikan Anda memasukkan minimal satu foto pada foto utama!');
            return redirect()->to('/tambahKos');
        } else {
            $file_thumbnail = $this->request->getFile('thumbnail');
            $nama_thumbnail = $file_thumbnail->getRandomName();
            $file_thumbnail->move('assets/images', $nama_thumbnail);
        }
        if ($this->request->getVar('foto1')) {
            $file_foto1 = $this->request->getFile('foto1');
            $nama_foto1 = $file_foto1->getRandomName();
            $file_foto1->move('assets/images', $nama_foto1);
        } else {
            $file_foto1 = null;
            $nama_foto1 = null;
        }
        if ($this->request->getVar('foto2')) {
            $file_foto2 = $this->request->getFile('foto2');
            $nama_foto2 = $file_foto2->getRandomName();
            $file_foto2->move('assets/images', $nama_foto2);
        } else {
            $file_foto2 = null;
            $nama_foto2 = null;
        }

        // membuat string-> Boolean
        if ($this->request->getVar('kamar_mandi_dalam') == "on") {
            $kamar_mandi_dalam = true;
        } else {
            $kamar_mandi_dalam = false;
        }
        if ($this->request->getVar('ac') == "on") {
            $ac = true;
        } else {
            $ac = false;
        }
        if ($this->request->getVar('wifi') == "on") {
            $wifi = true;
        } else {
            $wifi = false;
        }

        // mengambil nama provinsi dari kode
        $no_provinsi = $this->request->getVar('provinsi');
        $koneksi = mysqli_connect('localhost', 'root', '', 'saharaku');
        $provinsi_query = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode=$no_provinsi");
        $provinsi = mysqli_fetch_array($provinsi_query);
        $this->kosModel->save([
            'nama' => $this->request->getVar('nama'),
            'harga' => $harga,
            'kamar' => $kamar,
            'pemilik' => $this->request->getVar('pemilik'),
            'user_id' => $user_id,
            'wa' => $this->request->getVar('wa'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tipe' => $this->request->getVar('tipe'),
            'provinsi' => $provinsi['nama'],
            'kabupaten' => $this->request->getVar('kabupaten'),
            'alamat' => $this->request->getVar('alamat'),
            'kamar_mandi_dalam' => $kamar_mandi_dalam,
            'ac' => $ac,
            'wifi' => $wifi,
            'thumbnail' => $nama_thumbnail,
            'foto1' => $nama_foto1,
            'foto2' => $nama_foto2,
            'foto3' => $this->request->getVar('foto3'),
            'foto4' => $this->request->getVar('foto4'),
            'foto5' => $this->request->getVar('foto5'),
            'created_at' => Time::now(),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/profil#pesanBerhasil');
    }

    public function hapusKos($id)
    {
        $this->kosModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/profil#pesanBerhasil');
    }

    public function editKos($id)
    {
        $profil = user();
        $kos = $this->kosModel->getKos($id);
        // dd($kos);
        $data = [
            "title" => "Edit Kos | SahabatRantauKu.com",
            "data_profil" => $profil,
            "data_kos" => $kos,
            // 'validation' => \Config\Services::validation(),
        ];
        return view('kos/editKos', $data);
    }

    public function updateKos($id)
    {
        // dd($this->request->getVar());
        // if (!$this->validate([
        //     'thumbnail' => 'max_size[thumbnail,10240]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]',
        //     'foto1' => 'max_size[foto1,10240]|is_image[foto1]|mime_in[foto1,image/jpg,image/jpeg,image/png]',
        //     'foto2' => 'max_size[foto2,10240]|is_image[foto2]|mime_in[foto2,image/jpg,image/jpeg,image/png]',
        // ])) {
        //     $validation = \Config\Services::validation();
        //     session()->setFlashdata('pesan', 'Pastikan data yang anda masukkan sudah benar!');
        //     return redirect()->back();
        // }

        // dd($this->request->getFile('thumbnail'));
        // membuat string-> integer
        $harga = (int)$this->request->getVar('harga');
        $kamar = (int)$this->request->getVar('kamar');

        // Mengambil file foto
        // if ($this->request->getFile('thumbnail') == null) {
        //     $nama_thumbnail = $this->request->getVar('thumbnail_lama');
        // } else {
        //     $file_thumbnail = $this->request->getFile('thumbnail');
        //     $file_thumbnail->move('assets/images');
        //     $nama_thumbnail = $file_thumbnail->getName();
        // }
        // if ($this->request->getVar('foto1')) {
        //     $file_foto1 = $this->request->getFile('foto1');
        //     $file_foto1->move('assets/images');
        //     $nama_foto1 = $file_foto1->getName();
        // } else {
        //     $file_foto1 = null;
        //     $nama_foto1 = $this->request->getVar('foto1_lama');
        // }
        // if ($this->request->getVar('foto2')) {
        //     $file_foto2 = $this->request->getFile('foto2');
        //     $file_foto2->move('assets/images');
        //     $nama_foto2 = $file_foto2->getName();
        // } else {
        //     $file_foto2 = null;
        //     $nama_foto2 = $this->request->getVar('foto2_lama');
        // }

        // membuat string-> Boolean
        if ($this->request->getVar('kamar_mandi_dalam') == "on") {
            $kamar_mandi_dalam = true;
        } else {
            $kamar_mandi_dalam = false;
        }
        if ($this->request->getVar('ac') == "on") {
            $ac = true;
        } else {
            $ac = false;
        }
        if ($this->request->getVar('wifi') == "on") {
            $wifi = true;
        } else {
            $wifi = false;
        }

        // mengambil nama provinsi dari kode
        $test = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'harga' => $harga,
            'kamar' => $kamar,
            'wa' => $this->request->getVar('wa'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tipe' => $this->request->getVar('tipe'),
            'alamat' => $this->request->getVar('alamat'),
            'kamar_mandi_dalam' => $kamar_mandi_dalam,
            'ac' => $ac,
            'wifi' => $wifi,
            // 'thumbnail' => $nama_thumbnail,
            // 'foto1' => $nama_foto1,
            // 'foto2' => $nama_foto2,
            'foto3' => $this->request->getVar('foto3'),
            'foto4' => $this->request->getVar('foto4'),
            'foto5' => $this->request->getVar('foto5'),
            'updated_at' => Time::now(),
        ];
        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/profil#pesanBerhasil');
    }

    public function hubungi()
    {
        return redirect()->to('https://api.whatsapp.com/send?phone=' . $this->request->getVar('nomor') . '&text=Halo, nama saya ' . $this->request->getVar('nama_penghubung') . ', ' . $this->request->getVar('pesan'));
    }
}
