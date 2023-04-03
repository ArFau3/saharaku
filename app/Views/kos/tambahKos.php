<?php include '../app/Controllers/koneksi.php'; ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="text-center">
    <h3 class="mt-4 mb-4">Form Tambah Kos/Kontrakan</h3>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>
<div class="container-fluid mx-lg-5">
    <form action="/simpanKos" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <!-- HIDDEN INPUT -->
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $data_profil->id; ?>">
        <!-- END HIDDEN INPUT -->
        <!-- Nama Pemilik -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-2">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="pemilik" class="col-form-label">Nama Pemilik :</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="pemilik" name="pemilik" class="form-control<?php ($validation->hasError('pemilik')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php $data_profil->firstname ? print "$data_profil->firstname" : print "$data_profil->username" ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('pemilik'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nama Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-2">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="nama" class="col-form-label">Nama Kos/Kontrakan :</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="nama" name="nama" autofocus class="form-control <?php ($validation->hasError('nama')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php old('nama') ? print old('nama') : print $lama['nama'] ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Kamar -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-2">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="kamar" class="col-form-label">Jumlah Kamar<small>(Opsional)</small> : </label>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" id="kamar" name="kamar" class="form-control" aria-describedby="passwordHelpInline" value="<?php old('kamar') ? print old('kamar') : print $lama['kamar'] ?>">
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Harga Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="harga" class="col-form-label d-flex" style="justify-content: space-between;">Harga per bulan : <h5>Rp.</h5></label>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" id="harga" name="harga" class="form-control <?php ($validation->hasError('harga')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php old('harga') ? print old('harga') : print $lama['harga'] ?>">
                            <div id="harga" class="form-text">Masukkan hanya <u><b>ANGKA</b></u> tanpa koma(,) atau titik (.)</div>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nomor WA -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-2">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="wa" class="col-form-label">Nomor WA :</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="wa" name="wa" class="form-control <?php ($validation->hasError('wa')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php $data_profil->wa ? print "$data_profil->wa" : (old('wa') ? print old('wa') : print $lama['wa']) ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('wa'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Deskripsi Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="deskripsi" class="col-form-label">Deskripsi Hunian<small>(Opsional)</small> :</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php old('deskripsi') ? print old('deskripsi') : print $lama['deskripsi'] ?></textarea>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jenis Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="tipe" class="col-form-label">Jenis Hunian :</label>
                        </div>
                        <div class="col-lg-8">
                            <select class="form-select" id="tipe" name="tipe" aria-label="Default select example">
                                <option value="Kos Putra" <?php ($lama['tipe'] == "Kos Putra") ? print 'selected' : (old('tipe') == "Kos Putra" ? print 'selected' : print '') ?>>Kos Putra</option>
                                <option value="Kos Putri" <?php ($lama['tipe'] == "Kos Putri") ? print 'selected' : (old('tipe') == "Kos Putri" ? print 'selected' : print '') ?>>Kos Putri</option>
                                <option value="Kos Campur" <?php ($lama['tipe'] == "Kos Campur") ? print 'selected' : (old('tipe') == "Kos Campur" ? print 'selected' : print '') ?>>Kos Campuran</option>
                                <option value="Kos Pasutri" <?php ($lama['tipe'] == "Kos Pasutri") ? print 'selected' : (old('tipe') == "Kos Pasutri" ? print 'selected' : print '') ?>>Kos Pasutri</option>
                                <option value="Kontrakan" <?php ($lama['tipe'] == "Kontrakan") ? print 'selected' : (old('tipe') == "Kontrakan" ? print 'selected' : print '') ?>>Kontrakan</option>
                            </select>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Alamat Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="alamat" class="col-form-label">Alamat Hunian :</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="alamat" name="alamat" class="form-control <?php ($validation->hasError('alamat')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php old('alamat') ? print old('alamat') : print $lama['alamat'] ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- SECTION Filter -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label for="provinsi" class="mb-2">Provinsi : </label>
                        </div>
                        <div class="col-lg-8">
                            <select class="form-control <?php ($validation->hasError('provinsi')) ? print "is-invalid" : print "" ?>" name="provinsi" id="form_prov">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");

                                while ($d = mysqli_fetch_array($daerah)) {
                                ?>
                                    <option id="provinsi" name="provinsi" value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('provinsi'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-lg-2">
                            <label class="mb-2" for="kabupaten">Kabupaten : </label>
                        </div>
                        <div class="col-lg-8">
                            <select class="form-control <?php ($validation->hasError('kabupaten')) ? print "is-invalid" : print "" ?>" name="kabupaten" id="form_kab">
                                <option value="" id="kabupaten" name="kabupaten"></option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('kabupaten'); ?>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION Filter -->
        <!-- Informasi Tambahanan -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-3">
                        <div class="col">
                            <h3 class="text-center">Informasi Tambahan <small>(Opsional)</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Informasi Tambahanan-->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-3">
                            <label for="kamar_mandi_dalam" class="col-form-label">Kamar Mandi Dalam :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="kamar_mandi_dalam" name="kamar_mandi_dalam">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                        </div>
                        <div class="col-1">
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-3">
                            <label for="kipas" class="col-form-label">Kipas Angin dalam Kamar :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="kipas" name="kipas">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="ac" class="col-form-label">AC :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac" name="ac">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-3">
                            <label for="wifi" class="col-form-label">Free Wifi :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="wifi" name="wifi">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="cermin" class="col-form-label">Cermin :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="cermin" name="cermin">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-3">
                            <label for="meja" class="col-form-label">Meja :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="meja" name="meja">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="kursi" class="col-form-label">Kursi :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="kursi" name="kursi">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-3">
                            <label for="bantal" class="col-form-label">Bantal :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="bantal" name="bantal">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="guling" class="col-form-label">Guling :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="guling" name="guling">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Foto Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-3">
                        <div class="col">
                            <h3 class="text-center">Tambahkan Foto <small>(Minimal 1)</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3">
                        <div class="col-2"></div>
                        <div class="col-lg-2">
                            <label for="thumbnail" class="col-form-label">Foto Utama :</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <img src="assets/images/kos-default.png" class="img-thumbnail img-preview" alt="">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" onchange="previewImg()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-3">
                        <div class="col">
                            <h5 class="text-center">Foto-foto Tambahan Lainnya <small>(Opsional)</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2 col-4">
                            <img src="assets/images/kos-default.png" class="img-thumbnail img-preview1" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto1" name="foto1" onchange="previewImg1()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="assets/images/kos-default.png" class="img-thumbnail img-preview2" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto2" name="foto2" onchange="previewImg2()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="assets/images/kos-default.png" class="img-thumbnail img-preview3" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto3" name="foto3" onchange="previewImg3()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="assets/images/kos-default.png" class="img-thumbnail img-preview4" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto4" name="foto4" onchange="previewImg4()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="assets/images/kos-default.png" class="img-thumbnail img-preview5" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto5" name="foto5" onchange="previewImg5()">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 py-5 text-center">
                        <div class="col"><button type="submit" class="btn btn-light border">Tambahkan Data</button></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>