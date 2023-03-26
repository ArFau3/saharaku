# WILAYAH
Kode dan Data Wilayah Administrasi Pemerintahan dan Pulau Indonesia sesuai Permendagri No 58 Tahun 2021 (diperbaharui dengan Kepmendagri No. 050-145 Tahun 2022) menggunakan PHP+MySQL+AJaX

Kode dan Data Wilayah Pemerintahan Indonesia  dalam database :
- wilayah.sql (data kode wilayah terbaru sesuai dengan Kepmendagri No. 050-145 Tahun 2022)
- wilayah_2022.sql sesuai Permendagri No 58 Tahun 2021 (revised by Kepmendagri No. 050-145 Tahun 2022)
- wilayah_2020.sql sesuai Permendagri No. 72 Tahun 2019 (revised by Kepmendagri No.146.1-4717 Tahun 2020)
- wilayah_2018.sql sesuai Permendagri No 137 tahun 2017
- wilayah_2016.sql sesuai Permendagri No 56 Tahun 2015
- wilayah_level_1_2.sql sesuai Permendagri No. 58 Tahun 2021 untuk data provinsi dan kab/kota dengan koordinat,elevation,timezone,luas, jumlah penduduk dan boundaries

Kode dan Data Pulau Indonesia dalam database :
- pulau_2022.sql sesuai Permendagri No 58 Tahun 2021 (revised by Kepmendagri No. 050-145 Tahun 2022) *

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/cahyadsn/wilayah.svg)](https://github.com/cahyadsn/wilayah/issues)
[![GitHub forks](https://img.shields.io/github/forks/cahyadsn/wilayah.svg)](https://github.com/cahyadsn/wilayah/network)
[![GitHub stars](https://img.shields.io/github/stars/cahyadsn/wilayah.svg)](https://github.com/cahyadsn/wilayah/stargazers)
[![GitHub last commit](https://img.shields.io/github/last-commit/google/skia.svg?style=flat)]()
[![Donate](https://img.shields.io/badge/$-support-ff69b4.svg?style=flat)](https://paypal.me/cahyadwiana)

## NOTE :
Data belum termasuk data perubahan adanya pembentukan provinsi baru
- UU No 14 Tahun 2022 tentang Pembentukan Provinsi Papua Selatan (LN.2022/No.157, TLN No.6803, jdih.setneg.go.id: 15 hlm., 25 Juli 2022)
- UU No 15 Tahun 2022 tentang Pembentukan Provinsi Papua Tengah (LN.2022/No.158, TLN No.6804, jdih.setneg.go.id: 14 hlm., 25 Juli 2022)
- UU No 16 Tahun 2022 tentang Pembentukan Provinsi Papua Pegunungan (LN.2022/No.159, TLN No.6805, jdih.setneg.go.id: 14 hlm., 25 Juli 2022)
- UU No 22 Tahun 2022 tentang Pembentukan Provinsi Papua Barat Daya (LN.2022/No.223, TLN No.6831, jdih.setneg.go.id: 15 hlm., 08 Desember 2002)

Data perubahan kode wilayah atas pembentukan provinsi baru belum ada pemutakhiran data dari Kemendagri

## Data Kepmendagri No 050-145 Tahun 2022
Database Data dan Kode Wilayah Administrasi Pemerintahan sesuai Permendagri No 58 Tahun 2021  dengan revisi berdasarkan Kepmendagrin No 050-145 Tahun 2022 (wilayah_2022.sql)

| id_prov | nama                      | kab  | kota | kec | kel  | desa | pulau |
|---------|---------------------------|-----:|-----:|-----|-----:|-----:|------:|
| 11      | Aceh*                     |   18 |    5 | 290 |    0 | 6497 |   363 |
| 12      | Sumatera Utara*           |   25 |    8 | 455 |  693 | 5417 |   229 |
| 13      | Sumatera Barat*           |   12 |    7 | 179 |  230 |  929 |   218 |
| 14      | Riau*                     |   10 |    2 | 172 |  271 | 1591 |   144 |
| 15      | Jambi*                    |    9 |    2 | 144 |  165 | 1399 |    14 |
| 16      | Sumatera Selatan*         |   13 |    4 | 241 |  395 | 2853 |    24 |
| 17      | Bengkulu*                 |    9 |    1 | 129 |  172 | 1341 |     9 |
| 18      | Lampung*                  |   13 |    2 | 229 |  205 | 2435 |   172 |
| 19      | Kepulauan Bangka Belitung*|    6 |    1 |  47 |   84 |  309 |   507 |
| 21      | Kepulauan Riau*           |    5 |    2 |  76 |  142 |  275 |  2025 |
| 31      | DKI Jakarta               |    1 |    5 |  44 |  267 |    0 |   113 |
| 32      | Jawa Barat                |   18 |    9 | 627 |  645 | 5312 |    30 |
| 33      | Jawa Tengah               |   29 |    6 | 576 |  753 | 7809 |    71 |
| 34      | DI Yogyakarta             |    4 |    1 |  78 |   46 |  392 |    33 |
| 35      | Jawa Timur                |   29 |    9 | 666 |  777 | 7724 |   504 |
| 36      | Banten*                   |    4 |    4 | 155 |  314 | 1238 |    81 |
| 51      | Bali                      |    8 |    1 |  57 |   80 |  636 |    34 |
| 52      | Nusa Tenggara Barat       |    8 |    2 | 117 |  145 | 1005 |   403 |
| 53      | Nusa Tenggara Timur*      |   21 |    1 | 315 |  327 | 3026 |   600 |
| 61      | Kalimantan Barat          |   12 |    2 | 174 |   99 | 2031 |   249 |
| 62      | Kalimantan Tengah*        |   13 |    1 | 136 |  139 | 1432 |    69 |
| 63      | Kalimantan Selatan*       |   11 |    2 | 156 |  144 | 1864 |   158 |
| 64      | Kalimantan Timur*         |    7 |    3 | 105 |  197 |  841 |   243 |
| 65      | Kalimantan Utara*         |    4 |    1 |  55 |   35 |  447 |   196 |
| 71      | Sulawesi Utara            |   11 |    4 | 171 |  332 | 1507 |   329 |
| 72      | Sulawesi Tengah           |   12 |    1 | 175 |  175 | 1842 |  1572 |
| 73      | Sulawesi Selatan*         |   21 |    3 | 311 |  793 | 2255 |   355 |
| 74      | Sulawesi Tenggara*        |   15 |    2 | 220 |  378 | 1908 |   590 |
| 75      | Gorontalo                 |    5 |    1 |  77 |   72 |  657 |   127 |
| 76      | Sulawesi Barat            |    6 |    0 |  69 |   73 |  575 |    69 |
| 81      | Maluku                    |    9 |    2 | 118 |   35 | 1198 |  1337 |
| 82      | Maluku Utara*             |    8 |    2 | 118 |  118 | 1063 |   837 |
| 91      | Papua*                    |   28 |    1 | 566 |  110 | 5411 |   547 |
| 92      | Papua Barat               |   12 |    1 | 218 |   95 | 1742 |  4514 |
|         | TOTAL*                    |  416 |   98 |7266 | 8506 |74961 | 16772 |

)* data mengalami perubahan dari data sebelumnya (data permendagri No 72 Tahun 2019/Kepmendagri No.146.1-4717 Tahun 2020)

) ** Jumlah pulau termasuk 6 pulau besar ( Sumatera, Jawa, Kalimantan, Sulawesi, Timor, dan Papua

link demo bisa dilihat [di sini] https://wilayah.cahyadsn.com/v2.4/ (data sesuai permendagri no 58 tahun 2021, level 1 dan 2)

## Referensi
- Dokumen Referensi : https://github.com/cahyadsn/wilayah_ref
- Keputusan Menteri Dalam Negeri Nomor 050-145 Tahun 2022 Tentang Pemberian Kode, Data Wilayah Administrasi Pemerintahan, Dan Pulau Tahun 2021 (Kepmendagri No. 050-145 Tahun 2022, https://www.kemendagri.go.id/arsip/detail/10857/keputusan-menteri-dalam-negeri-nomor-050145-tahun-2022-tentang-pemberian-kode-data-wilayah-administrasi-pemerintahan-dan-pulau-tahun-2021 (Ditetapkan pada tanggal 14 Februari 2022)
- Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 58 Tahun 2021 Tentang Kode, Data Wilayah Administrasi Pemerintahan, Dan Pulau https://paralegal.id/peraturan/peraturan-menteri-dalam-negeri-nomor-58-tahun-2021/ (Permendagri No.58 2021, Ditetapkan pada tanggal 13 Desember 2021,Berita Negara Tahun 2021 Nomor 1391)
- Penetapan Nama, Kode Dan Jumlah Desa Seluruh Indonesia Tahun 2020 (Kepmendagri No. 146.1-4717 - 2020) http://binapemdes.kemendagri.go.id/produkhukum/detil/keputusan-menteri-dalam-negeri-nomor-1461-4717-tahun-2020 (Ditetapkan pada tanggal 21 Desember 2020)
- Kode dan Data Wilayah Administrasi Pemerintahan (Permendagri No.72-2019) https://www.kemendagri.go.id/page/read/48/peraturan-menteri-dalam-negeri-no72-tahun-2019 (Berita Negara Republik Indonesia Tahun 2019 Nomor 1327, Ditetapkan pada tanggal 8 Oktober 2019)
- Kode dan Data Wilayah Administrasi Pemerintahan (Permendagri No.137-2017) http://www.kemendagri.go.id/produk-hukum/2018/01/18/kode-dan-data-wilayah-administrasi-pemerintahan-tahun-2017 (Berita Negara Republik Indonesia Tahun 2017 Nomor 1955, Ditetapkan pada tanggal 27 Desember 2017)
- Kode dan Data Wilayah Administrasi Pemerintahan (Permendagri No.56-2015) www.kemendagri.go.id/pages/data-wilayah (Berita Negara Republik Indonesia Tahun 2015 Nomor 1045, Ditetapkan pada tanggal 29 Juni 2015)

## To Do
- update web demo ke v2.5 (on progress, data sampai dengan level 3 - kecamatan)
- update web demo ke v2.4 (done)
- update dan penambahan data jumlah penduduk dan luas wilayah data wilayah level 1 dan 2 (done)
- update data based on Permendagri No.58 Tahun 2021 &  Kepmendagri No. 050-145 Tahun 2022 (done)
- update data based on Kepmendagri No.146.1-4717 Tahun 2020 (done)
- update web demo ke v2.3 (done)
- update data di web demo (done)
- penambahan data elevation data wilayah level 1 dan 2 (done)
- update data perubahan nama kecamatan, kelurahan/desa (done)
- update data di web demo v2 (level 1 dan 2) (done)
- meng-update data boundaries data wilayah_level_1_2.sql (done)
- meng-update data latitude/longitude data wilayah_level_1_2.sql (done)
- menambahkan database wilayal_level_1_2.sql (data level provinsi dan kab/kota dengan koordinat, timezone dan boundaries) (done)
- update data ke kode dan data wilayah berdasarkan permendagri No 72 tahun 2019 smp dengan tingkat kelurahan/desa (done)
- update data ke kode dan data wilayah berdasarkan permendagri No 137 tahun 2017 smp dengan tingkat kelurahan/desa (done)
- on progress, convert data dari pdf -> xlsx (done) , xlsx->csv (done) , csv->sql(done) , import sql to db (done), validasi data di db dengan source (done)

## Informasi
- data polygon diperoleh dari website BIG(Badan Informasi Geospatial) di https://tanahair.indonesia.go.id
- data latitude/longitude dari google maps

## Donasi
- untuk donasi via Bank Syariah Indonesia (BSI) 821-342-5550
- untuk donasi via PayPal [https://paypal.me/cahyadwiana]

[di sini]: https://wilayah.cahyadsn.com/v2.4/