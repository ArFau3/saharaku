<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mx-lg-5">
    <div class="row my-5">
        <!-- SECTION Kanan kecil -->
        <div class="col-lg-3">
            <div class="container-fluid" style="background-color: rgba(240, 235, 235, .5);">
                <h5 class="fw-bold pt-3"><?= $profil->username ?></h5>
                <img src="assets/images/profil-default.jpg" class="img-thumbnail w-lg-75" alt="...">
                <br>
                <div class="container d-flex  mt-3" style="justify-content: space-between;">
                    <p class="fw-bold">Username : </p>
                    <p><?= $profil->username ?></p>
                </div>
                <div class="container d-flex mb-2" style="justify-content: space-between;">
                    <p class="fw-bold">Jenis Akun : </p>
                    <p>Pemilik Kos</p>
                </div>
            </div>
        </div>
        <!-- END SECTION Kanan kecil -->
        <!-- SECTION Utama Profil-->
        <div class="col-lg-9">
            <div class="container" style="background-color: rgba(240, 235, 235, .5);">
                <h3 class="fw-bold pt-3">Profil Saya</h3>
                <!-- Menu Navigasi -->
                <!-- <div class="row my-3">
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
                </div> -->
                <!-- END Menu Navigasi -->
                <hr>
                <!-- Menu Pengaturan Akun -->
                <!-- <div class="container pb-3 border" style="background-color: white;">
                    <h4 class="mt-3">Pengaturan Akun</h4>
                    <br>
                    <div class="container mb-3">
                        <h5>Daftarkan Email Baru</h5>
                        <div class="input-group mb-3 px-4">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <button type="button" class="btn btn-outline-primary mx-4">Daftarkan Email</button>
                    </div> -->
                <!-- <div class="container py-3">
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
                    </div> -->


            </div>
            <!-- END Menu Pengaturan Akun -->
            <!-- Menu Pengaturan Kontak -->
            <!-- <div class="container pb-3 my-3 border" style="background-color: white;">
                    <h4 class="mt-3">Informasi Kontak</h4>
                    <br>
                    <div class="input-group mb-3 px-4">
                        <span class="input-group-text fw-bold" id="basic-addon1">Nama Lengkap</span>
                        <input type="text" class="form-control" placeholder="Masukkan nama depan Anda" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 px-4">
                        <span class="input-group-text fw-bold" id="basic-addon1">Nomor WA</span>
                        <input type="text" class="form-control" placeholder="Masukkan nomor whatsapp Anda" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-outline-primary mx-4">Ganti Informasi Kontak Anda</button>
                </div> -->
            <!-- END Menu Pengaturan Kontak -->
            <!-- Menu Kelola Kos -->
            <div class="container pb-3 my-3 border" id="pesanBerhasil" style="background-color: white;">
                <h4 class="mt-3">Kelola Kos</h4>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-info" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <?php foreach ($my_kos as $data_kos) : ?>
                    <div class="container px-3 pt-3 mb-3 rounded" style="background-color: rgba(240, 235, 235, .5); ">
                        <div class="card bg-transparent border border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/assets/images/<?= $data_kos['thumbnail']; ?>" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body mx-4">
                                        <h5 class="card-title"><?= $data_kos['nama']; ?></h5>
                                        <h5 class="card-title">Rp.<?= $data_kos['harga']; ?> per bulan</h5>
                                        <p class="card-text"><?= $data_kos['alamat']; ?>, <?= $data_kos['kabupaten']; ?>, <?= $data_kos['provinsi']; ?></p>
                                        <p class="card-title"><?= $data_kos['deskripsi']; ?></p>
                                        <div class="row text-center mb-3">
                                            <div class="col mb-3"><a href="/editKos/<?= $data_kos['id']; ?>"><button type="button" class="btn btn-outline-success">Edit Kos</button></a></div>
                                            <div class="col">
                                                <form class="" action="/kos/<?= $data_kos['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-outline-danger float-lg-end mx-lg-0 mx-5" onclick="return confirm('Apakah Anda yakin ingin Menghapus data kos <?= $data_kos['nama']; ?>')">Hapus Kos</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a href="/tambahKos"><button type="button" class="btn btn-outline-primary mx-4">Tambah Kos</button></a>
            </div>
            <!-- END Menu Kelola Kos -->
        </div>
    </div>
</div>
<!-- END SECTION Utama Profil-->
</div>
<?= $this->endSection() ?>