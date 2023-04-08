<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="assets/css/mains.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
</head>

<body>
    <nav class="navbar sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler border-0 ps-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon float-start"></span>
                <p class="float-start align-middle m-1 text-dark fw-semibold">Sahabat Rantau</p>
            </button>
            <div class="hstack gap-3">
                <!-- <li class="nav-item dropdown" style="list-style: none;">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Daftar
                    </a>
                    <ul class="dropdown-menu text-center p-0 border border-0" style="left: -2.5rem; background-color: rgba(174, 226, 255, .65); ">
                        <li>
                            <div class="container bg-body-tertiary" style="height:.95em;">
                                <br>
                            </div>
                        </li>
                        <li><a class="dropdown-item fw-bold" href="/register/pemilik">Untuk Pemilik Tempat</a></li>

                        <li><a class="dropdown-item fw-bold" href="/register/rantau">Untuk Perantau</a></li>
                    </ul>
                </li> -->
                <div class="vr" style="width: 3px;"></div>
                <?php if (logged_in() == false) : ?>
                    <a href="/login" class="fw-bold" style="text-decoration: none; color:black;"><i class="fa-solid fa-user"></i> Hi, User</a>
                <?php else : ?>
                    <?php $user = user(); ?>
                    <a href="/profil" class="fw-bold" style="text-decoration: none; color:black;"><i class="fa-solid fa-user"></i> Hi, <?= $user->username; ?></a>
                <?php endif; ?>
            </div>

            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sahabat Rantauku</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jenis Tempat Tinggal
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Kos Putra</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Kos Putri</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Kos Campuran</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Kos Pasutri</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Kontrakan</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/kos">Daftar Kos</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Pusat Bantuan</a>
                        </li> -->
                    </ul>
                    <?php if (logged_in()) : ?>
                        <a href="/logout"><button class="btn btn-outline-success" type="submit">Logout</button></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <hr class="m-0">

    <?= $this->renderSection('content') ?>

    <div style="background-color: #000A50;">
        <div class="container text-light pb-4 pt-4 mt-1">
            <div class="row">
                <div class="col-3">
                    <h5>Sahabat Rantau</h5>
                    <p class="fs-6 fw-light">Teman Anak Rantau yang Selalu Menemani</p>
                </div>
                <div class="col"></div>
                <div class="col-4 text-center">
                    <h5>Sosial Media Kami</h5>
                    <div class="row">
                        <div class="col">
                            <a href="https://www.instagram.com/sahabatrantauku/" class="link-light text-decoration-none">
                                <p class="mb-3 fs-6 fw-light"><i class="fa-brands fa-instagram fa-xl mx-2"></i> Instagram</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="https://www.facebook.com/profile.php?id=100090784775873&mibextid=LQQJ4d" class="link-light text-decoration-none">
                                <p class="mb-3 fw-light"><i class="fa-brands fa-facebook fa-xl mx-2"></i> Facebook</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" class="link-light text-decoration-none">
                                <p class="mb-2 fw-light"><i class="fa-brands fa-twitter fa-xl mx-2"></i> Twitter</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-3 text-center">
                    <h5>Kontak Kami</h5>
                    <div class="row">
                        <div class="col">
                            <a href="" class="link-light text-decoration-none">
                                <p class="mb-1 fw-light">Email : Sahara51@gmail.com</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" class="link-light text-decoration-none">
                                <p class="mb-1 fw-light">WA : 086485912894</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="fw-semibold text-light py-3 text-center">Copyright @2023 by SAHARA</h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        function previewImgProfil() {
            const foto = document.querySelector('#profil');
            const img_preview = document.querySelector('.img-preview-profil');

            const file_profil = new FileReader();
            file_profil.readAsDataURL(profil.files[0]);

            file_profil.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg() {
            const thumbnail = document.querySelector('#thumbnail');
            const img_preview = document.querySelector('.img-preview');

            const file_thumbnail = new FileReader();
            file_thumbnail.readAsDataURL(thumbnail.files[0]);

            file_thumbnail.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg1() {
            const foto1 = document.querySelector('#foto1');
            const img_preview = document.querySelector('.img-preview1');

            const file_foto1 = new FileReader();
            file_foto1.readAsDataURL(foto1.files[0]);

            file_foto1.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg2() {
            const foto2 = document.querySelector('#foto2');
            const img_preview = document.querySelector('.img-preview2');

            const file_foto2 = new FileReader();
            file_foto2.readAsDataURL(foto2.files[0]);

            file_foto2.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg3() {
            const foto3 = document.querySelector('#foto3');
            const img_preview = document.querySelector('.img-preview3');

            const file_foto3 = new FileReader();
            file_foto3.readAsDataURL(foto3.files[0]);

            file_foto3.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg4() {
            const foto4 = document.querySelector('#foto4');
            const img_preview = document.querySelector('.img-preview4');

            const file_foto4 = new FileReader();
            file_foto4.readAsDataURL(foto4.files[0]);

            file_foto4.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function previewImg5() {
            const foto5 = document.querySelector('#foto5');
            const img_preview = document.querySelector('.img-preview5');

            const file_foto5 = new FileReader();
            file_foto5.readAsDataURL(foto5.files[0]);

            file_foto5.onload = function(e) {
                img_preview.src = e.target.result;
            }
        }
    </script>
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
</body>

</html>