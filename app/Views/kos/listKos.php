<?php
// $total_kos = count($data_koses);
// if (isset($_GET["submit"])) {
//     if ($_GET['tgl'] >= 1 && $_GET['tgl'] <= 31) {
//         $tgl = $_GET['tgl'];
//         // $tampil = tabel("SELECT * FROM ju WHERE Tanggal = $tgl");
//     } else {
//         echo "<script>
// 				alert('Tanggal yang Anda masukkan salah!');
// 				document.location.href = 'ju.php';
// 			</script>";
//     }
// }
// 
?>

<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 px-lg-5">
    <div class="hstack gap-3">
        <div class="vr"></div>

        <div class="container-fluid mx-0 px-0">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Kos</li>
                </ol>
            </nav>
            <!-- END Breadcrumb -->
            <!-- SECTION Filter -->
            <div class="container p-4" style="background-color: rgba(240, 235, 235, .5);">
                <form action="" method="get" class="d-flex">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="mb-2">Provinsi</label>
                                        <select class="form-control" name="provinsi" id="form_prov">
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
                            </div>
                            <div class="col"></div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="mb-2">Kabupaten</label>
                                        <select class="form-control" name="kabupaten" id="form_kab">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col"></div> -->
                            <div class="col-lg-2 text-center pt-3">
                                <button class="btn btn-light btn-outline-secondary col-lg-10 shadow" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <!-- END SECTION Filter -->
            <!-- Main -->
            <div class="container py-4 mt-3">
                <h2>Data Kos-kos yang ada <?php $kabupaten ? print "di " . $kabupaten : "" ?></h2>
                <div class="row">
                    <?php foreach ($data_koses as $data_kos) : ?>
                        <div class="container px-3 pt-3 mb-3 rounded" style="background-color: rgba(240, 235, 235, .5); ">
                            <div class="card bg-transparent border border-0 mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/assets/images/<?= $data_kos['thumbnail']; ?>" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body mx-4">
                                            <h5 class="card-title"><?= $data_kos['nama']; ?></h5>
                                            <h5 class="card-title mb-2">Rp.<?= $data_kos['harga']; ?> per bulan</h5>
                                            <?php if ($data_kos['tipe'] == 'Kos Putra') : ?>
                                                <span class="badge text-bg-primary">Kos Putra</span>
                                            <?php elseif ($data_kos['tipe'] == 'Kos Putri') : ?>
                                                <span class="badge text-bg-warning">Kos Putri</span>
                                            <?php elseif ($data_kos['tipe'] == 'Kos Campur') : ?>
                                                <span class="badge text-bg-danger">Kos Campuran</span>
                                            <?php elseif ($data_kos['tipe'] == 'Kos Pasutri') : ?>
                                                <span class="badge text-bg-success">Kos Pasutri</span>
                                            <?php elseif ($data_kos['tipe'] == 'Kontrakan') : ?>
                                                <span class="badge text-bg-secondary">Kontrakan</span>
                                            <?php endif; ?>
                                            <p class="card-text mt-2"><?= $data_kos['alamat']; ?>, <?= $data_kos['kabupaten']; ?>, <?= $data_kos['provinsi']; ?></p>
                                            <p class="card-text"><?= $data_kos['deskripsi']; ?></p>
                                            <a href="/kos/<?= $data_kos['id']; ?>"><button type="button" class="btn btn-dark">Lihat Selengkapnya</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($kabupaten) : ?>
                    <a href="/kos">Kembali ke daftar semua kos</a>
                <?php endif; ?>
            </div>
            <!-- END Main -->
        </div>
        <div class="vr"></div>
    </div>
    <hr class="m-0">
    <!-- Pagination -->
    <div class="container-fluid py-2" style='Text-align:left;'>
        <?= $pager->links('kos', 'saharaku_pager') ?>
    </div>
    <!-- END Pagination -->
</div>
<?= $this->endSection() ?>