<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="text-center">
    <h3 class="mt-4 mb-2">Form Tambah Kos</h3>
</div>
<div class="container-fluid mx-lg-5">
    <!-- Nama Kos -->
    <div class="row">
        <div class="col">
            <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                <div class="row g-3 align-items-center pt-2">
                    <div class="col"></div>
                    <div class="col-2">
                        <label for="inputPassword6" class="col-form-label">Nama Kos :</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
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
                        <label for="inputPassword6" class="col-form-label d-flex" style="justify-content: space-between;">Harga per bulan : <h5>Rp.</h5></label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deskripsi Kos -->
    <div class="row">
        <div class="col">
            <div class="container my-2" style="background-color: rgba(240, 235, 235, .5);">
                <div class="row g-3 align-items-center">
                    <div class="col"></div>
                    <div class="col-2">
                        <label for="inputPassword6" class="col-form-label">Deskripsi Kos :</label>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                        <label for="inputPassword6" class="col-form-label">Jenis Kos :</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Kos Putra</option>
                            <option value="2">Kos Putri</option>
                            <option value="3">Kos Campuran</option>
                            <option value="3">Kos Pasutri</option>
                            <option value="3">Kontrakan</option>
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
                        <label for="inputPassword6" class="col-form-label">Alamat Kos :</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
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
                        <label for="inputPassword6" class="col-form-label">Kamar Mandi Dalam :</label>
                    </div>
                    <div class="col-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-2">
                        <label for="inputPassword6" class="col-form-label">AC :</label>
                    </div>
                    <div class="col-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-2">
                        <label for="inputPassword6" class="col-form-label">Free wifi :</label>
                    </div>
                    <div class="col-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
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
                        <label for="inputPassword6" class="col-form-label">Tambahkan Foto :</label>
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
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
                    <div class="col"><button type="button" class="btn btn-light border">Tambah Kos</button></div>
                </div>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection() ?>