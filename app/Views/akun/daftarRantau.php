<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="container border border-2 rounded-5 shadow shadow-lg my-5 p-3">
                <h3 class="text-center py-3 fw-bold">Daftar Penyedia Hunian
                    <hr>
                </h3>

                <form class="mx-5">
                    <div class="mb-4 pb-1">
                        <label for="nama" class="form-label fw-bold ms-3 my-0">Nama Lengkap</label>
                        <input type="nama" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan sesuai identitas diri anda">
                    </div>
                    <div class="mb-4 pb-1">
                        <label for="nama" class="form-label fw-bold ms-3 my-0">Nomor Handphone</label>
                        <input type="nama" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor handphone aktif">
                    </div>
                    <div class="mb-4 pb-1">
                        <label for="nama" class="form-label fw-bold ms-3 my-0">Email</label>
                        <input type="nama" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email untuk autentikasi ">
                    </div>
                    <div class="mb-4 pb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold ms-3 my-0">Password</label>
                        <input type="password" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputPassword1" placeholder="Minimal 8 karakter">
                    </div>
                    <div class="mb-4 pb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold ms-3 my-0">Ulangi Password</label>
                        <input type="password" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputPassword1" placeholder="Masukkan kembali password">
                    </div>
                    <div class="mb-4 pb-1 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary w-100 my-5">Daftar</button>
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<?= $this->endSection() ?>