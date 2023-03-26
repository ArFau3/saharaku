<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mx-5">
    <div class="row my-5">
        <!-- SECTION Kanan kecil -->
        <div class="col-3">
            <div class="container" style="background-color: rgba(240, 235, 235, .5);">
                <h5 class="fw-bold pt-3">Arr</h5>
                <img src="images/bg.jpg" class="img-thumbnail" alt="...">
                <br>
                <div class="container d-flex  mt-3" style="justify-content: space-between;">
                    <p class="fw-bold">Username : </p>
                    <p>Arfau</p>
                </div>
                <div class="container d-flex mb-2" style="justify-content: space-between;">
                    <p class="fw-bold">Jenis Akun : </p>
                    <p>Pemilik Kos</p>
                </div>
            </div>
        </div>
        <!-- END SECTION Kanan kecil -->
        <!-- SECTION Utama Profil-->
        <div class="col-9">
            <div class="container" style="background-color: rgba(240, 235, 235, .5);">
                <h3 class="fw-bold pt-3">Profil Saya</h3>
                <!-- Menu Navigasi -->
                <div class="row my-3">
                    <div class="col-3">
                        <button type="button" class="btn btn-link">Pengaturan Akun</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-link">Informasi Kontak</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-link">Kelola Kos</button>
                    </div>
                    <div class="col-3"></div>
                </div>
                <!-- END Menu Navigasi -->
                <hr>
                <!-- Menu Pengaturan Akun -->
                <div class="container pb-3 border" style="background-color: white;">
                    <h4 class="mt-3">Pengaturan Akun</h4>
                    <br>
                    <div class="container mb-3">
                        <h5>Daftarkan Email Baru</h5>
                        <div class="input-group mb-3 px-4">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" placeholder="Email baru" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <button type="button" class="btn btn-outline-primary mx-4">Daftarkan Email</button>
                    </div>
                    <div class="container py-3">
                        <h5>Ganti Password</h5>
                        <div class="input-group mb-4 px-4">
                            <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgba(255, 255, 0, .6);">Password Lama</span>
                            <input type="text" class="form-control" placeholder="Masukkan password lama Anda" aria-label="Username" aria-describedby="basic-addon1">

                        </div>
                        <div class="input-group mb-3 px-4">
                            <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgba(0, 255, 0, .6);">Password Baru</span>
                            <input type="text" class="form-control" placeholder="Masukkan password baru Anda" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3 px-4">
                            <span class="input-group-text fw-bold" id="basic-addon1" style="background-color: rgba(0, 255, 0, .6);">Ulangi Password</span>
                            <input type="text" class="form-control" placeholder="Masukkan kembali password baru Anda" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <button type="button" class="btn btn-outline-primary mx-4">Ganti Password</button>
                    </div>


                </div>
                <!-- END Menu Pengaturan Akun -->
                <!-- Menu Pengaturan Kontak -->
                <div class="container pb-3 my-3 border" style="background-color: white;">
                    <h4 class="mt-3">Informasi Kontak</h4>
                    <br>
                    <div class="input-group mb-3 px-4">
                        <span class="input-group-text fw-bold" id="basic-addon1">Nama Depan</span>
                        <input type="text" class="form-control" placeholder="Masukkan nama depan Anda" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 px-4">
                        <span class="input-group-text fw-bold" id="basic-addon1">Nama Belakang</span>
                        <input type="text" class="form-control" placeholder="Masukkan nama belakang Anda" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 px-4">
                        <span class="input-group-text fw-bold" id="basic-addon1">Nomor WA</span>
                        <input type="text" class="form-control" placeholder="Masukkan nomor whatsapp Anda" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-outline-primary mx-4">Ganti Informasi Kontak Anda</button>
                </div>
                <!-- END Menu Pengaturan Kontak -->
                <!-- Menu Kelola Kos -->
                <div class="container pb-3 my-3 border" style="background-color: white;">
                    <h4 class="mt-3">Kelola Kos</h4>
                    <div class="container px-3 pt-3 mb-3 rounded" style="background-color: rgba(240, 235, 235, .5); ">
                        <div class="card bg-transparent border border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/pic01.jpg" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body mx-4">
                                        <h5 class="card-title">Kost Aboy</h5>
                                        <h5 class="card-title">Rp.560.000 per bulan</h5>
                                        <p class="card-text">Jalan Sepakat 2 No 25, Kecamatan Pontianak Tenggara, Kota Pontianak</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/kos/tambah"><button type="button" class="btn btn-outline-primary mx-4">Tambah Kos</button></a>
                </div>
                <!-- END Menu Kelola Kos -->
            </div>
        </div>
    </div>
    <!-- END SECTION Utama Profil-->
</div>
<?= $this->endSection() ?>