<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php $data_kos['provinsi'] = 0;
$data_kos['kabupaten'] = 0;
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
        <input type="hidden" id="pemilik" name="pemilik" value="<?php $data_profil->firstname ? print "$data_profil->firstname" : print "$data_profil->username" ?>">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $data_profil->id; ?>">
        <input type="hidden" id="thumbnail_lama" name="thumbnail_lama" value="<?php echo $data_kos['thumbnail'] ?>">
        <input type="hidden" id="foto1_lama" name="foto1_lama" value="<?php echo $data_kos['foto1'] ?>">
        <input type="hidden" id="foto2_lama" name="foto2_lama" value="<?php echo $data_kos['foto2'] ?>">
        <!-- END HIDDEN INPUT -->
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
                                <option value="Kos Putra">Kos Putra</option>
                                <option value="Kos Putri">Kos Putri</option>
                                <option value="Kos Campuran">Kos Campuran</option>
                                <option value="Kos Pasutri">Kos Pasutri</option>
                                <option value="Kontrakan">Kontrakan</option>
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
                        <div class="col-2">
                            <label for="kamar_mandi_dalam" class="col-form-label">Kamar Mandi Dalam :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" <?php $data_kos['kamar_mandi_dalam'] ? print "checked" : print "" ?> role="switch" id="kamar_mandi_dalam" name="kamar_mandi_dalam">
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="ac" class="col-form-label">AC :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac" <?php $data_kos['ac'] ? print "checked" : print "" ?> name="ac">
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="wifi" class="col-form-label">Free wifi :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" <?php $data_kos['wifi'] ? print "checked" : print "" ?> id="wifi" name="wifi">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Foto Kos -->
        <!-- <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3">
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="thumbnail" class="col-form-label">Tambahkan Foto Utama:</label>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
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
                    <div class="row g-3">
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="foto1" class="col-form-label">Tambahkan Foto Lagi:</label>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto1" name="foto1">
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
                    <div class="row g-3">
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="foto2" class="col-form-label">Tambahkan Foto Lagi:</label>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto2" name="foto2">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div> -->

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

<script type="text/javascript">
    $(document).ready(function() {

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab").html(hasil);
                }
            });
        });

    });

    //Membuat Custom function (sekali bikin bisa untuk berkali-kali pakainya cukup panggil nama functionnya)
    function getSelectText(selId) {
        var sel = document.getElementById(selId);
        var i = sel.selectedIndex;
        var selected_text = sel.options[i].text;
        return selected_text;
    }

    //untuk mengambil value namanya-nya
    let provinsi = getSelectText(form_prov);
    let kabupaten = getSelectText(form_kab);

    console.log(provinsi, kabupaten);
</script>
<?= $this->endSection() ?>