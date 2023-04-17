<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php
// dd($data_kos);
?>
<div class="text-center">
    <h3 class="mt-4 mb-4">Form Rubah Data Kos <?= $data_kos['nama']; ?></h3>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>
<div class="container-fluid mx-lg-5">
    <form action="/updateKos/<?= $data_kos['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <!-- HIDDEN INPUT -->
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $data_profil->id; ?>">
        <input type="hidden" id="provinsi" name="provinsi" value="<?php echo $data_kos['provinsi'] ?>">
        <input type="hidden" id="kabupaten" name="kabupaten" value="<?php echo $data_kos['kabupaten'] ?>">
        <input type="hidden" id="folder" name="folder" value="<?php echo $data_kos['folder'] ?>">
        <input type="hidden" id="thumbnail_lama" name="thumbnail_lama" value="<?php print $data_kos['thumbnail'] ?>">
        <input type="hidden" id="foto1_lama" name="foto1_lama" value="<?php print $data_kos['foto1'] ?>">
        <input type="hidden" id="foto2_lama" name="foto2_lama" value="<?php print $data_kos['foto2'] ?>">
        <input type="hidden" id="foto3_lama" name="foto3_lama" value="<?php print $data_kos['foto3'] ?>">
        <input type="hidden" id="foto4_lama" name="foto4_lama" value="<?php print $data_kos['foto4'] ?>">
        <input type="hidden" id="foto5_lama" name="foto5_lama" value="<?php print $data_kos['foto5'] ?>">
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
                            <input type="text" id="pemilik" name="pemilik" class="form-control<?php ($validation->hasError('pemilik')) ? print "is-invalid" : print "" ?>" aria-describedby="passwordHelpInline" value="<?php $data_kos['pemilik'] ? print $data_kos['pemilik'] : ($data_profil->firstname ? print $data_profil->firstname : print $data_profil->username) ?>">
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
                        <div class="col-2">
                            <label for="nama" class="col-form-label">Nama Kos :</label>
                        </div>
                        <div class="col-8">
                            <input type="text" value="<?= $data_kos['nama']; ?>" id="nama" name="nama" autofocus class="form-control" aria-describedby="passwordHelpInline">
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
                        <div class="col-2">
                            <label for="kamar" class="col-form-label">Jumlah Kamar : </label>
                        </div>
                        <div class="col-8">
                            <input type="number" id="kamar" value="<?= $data_kos['kamar']; ?>" name="kamar" class="form-control" aria-describedby="passwordHelpInline">
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
                        <div class="col-2">
                            <label for="harga" class="col-form-label d-flex" style="justify-content: space-between;">Harga per bulan : <h5>Rp.</h5></label>
                        </div>
                        <div class="col-8">
                            <input type="number" id="harga" value="<?= $data_kos['harga']; ?>" name="harga" class="form-control" aria-describedby="passwordHelpInline">
                            <div id="harga" class="form-text">Masukkan hanya <u><b>ANGKA</b></u> tanpa koma(,) atau titik (.)</div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nomor WA -->
        <?php if ($data_profil->phone) : ?>
            <input type="hidden" id="wa" name="wa" value="<?php print "$data_profil->phone"; ?>">
        <?php else : ?>
            <div class="row">
                <div class="col">
                    <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                        <div class="row g-3 align-items-center pt-2">
                            <div class="col"></div>
                            <div class="col-2">
                                <label for="wa" class="col-form-label">Nomor WA :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="wa" value="<?= $data_kos['wa']; ?>" name="wa" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Deskripsi Kos -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center">
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="deskripsi" class="col-form-label">Deskripsi Kos :</label>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $data_kos['deskripsi']; ?></textarea>
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
                        <div class="col-2">
                            <label for="tipe" class="col-form-label">Jenis Kos :</label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" id="tipe" name="tipe" aria-label="Default select example">
                                <option value="Kos Putra" <?php ($data_kos['tipe'] == "Kos Putra") ? print 'selected' : print '' ?>>Kos Putra</option>
                                <option value="Kos Putri" <?php ($data_kos['tipe'] == "Kos Putri") ? print 'selected' : print '' ?>>Kos Putri</option>
                                <option value="Kos Campur" <?php ($data_kos['tipe'] == "Kos Campur") ? print 'selected' : print '' ?>>Kos Campuran</option>
                                <option value="Kos Pasutri" <?php ($data_kos['tipe'] == "Kos Pasutri") ? print 'selected' : print '' ?>>Kos Pasutri</option>
                                <option value="Kontrakan" <?php ($data_kos['tipe'] == "Kontrakan") ? print 'selected' : print '' ?>>Kontrakan</option>
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
                        <div class="col-2">
                            <label for="alamat" class="col-form-label">Alamat Kos :</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="alamat" value="<?= $data_kos['alamat']; ?>" name="alamat" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Informasi Tambahanan -->
        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 align-items-center pt-3">
                        <div class="col">
                            <h3 class="text-center">Informasi Tambahan</h3>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="kamar_mandi_dalam" name="kamar_mandi_dalam" <?php $data_kos['kamar_mandi_dalam'] ? print "checked" : print "" ?>>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="kipas" name="kipas" <?php $data_kos['kipas'] ? print "checked" : print "" ?>>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="ac" class="col-form-label">AC :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac" name="ac" <?php $data_kos['ac'] ? print "checked" : print "" ?>>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="wifi" name="wifi" <?php $data_kos['wifi'] ? print "checked" : print "" ?>>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="cermin" class="col-form-label">Cermin :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="cermin" name="cermin" <?php $data_kos['cermin'] ? print "checked" : print "" ?>>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="meja" name="meja" <?php $data_kos['meja'] ? print "checked" : print "" ?>>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="kursi" class="col-form-label">Kursi :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="kursi" name="kursi" <?php $data_kos['kursi'] ? print "checked" : print "" ?>>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="bantal" name="bantal" <?php $data_kos['bantal'] ? print "checked" : print "" ?>>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-lg-2">
                            <label for="guling" class="col-form-label">Guling :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="guling" name="guling" <?php $data_kos['guling'] ? print "checked" : print "" ?>>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Foto Kos -->
        <?php
        $nama_thumbnail = $data_kos['thumbnail'];
        $nama_foto1 = $data_kos['foto1'];
        $nama_foto2 = $data_kos['foto2'];
        $nama_foto3 = $data_kos['foto3'];
        $nama_foto4 = $data_kos['foto4'];
        $nama_foto5 = $data_kos['foto5'];
        $album = $data_kos['folder'] . '/';
        ?>
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
                                    <img src="/assets/images/<?= $album ?><?php $nama_thumbnail ? print $nama_thumbnail : print 'kos-default.png' ?>" class="img-thumbnail img-preview" alt="">
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
                            <img src="/assets/images/<?php $nama_foto1 ? print $album . $nama_foto1 : print 'kos-default.png' ?>" class="img-thumbnail img-preview1" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto1" name="foto1" onchange="previewImg1()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="/assets/images/<?php $nama_foto2 ? print $album . $nama_foto2 : print 'kos-default.png' ?>" class="img-thumbnail img-preview2" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto2" name="foto2" onchange="previewImg2()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="/assets/images/<?php $nama_foto3 ? print $album . $nama_foto3 : print 'kos-default.png' ?>" class="img-thumbnail img-preview3" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto3" name="foto3" onchange="previewImg3()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="/assets/images/<?php $nama_foto4 ? print $album . $nama_foto4 : print 'kos-default.png' ?>" class="img-thumbnail img-preview4" alt="">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto4" name="foto4" onchange="previewImg4()">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <img src="/assets/images/<?php $nama_foto5 ? print $album . $nama_foto5 : print 'kos-default.png' ?>" class="img-thumbnail img-preview5" alt="">
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
                        <div class="col"><button type="submit" class="btn btn-light border">Ubah Data Kos</button></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>