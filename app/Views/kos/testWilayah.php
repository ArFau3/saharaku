<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h2>Data Daerah Indonesia Dengan PHP, MySQLi & Ajax <br> <a href="https://www.malasngoding.com/menampilkan-data-daerah-indonesia-php-mysqli-ajax">www.malasngoding.com</a></h2>



<nav class="navbar navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="index.php" style="color: #fff;">
        Dewan Komputer
    </a>
</nav>

<div class="container mb-5">
    <h2 align="center" style="margin: 60px 10px 10px 10px;">Dewan Demo Combobox Bertingkat Daerah Indonesia</h2>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control" name="kabupaten" id="form_prov">
                    <option value="">Pilih Provinsi</option>
                    <?php
                    $koneksi = mysqli_connect('localhost', 'root', '', 'saharaku');
                    $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");

                    while ($d = mysqli_fetch_array($daerah)) {
                    ?>
                        <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Kabupaten</label>
            <select class="form-control" name="kabupaten" id="form_kab">
                <option value=""></option>
            </select>
        </div>

    </div>
</div>
<hr>
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
</script>
<?= $this->endSection() ?>