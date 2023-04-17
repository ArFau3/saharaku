<?php

namespace App\Controllers;

use App\Models\KosModel;
use CodeIgniter\I18n\Time;

class Kos extends BaseController
{
    protected $wilayahModel;
    protected $validation_rules = [
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Kos/Kontrakan Wajib Diisi'
            ]
        ],
        'harga' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Harga Sewa per Bulan Wajib Diisi'
            ],
        ],
        'pemilik' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Pemilik Tidak Boleh Kosong'
            ],
        ],
        'user_id' => 'required',
        'wa' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Masukkan Nomor Wa/Handphone Anda yang Bisa Dihubungi'
            ],
        ],
        'tipe' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih Tipe Dari Hunian'
            ],
        ],
        'provinsi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih Provinsi Dari Hunian'
            ],
        ],
        'kabupaten' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih Kabupaten Dari Hunian'
            ],
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat Hunian Wajib Diisi'
            ],
        ],
    ];

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

        // Menyimpan riwayat lihat kos
        $id_kos = (int)$kos['id'];
        if (logged_in()) {
            $user = user();
            $pengunjung = $user->username;;
        } else {
            $pengunjung = 'guest';
        }

        $this->LihatKosModel->save([
            'pengunjung' => $pengunjung,
            'nama_kos' => $kos['nama'],
            'id_kos' => $id_kos,
            'created_at' => Time::now(),
        ]);

        // mengalihkan ke halaman infokos
        return view('kos/dataKos', $data);
    }

    public function tambahKos()
    {
        session();
        $profil = user();
        $data = [
            "title" => "Tambah Kos | SahabatRantauKu.com",
            "data_profil" => $profil,
            'validation' => \Config\Services::validation(),
            'lama' => [
                'nama' => '',
                'kamar' => '',
                'harga' => '',
                'deskripsi' => '',
                'alamat' => '',
                'wa' => '',
                'tipe' => '',
            ],
        ];
        return view('kos/tambahKos', $data);
    }

    public function save()
    {
        // Validasi awal
        if (!$this->validate($this->validation_rules)) {
            $validation = \Config\Services::validation();
            // session()->setFlashdata('validation' => , 'Pastikan Foto yang anda masukkan sudah benar!');
            // return redirect()->to('/tambahKos');
            // return redirect()->to('/tambahKos')->withInput()->with('validation', $validation);
            $profil = user();
            $data_lama = $this->request->getVar();
            $data = [
                "title" => "Tambah Kos | SahabatRantauKu.com",
                "data_profil" => $profil,
                'validation' => $validation,
                'lama' => $data_lama,
            ];
            return view('kos/tambahKos', $data);
        }

        // Menyiapkan direktori per kos
        $album = $this->request->getVar('nama');
        if (!is_dir('assets/images/' . $album)) {
            mkdir('./assets/images/' . $album, 0777, true);
        }
        $folder = $this->request->getVar('nama');
        // ALTER TABLE kos ADD COLUMN folder varchar(155) AFTER wifi
        // Mengambil file foto
        if ($this->request->getFile('thumbnail')->getError() == 4) {
            session()->setFlashdata('pesan', 'Pastikan Anda memasukkan minimal satu foto pada bagian foto utama!');
            return redirect()->to('/tambahKos')->withInput();
        } else {
            $file_thumbnail = $this->request->getFile('thumbnail');
            if ($file_thumbnail->getSize() <= 10240000) {
                $ext = $file_thumbnail->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_thumbnail = $file_thumbnail->getRandomName();
                    $file_thumbnail->move('assets/images/' . $folder, $nama_thumbnail);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda masukkan adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }
        if ($this->request->getFile('foto1')->getError() == 4) {
            $file_foto1 = null;
            $nama_foto1 = null;
        } else {
            $file_foto1 = $this->request->getFile('foto1');
            if ($file_foto1->getSize() <= 10240000) {
                $ext = $file_foto1->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto1 = $file_foto1->getRandomName();
                    $file_foto1->move('assets/images/' . $folder, $nama_foto1);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }
        if ($this->request->getFile('foto2')->getError() == 4) {
            $file_foto2 = null;
            $nama_foto2 = null;
        } else {
            $file_foto2 = $this->request->getFile('foto2');
            if ($file_foto2->getSize() <= 10240000) {
                $ext = $file_foto2->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto2 = $file_foto2->getRandomName();
                    $file_foto2->move('assets/images/' . $folder, $nama_foto2);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }
        if ($this->request->getFile('foto3')->getError() == 4) {
            $file_foto3 = null;
            $nama_foto3 = null;
        } else {
            $file_foto3 = $this->request->getFile('foto3');
            if ($file_foto3->getSize() <= 10240000) {
                $ext = $file_foto3->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto3 = $file_foto3->getRandomName();
                    $file_foto3->move('assets/images/' . $folder, $nama_foto3);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }
        if ($this->request->getFile('foto4')->getError() == 4) {
            $file_foto4 = null;
            $nama_foto4 = null;
        } else {
            $file_foto4 = $this->request->getFile('foto4');
            if ($file_foto4->getSize() <= 10240000) {
                $ext = $file_foto4->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto4 = $file_foto4->getRandomName();
                    $file_foto4->move('assets/images/' . $folder, $nama_foto4);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }
        if ($this->request->getFile('foto5')->getError() == 4) {
            $file_foto5 = null;
            $nama_foto5 = null;
        } else {
            $file_foto5 = $this->request->getFile('foto5');
            if ($file_foto5->getSize() <= 10240000) {
                $ext = $file_foto5->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto5 = $file_foto5->getRandomName();
                    $file_foto5->move('assets/images/' . $folder, $nama_foto5);
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda Upload adalah foto!');
                    return redirect()->to('/tambahKos')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/tambahKos')->withInput();
            }
        }

        // membuat string-> integer
        $user_id = (int)$this->request->getVar('user_id');
        $harga = (int)$this->request->getVar('harga');
        $kamar = (int)$this->request->getVar('kamar');

        //Mengolah nomor hp 08->628
        //Terlebih dahulu kita trim dl
        $nomorhp = trim($this->request->getVar('wa'));
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
        if ($this->request->getVar('kipas') == "on") {
            $kipas = true;
        } else {
            $kipas = false;
        }
        if ($this->request->getVar('wifi') == "on") {
            $wifi = true;
        } else {
            $wifi = false;
        }
        if ($this->request->getVar('cermin') == "on") {
            $cermin = true;
        } else {
            $cermin = false;
        }
        if ($this->request->getVar('meja') == "on") {
            $meja = true;
        } else {
            $meja = false;
        }
        if ($this->request->getVar('kursi') == "on") {
            $kursi = true;
        } else {
            $kursi = false;
        }
        if ($this->request->getVar('bantal') == "on") {
            $bantal = true;
        } else {
            $bantal = false;
        }
        if ($this->request->getVar('guling') == "on") {
            $guling = true;
        } else {
            $guling = false;
        }

        // mengambil nama provinsi dari kode
        $no_provinsi = $this->request->getVar('provinsi');
        $koneksi = mysqli_connect('localhost', 'root', '', 'saharaku');
        $provinsi_query = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode=$no_provinsi");
        $provinsi = mysqli_fetch_array($provinsi_query);

        $this->kosModel->save([
            'nama' => $this->request->getVar('nama'),
            'folder' => $folder,
            'harga' => $harga,
            'kamar' => $kamar,
            'pemilik' => $this->request->getVar('pemilik'),
            'user_id' => $user_id,
            'wa' => $nomorhp,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tipe' => $this->request->getVar('tipe'),
            'provinsi' => $provinsi['nama'],
            'kabupaten' => $this->request->getVar('kabupaten'),
            'alamat' => $this->request->getVar('alamat'),
            'kamar_mandi_dalam' => $kamar_mandi_dalam,
            'ac' => $ac,
            'kipas' => $kipas,
            'wifi' => $wifi,
            'cermin' => $cermin,
            'meja' => $meja,
            'kursi' => $kursi,
            'bantal' => $bantal,
            'guling' => $guling,
            'thumbnail' => $nama_thumbnail,
            'foto1' => $nama_foto1,
            'foto2' => $nama_foto2,
            'foto3' => $nama_foto3,
            'foto4' => $nama_foto4,
            'foto5' => $nama_foto5,
            'created_at' => Time::now(),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/profil#kelolaKos');
    }

    public function hapusKos($id)
    {
        // Cari foto kos
        $kos = $this->kosModel->find($id);
        $album = $kos['folder'] . '/';

        // Hapus Data di database
        $this->kosModel->delete($id);

        // Hapus Gambar
        unlink('assets/images/' . $album . $kos['thumbnail']);
        if ($kos['foto1'] != null) {
            unlink('assets/images/' . $album . $kos['foto1']);
        }
        if ($kos['foto2'] != null) {
            unlink('assets/images/' . $album . $kos['foto2']);
        }
        if ($kos['foto3'] != null) {
            unlink('assets/images/' . $album . $kos['foto3']);
        }
        if ($kos['foto4'] != null) {
            unlink('assets/images/' . $album . $kos['foto4']);
        }
        if ($kos['foto5'] != null) {
            unlink('assets/images/' . $album . $kos['foto5']);
        }

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/profil#kelolaKos');
    }

    public function editKos($id)
    {
        session();
        $profil = user();
        $kos = $this->kosModel->getKos($id);
        // dd($kos);
        $data = [
            "title" => "Edit Kos | SahabatRantauKu.com",
            "data_profil" => $profil,
            "data_kos" => $kos,
            'validation' => \Config\Services::validation(),
        ];
        return view('kos/editKos', $data);
    }

    public function updateKos($id)
    {
        // Validasi awal
        if (!$this->validate($this->validation_rules)) {
            $validation = \Config\Services::validation();
            // session()->setFlashdata('validation' => , 'Pastikan Foto yang anda masukkan sudah benar!');
            // return redirect()->to('/tambahKos');
            // return redirect()->to('/tambahKos')->withInput()->with('validation', $validation);
            $profil = user();
            $data = [
                "title" => "Edit Kos | SahabatRantauKu.com",
                "data_profil" => $profil,
                'validation' => $validation,
            ];
            return view('kos/editKos', $data);
        }

        // Menyiapkan direktori per kos
        $album = $this->request->getVar('folder') . '/';
        // Mengambil file foto
        if ($this->request->getFile('thumbnail')->getError() == 4) {
            $nama_thumbnail = $this->request->getVar('thumbnail_lama');
        } else {
            $file_thumbnail = $this->request->getFile('thumbnail');
            if ($file_thumbnail->getSize() <= 10240000) {
                $ext = $file_thumbnail->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    // Ambil Data Baru
                    $nama_thumbnail = $file_thumbnail->getRandomName();
                    $file_thumbnail->move('assets/images/' . $album, $nama_thumbnail);
                    //    Hapus Foto Lama
                    unlink('assets/images/' . $album . $this->request->getVar('thumbnail_lama'));
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda masukkan adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }
        if ($this->request->getFile('foto1')->getError() == 4) {
            if ($this->request->getVar('foto1_lama') == "") {
                $nama_foto1 = null;
            } else {
                $nama_foto1 = $this->request->getVar('foto1_lama');
            }
        } else {
            $file_foto1 = $this->request->getFile('foto1');
            if ($file_foto1->getSize() <= 10240000) {
                $ext = $file_foto1->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto1 = $file_foto1->getRandomName();
                    $file_foto1->move('assets/images/' . $album, $nama_foto1);
                    // Hapus Gambar Lama
                    if ($this->request->getVar('foto1_lama') != "") {
                        unlink('assets/images/' . $album . $this->request->getVar('foto1_lama'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }
        if ($this->request->getFile('foto2')->getError() == 4) {
            if ($this->request->getVar('foto2_lama') == "") {
                $nama_foto2 = null;
            } else {
                $nama_foto2 = $this->request->getVar('foto2_lama');
            }
        } else {
            $file_foto2 = $this->request->getFile('foto2');
            if ($file_foto2->getSize() <= 10240000) {
                $ext = $file_foto2->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto2 = $file_foto2->getRandomName();
                    $file_foto2->move('assets/images/' . $album, $nama_foto2);
                    // Hapus Gambar Lama
                    if ($this->request->getVar('foto2_lama') != "") {
                        unlink('assets/images/' . $album . $this->request->getVar('foto2_lama'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }
        if ($this->request->getFile('foto3')->getError() == 4) {
            if ($this->request->getVar('foto3_lama') == "") {
                $nama_foto3 = null;
            } else {
                $nama_foto3 = $this->request->getVar('foto3_lama');
            }
        } else {
            $file_foto3 = $this->request->getFile('foto3');
            if ($file_foto3->getSize() <= 10240000) {
                $ext = $file_foto3->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto3 = $file_foto3->getRandomName();
                    $file_foto3->move('assets/images/' . $album, $nama_foto3);
                    // Hapus Gambar Lama
                    if ($this->request->getVar('foto3_lama') != "") {
                        unlink('assets/images/' . $album . $this->request->getVar('foto3_lama'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }
        if ($this->request->getFile('foto4')->getError() == 4) {
            if ($this->request->getVar('foto4_lama') == "") {
                $nama_foto4 = null;
            } else {
                $nama_foto4 = $this->request->getVar('foto4_lama');
            }
        } else {
            $file_foto4 = $this->request->getFile('foto4');
            if ($file_foto4->getSize() <= 10240000) {
                $ext = $file_foto4->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto4 = $file_foto4->getRandomName();
                    $file_foto4->move('assets/images/' . $album, $nama_foto4);
                    // Hapus Gambar Lama
                    if ($this->request->getVar('foto4_lama') != "") {
                        unlink('assets/images/' . $album . $this->request->getVar('foto4_lama'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }
        if ($this->request->getFile('foto5')->getError() == 4) {
            if ($this->request->getVar('foto5_lama') == "") {
                $nama_foto5 = null;
            } else {
                $nama_foto5 = $this->request->getVar('foto5_lama');
            }
        } else {
            $file_foto5 = $this->request->getFile('foto5');
            if ($file_foto5->getSize() <= 10240000) {
                $ext = $file_foto5->getMimeType();
                if (($ext == "image/jpeg") || ($ext == "image/jpg") || ($ext == "image/png")) {
                    $nama_foto5 = $file_foto5->getRandomName();
                    $file_foto5->move('assets/images/' . $album, $nama_foto5);
                    if ($this->request->getVar('foto5_lama') != "") {
                        unlink('assets/images/' . $album . $this->request->getVar('foto5_lama'));
                    }
                } else {
                    session()->setFlashdata('pesan', 'Pastikan yang anda Upload adalah foto!');
                    return redirect()->to('/editKos');
                }
            } else {
                session()->setFlashdata('pesan', 'Pastikan ukuran foto kurang dari 10MB !');
                return redirect()->to('/editKos');
            }
        }

        // membuat string-> integer
        $user_id = (int)$this->request->getVar('user_id');
        $harga = (int)$this->request->getVar('harga');
        $kamar = (int)$this->request->getVar('kamar');

        //Mengolah nomor hp 08->628
        //Terlebih dahulu kita trim dl
        $nomorhp = trim($this->request->getVar('wa'));
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
        if ($this->request->getVar('kipas') == "on") {
            $kipas = true;
        } else {
            $kipas = false;
        }
        if ($this->request->getVar('wifi') == "on") {
            $wifi = true;
        } else {
            $wifi = false;
        }
        if ($this->request->getVar('cermin') == "on") {
            $cermin = true;
        } else {
            $cermin = false;
        }
        if ($this->request->getVar('meja') == "on") {
            $meja = true;
        } else {
            $meja = false;
        }
        if ($this->request->getVar('kursi') == "on") {
            $kursi = true;
        } else {
            $kursi = false;
        }
        if ($this->request->getVar('bantal') == "on") {
            $bantal = true;
        } else {
            $bantal = false;
        }
        if ($this->request->getVar('guling') == "on") {
            $guling = true;
        } else {
            $guling = false;
        }

        $this->kosModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'harga' => $harga,
            'kamar' => $kamar,
            'pemilik' => $this->request->getVar('pemilik'),
            'user_id' => $user_id,
            'wa' => $nomorhp,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tipe' => $this->request->getVar('tipe'),
            'alamat' => $this->request->getVar('alamat'),
            'kamar_mandi_dalam' => $kamar_mandi_dalam,
            'ac' => $ac,
            'kipas' => $kipas,
            'wifi' => $wifi,
            'cermin' => $cermin,
            'meja' => $meja,
            'kursi' => $kursi,
            'bantal' => $bantal,
            'guling' => $guling,
            'thumbnail' => $nama_thumbnail,
            'foto1' => $nama_foto1,
            'foto2' => $nama_foto2,
            'foto3' => $nama_foto3,
            'foto4' => $nama_foto4,
            'foto5' => $nama_foto5,
            'updated_at' => Time::now(),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/profil#kelolaKos');
    }

    public function hubungi()
    {
        // Menyimpan Riwayat Chat
        $id_kos = (int)$this->request->getVar('id_kos');

        $this->chatModel->save([
            'nama' => $this->request->getVar('nama_penghubung'),
            'kos' => $this->request->getVar('nama_kos'),
            'pesan' => $this->request->getVar('pesan'),
            'created_at' => Time::now(),
            'id_kos' => $id_kos,
        ]);

        // Mengalihkan ke WA
        if ($this->request->getVar('tipe') == 'Kontrakan') {
            return redirect()->to('https://api.whatsapp.com/send?phone=' . $this->request->getVar('nomor') . '&text=Halo, nama saya ' . $this->request->getVar('nama_penghubung') . ', saya mendapatkan informasi kontrakan ini dari website sahabatrantauku.com. ' . $this->request->getVar('pesan'));
        } else {
            return redirect()->to('https://api.whatsapp.com/send?phone=' . $this->request->getVar('nomor') . '&text=Halo, nama saya ' . $this->request->getVar('nama_penghubung') . ', saya mendapatkan informasi kos ini dari website sahabatrantauku.com. ' . $this->request->getVar('pesan'));
        }
    }
}
