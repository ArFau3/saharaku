<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- BANNER -->
<div class="container py-4">
    <div class="row">
        <div class="col">
            <div class="card text-bg-dark" style="border-radius: 60px 10px;">
                <img src="assets/images/judul.png" height="300" class="card-img" style="border-radius: 60px 10px;" alt="...">
                <div class="card-img-overlay text-center my-lg-5 mx-3 text-black">
                    <p class="card-title fw-bold fs-3 mb-lg-4">Selamat Datang di Sahabat Rantau, Teman Anak Rantau yang Selalu Menemani </p>
                    <p class="card-text mb-lg-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus lacus eu interdum efficitur. Nulla massa turpis, consequat ac lorem eu, euismod sagittis ipsum. Suspendisse nunc dui, viverra vel lacus ac.</p>
                    <a href="/kos"><button type="button" class="btn btn-outline-dark border border-3 border-top-0 border-start-0 shadow-lg fw-semibold" style="background-color:rgba(147, 198, 231, .45);">Cari Sekarang</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END BANNER -->
<!-- SECTION keunggulan -->
<div style="background-color: rgba(174, 226, 255, .15);">
    <div class="container py-5 mt-2 text-center">
        <div class="row pb-3">
            <div class="col">
                <h4 class="py-4">Mengapa Memilih Kami ?</h4>
                <div class="row row-cols-1 row-cols-md-6 my-3 gy-4">
                    <div class="col-6 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                        <div class="card border border-1 shadow-lg" style="width: 15rem; height: 13rem;">
                            <img src="assets/images/pic04.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text fw-bold fs-6">Data dan Informasi yang Selalu Update</p>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-6 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                        <div class="card border border-1 shadow-lg" style="width: 15rem; height: 13rem;">
                            <img src="assets/images/pic01.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text fw-bold fs-6">Informasi yang Terpercaya</p>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-6 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                        <div class="card border border-1 shadow-lg" style="width: 15rem; height: 13rem;">
                            <img src="assets/images/pic03.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text fw-bold fs-6">Bantuan Perantau selama 24 Jam Penuh </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION keunggulan -->
<!-- SECTION Rekomendasi -->
<div style="background-color: rgba(254, 222, 255, .15);">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h4 class="py-4 text-center">Rekomendasi Tempat Tinggal</h4>
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/assets/images/<?= $rekomendasi_kos[0]['thumbnail']; ?>" class="img-fluid h-100" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold"><?= $rekomendasi_kos[0]['nama']; ?></h3>
                                            <p class="card-text fw-semibold fs-6"><?= $rekomendasi_kos[0]['alamat']; ?></p>
                                            <!-- FITUR KOS -->
                                            <ul>
                                                <?php if ($rekomendasi_kos[0]['kamar_mandi_dalam']) : ?>
                                                    <li>
                                                        <p>Memiliki Kamar Mandi Dalam</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[0]['ac']) : ?>
                                                    <li>
                                                        <p>Sudah Disertai AC</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[0]['wifi']) : ?>
                                                    <li>
                                                        <p>Memiliki akses Wifi</p>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                            <!-- END FITUR KOS -->
                                            <p class="card-text fw-bolder fs-5"><small>Rp. <?= $rekomendasi_kos[0]['harga']; ?> / Bulan</small></p>
                                            <button type="button" class="btn btn-dark w-lg-25 mb-3">Lihat Selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/assets/images/<?= $rekomendasi_kos[1]['thumbnail']; ?>" class="img-fluid h-100" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold"><?= $rekomendasi_kos[1]['nama']; ?></h3>
                                            <p class="card-text fw-semibold fs-6"><?= $rekomendasi_kos[1]['alamat']; ?></p>
                                            <!-- FITUR KOS -->
                                            <ul>
                                                <?php if ($rekomendasi_kos[1]['kamar_mandi_dalam']) : ?>
                                                    <li>
                                                        <p>Memiliki Kamar Mandi Dalam</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[1]['ac']) : ?>
                                                    <li>
                                                        <p>Sudah Disertai AC</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[1]['wifi']) : ?>
                                                    <li>
                                                        <p>Memiliki akses Wifi</p>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                            <!-- END FITUR KOS -->
                                            <p class="card-text fw-bolder fs-5"><small>Rp. <?= $rekomendasi_kos[1]['harga']; ?> / Bulan</small></p>
                                            <button type="button" class="btn btn-dark w-lg-25 mb-3">Lihat Selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/assets/images/<?= $rekomendasi_kos[2]['thumbnail']; ?>" class="img-fluid h-100" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold"><?= $rekomendasi_kos[2]['nama']; ?></h3>
                                            <p class="card-text fw-semibold fs-6"><?= $rekomendasi_kos[2]['alamat']; ?></p>
                                            <!-- FITUR KOS -->
                                            <ul>
                                                <?php if ($rekomendasi_kos[2]['kamar_mandi_dalam']) : ?>
                                                    <li>
                                                        <p>Memiliki Kamar Mandi Dalam</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[2]['ac']) : ?>
                                                    <li>
                                                        <p>Sudah Disertai AC</p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($rekomendasi_kos[2]['wifi']) : ?>
                                                    <li>
                                                        <p>Memiliki akses Wifi</p>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                            <!-- END FITUR KOS -->
                                            <p class="card-text fw-bolder fs-5"><small>Rp. <?= $rekomendasi_kos[2]['harga']; ?> / Bulan</small></p>
                                            <button type="button" class="btn btn-dark w-lg-25 mb-3">Lihat Selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION Rekomendasi -->
<!-- Section Jenis Tempat -->
<div class="container py-5 text-center">
    <div class="row pb-3">
        <div class="col">
            <h4 class="py-4">Tempat Tinggal Apa Saja yang Ada di SAHARA</h4>
            <div class="row row-cols-1 row-cols-md-5 my-3 gy-4">
                <div class="col-5 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                    <div class="card border border-4 border-top-0 border-start-0 shadow bg-body-tertiary p-3" style="width: 13rem; height: 15rem;">
                        <img src="assets/icons/person-simple.png" class="card-img-top object-fit-scale h-75" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-6">Kost Putra</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-5 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                    <div class="card border border-4 border-top-0 border-start-0 shadow bg-body-tertiary p-3" style="width: 13rem; height: 15rem;">
                        <img src="assets/icons/woman-head.png" class="card-img-top object-fit-scale h-75" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-6">Kost Putri</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-5 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                    <div class="card border border-4 border-top-0 border-start-0 shadow bg-body-tertiary p-3" style="width: 13rem; height: 15rem;">
                        <img src="assets/icons/restroom-simple.png" class="card-img-top object-fit-scale h-75" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-6">Kost Campuran</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-5 gy-4 pt-md-5 mt-md-5 ">
                <div class="col-md-2"></div>
                <div class="col-5 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                    <div class="card border border-4 border-top-0 border-start-0 shadow bg-body-tertiary p-3" style="width: 13rem; height: 15rem;">
                        <img src="assets/icons/people.png" class="card-img-top object-fit-scale h-75" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-6">Kost Pasutri</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-5 col-md-2 ps-md-0 ms-md-0" style="margin: auto;">
                    <div class="card border border-4 border-top-0 border-start-0 shadow bg-body-tertiary p-3" style="width: 13rem; height: 15rem;">
                        <img src="assets/icons/house-building.png" class="card-img-top object-fit-scale h-75" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-6">Kontrakan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
<!-- END Section Jenis Tempat -->
<!-- SECTION CtA -->
<div style="background-color: rgba(174, 226, 255, .15);">
    <div class="container py-5 mt-2">
        <div class="row pb-3">
            <div class="col-md-6 col-5">
                <img src="assets/images/slide01.jpg" class="img-fluid" alt="...">
            </div>
            <div class="col"></div>
            <div class="col-md-4 col-6">
                <h4>Tunggu apa lagi ayo cari tempat tinggal kamu sekarang</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto asperiores mollitia odit quam qui, neque cumque cum eum molestiae aspernatur. Sed facilis rerum exercitationem, vel laboriosam dicta! At, provident pariatur.</p>
                <a href="/kos"><button type="button" class="btn btn-light border border-2 border-top-0 border-start-0 shadow">Cari Sekarang</button></a>
            </div>
            <div class="col-lg"></div>
        </div>
    </div>
</div>
<!-- END SECTION CtA -->
<?= $this->endSection() ?>