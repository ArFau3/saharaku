<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="text-center">
    <h3 class="mt-4 mb-4">Form Tambah Kos</h3>
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
                        <div class="col-2">
                            <label for="pemilik" class="col-form-label">Nama Pemilik :</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="pemilik" name="pemilik" class="form-control" aria-describedby="passwordHelpInline" value="<?php $data_profil->firstname ? print "$data_profil->firstname" : print "$data_profil->username" ?>">
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
                            <input type="text" id="nama" name="nama" autofocus class="form-control" aria-describedby="passwordHelpInline">
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
                            <input type="number" id="kamar" name="kamar" class="form-control" aria-describedby="passwordHelpInline">
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
                            <input type="number" id="harga" name="harga" class="form-control" aria-describedby="passwordHelpInline">
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
                                <input type="text" id="wa" name="wa" class="form-control" aria-describedby="passwordHelpInline" value="<?php $data_profil->wa ? print "$data_profil->wa" : null ?>">
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
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
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
                            <input type="text" id="alamat" name="alamat" class="form-control" aria-describedby="passwordHelpInline">
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
                        <div class="col-2">
                            <label for="provinsi" class="mb-2">Provinsi : </label>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="provinsi" id="form_prov">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                $koneksi = mysqli_connect('localhost', 'root', '', 'saharaku');
                                $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");

                                while ($d = mysqli_fetch_array($daerah)) {
                                ?>
                                    <option id="provinsi" name="provinsi" value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
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
                        <div class="col-2">
                            <label class="mb-2" for="kabupaten">Kabupaten : </label>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="kabupaten" id="form_kab">
                                <option value="" id="kabupaten" name="kabupaten"></option>
                            </select>
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
                                <input class="form-check-input" type="checkbox" role="switch" id="kamar_mandi_dalam" name="kamar_mandi_dalam">
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="ac" class="col-form-label">AC :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac" name="ac">
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-2">
                            <label for="wifi" class="col-form-label">Free wifi :</label>
                        </div>
                        <div class="col-1">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="wifi" name="wifi">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Foto Kos -->
        <div class="row">
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
        </div>

        <div class="row">
            <div class="col">
                <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                    <div class="row g-3 py-5 text-center">
                        <div class="col"><button type="submit" class="btn btn-light border">Tambah Kos</button></div>
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