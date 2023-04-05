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
                    <li class="breadcrumb-item"><a href="/kos">Daftar Kos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi <?= $data_kos['nama']; ?></li>
                </ol>
            </nav>
            <!-- END Breadcrumb -->
            <div class="container-fluid">
                <div class="row">
                    <!-- SECTION Gambar -->
                    <div class="col-lg-5">
                        <div class="container-fluid mx-0 px-0 mb-5 pb-3">
                            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                <div class="carousel-indicators" style="margin-bottom: -70px;">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 100px; height:50px;">
                                        <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['thumbnail']; ?>" class="img-fluid" />
                                    </button>
                                    <?php if ($data_kos['foto1']) : ?>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" style="width: 100px; height:50px;">
                                            <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['foto1']; ?>" />
                                        </button>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto2']) : ?>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" style="width: 100px; height:50px;">
                                            <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['foto2']; ?>" class="img-fluid" />
                                        </button>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto3']) : ?>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4" style="width: 100px; height:50px;">
                                            <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['foto3']; ?>" class="img-fluid" />
                                        </button>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto4']) : ?>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5" style="width: 100px; height:50px;">
                                            <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['foto4']; ?>" class="img-fluid" />
                                        </button>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto5']) : ?>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6" style="width: 100px; height:50px;">
                                            <img class="d-block w-100 h-100 shadow-1-strong rounded" src="/assets/images/<?= $data_kos['foto5']; ?>" class="img-fluid" />
                                        </button>
                                    <?php endif ?>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="/assets/images/<?= $data_kos['thumbnail']; ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <?php if ($data_kos['foto1']) : ?>
                                        <div class="carousel-item" data-bs-interval="2000">
                                            <img src="/assets/images/<?= $data_kos['foto1']; ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto2']) : ?>
                                        <div class="carousel-item">
                                            <img src="/assets/images/<?= $data_kos['foto2']; ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto3']) : ?>
                                        <div class="carousel-item">
                                            <img src="/assets/images/<?= $data_kos['foto3']; ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto4']) : ?>
                                        <div class="carousel-item">
                                            <img src="/assets/images/<?= $data_kos['foto4']; ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endif ?>
                                    <?php if ($data_kos['foto5']) : ?>
                                        <div class="carousel-item">
                                            <img src="/assets/images/<?= $data_kos['foto5']; ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endif ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev" style="margin-left: -47px;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next" style="margin-right: -47px;">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END SECTION Gambar -->
                    <div class="col"></div>
                    <!-- SECTION Deskripsi Kanan -->
                    <div class="col-lg-6 ">
                        <h3 class="fw-bolder mt-4 mt-lg-0"><?= $data_kos['nama']; ?></h3>
                        <div class="container my-3 p-0">
                            <p class="mb-1 fw-semibold"><?= $data_kos['alamat']; ?>, <?= $data_kos['kabupaten']; ?>, <?= $data_kos['provinsi']; ?></p>
                            <p class="mb-1 fw-semibold">Nama Pemilik : <?= $data_kos['pemilik']; ?></p>
                            <a href="#Hubungi"><button class="float-end rounded btn btn-outline-info btn-sm">Hubungi Pemilik</button></a>
                            <p class="mb-1 fw-semibold">No WA : <?= $data_kos['wa']; ?></p>
                            <p class="mb-1 fw-semibold">Harga : Rp. <?= number_format((int)$data_kos['harga'], 0, ",", "."); ?> / bulan</p>
                        </div>
                        <!-- <button type="button" class="btn btn-outline-dark">Lihat Lokasi di Google Maps</button> -->
                    </div>
                    <!-- END SECTION Deskripsi Kanan -->
                </div>
                <!-- SECTION Deskripsi Bawah -->
                <div class="row py-1 mt-4">
                    <h3 class="fw-bolder">Deskripsi Kos</h3>
                    <p class="mb-0 "><?= $data_kos['deskripsi'] . " Selain itu, juga sudah dilengkapi dengan "; ?>
                        <?php ($data_kos['cermin'] ? print "Cermin, " : print "") ?>
                        <?php ($data_kos['meja'] ? print "meja, " : print "") ?>
                        <?php ($data_kos['kursi'] ? print "kursi, " : print "") ?>
                        <?php ($data_kos['bantal'] ? print "bantal, " : print "") ?>
                        <?php ($data_kos['guling'] ? print "guling, " : print "") . "sebagai bagian dari fasilitas yang disediakan pada " ?>
                        <?= "kos " . $data_kos['nama'] . " ini." ?></p>
                </div>
                <!-- END SECTION Deskripsi Bawah -->
                <!-- SECTION Fasilitas & Chat -->
                <div class="row py-3 my-4">
                    <div class="col-lg-4">
                        <h3 class="fw-bolder">Fasilitas yang Didapat</h3>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox" disabled <?php $data_kos['kamar_mandi_dalam'] ? print "checked" : "" ?> style="opacity:1;">
                                <label class="form-check-label" for="firstCheckbox" style="opacity:1;">Kamar Mandi Dalam</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox" disabled <?php $data_kos['ac'] ? print "checked" : "" ?> style="opacity:1;">
                                <label class="form-check-label" for="secondCheckbox" style="opacity:1;">Sudah disertai AC</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox" disabled <?php $data_kos['wifi'] ? print "checked" : "" ?> style="opacity:1;">
                                <label class="form-check-label" for="thirdCheckbox" style="opacity:1;">Dilengkapi Wifi</label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2" id="Hubungi"></div>
                    <div class="col-lg-6 text-center mt-4 mt-lg-0">
                        <h3 class="fw-bolder">Hubungi Pemilik</h3>
                        <form action="/hubungi" method="post">
                            <input type="hidden" id="nomor" name="nomor" value="<?= $data_kos['wa']; ?>">
                            <input type="hidden" id="tipe" name="tipe" value="<?= $data_kos['tipe']; ?>">
                            <input type="text" name="nama_penghubung" id="nama_penghubung" class="form-control" id="exampleFormControlInput1" placeholder="Nama :">
                            <!-- <input type="text" name="hp" id="hp" class="form-control" id="exampleFormControlInput1" placeholder="No. Hp :">
                            <input type="email" name="email" id="email" class="form-control" id="exampleFormControlInput1" placeholder="Email :"> -->
                            <textarea name="pesan" id="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Pesan :"></textarea>
                            <button type="submit" class="btn btn-outline-secondary mt-5 w-100">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
                <!-- END SECTION Fasilitas & Chat -->
            </div>
        </div>
        <div class="vr"></div>
    </div>
    <hr class="m-0">
</div>
<?= $this->endSection() ?>