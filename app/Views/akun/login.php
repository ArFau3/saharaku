<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="container border border-2 rounded-5 shadow shadow-lg my-5 p-3">
                <h3 class="text-center pt-3 fw-bold">Masuk
                    <hr>
                </h3>
                <div class="container text-center mb-4">
                    <a href="/profil"><button type="submit" class="btn btn-outline-dark my-3 w-75 text-black ">Masuk melalui Google</button></a>
                    <a href="/profil"><button type="submit" class="btn btn-outline-dark my-2 w-75 text-black ">Masuk melalui Facebook</button></a>
                </div>
                <div class="row text-center px-0 mx-0">
                    <div class="col"></div>
                    <div class="col-4">
                        <hr>
                    </div>
                    <div class="col fw-bold fs-5">Atau</div>
                    <div class="col-4">
                        <hr>
                    </div>
                    <div class="col"></div>
                </div>
                <form action='' class="mx-5 mt-4">
                    <div class="mb-4 pb-1">
                        <label for="nama" class="form-label fw-bold ms-3 my-0">Nomor Handphone</label>
                        <input type="nama" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor handphone aktif">
                    </div>
                    <div class="mb-4 pb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold ms-3 my-0">Password</label>
                        <input type="password" class="py-0 form-control border-top-0 border-start-0 border-end-0" id="exampleInputPassword1" placeholder="Minimal 8 karakter">
                    </div>
                    <div class="mb-4 pb-1 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="container text-center">
                        <a href="/profil"><button type="submit" class="btn btn-outline-secondary w-50 my-5 fw-bold text-dark">Masuk</button></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<?= $this->endSection() ?>