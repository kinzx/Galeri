<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/tambah.css') ?>">
    <!-- <link href="<?= base_url('css/back.css') ?>" rel="stylesheet"> -->

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <img src="<?= base_url('/img/Icon1.png') ?>" alt="Deskripsi gambar" width="45" height="45" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('/home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href=" <?= base_url('/uploadForm') ?> ">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/kelolafoto') ?>">Kelola foto</a>
                    </li>
                </ul>
                <form class="d-flex mb-1" style="flex: 1;">
                    <!-- Menggunakan flex untuk mengisi ruang tersisa -->
                    <input class="form-control me-2" type="search" style="border-radius: 50px; width: 100%;"
                        placeholder="Search" aria-label="Search" />
                </form>
                <a href="/profile">
                    <?php if ($userData['avatar']): ?>
                        <img src=" <?= base_url($userData['avatar']) ?>" alt="Avatar" class="rounded-circle  " width="45px"
                            height="45px">
                    <?php else: ?>
                        <!-- Jika avatar tidak tersedia, tampilkan avatar default -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" "
                                                        stroke-width=" 1.5" width="45" height="45" stroke="currentColor"
                            style="color: black;" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>

    <?php if (session()->has('success') || session()->has('error')): ?>
        <div class="alert alert-<?php echo session()->has('success') ? 'success' : 'danger'; ?>" role="alert">
            <?= session()->has('success') ? session('success') : session('error'); ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('/uploadForm') ?>" method="post" enctype="multipart/form-data" class="mt-4 ">
        <section class="intro">
            <div class="mask d-flex align-items-center h-100 gradient-custom">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10">
                            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                                <div class="card-body  ">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-6 col-xl-7">
                                            <div class="text-center pt-md-5 pb-5 my-md-5" style="padding-right: 24px">
                                                <input type="file" class="form-control" id="image" name="lokasifile"
                                                    accept="image/*" required />
                                                <div class="img-preview"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 text-center">

                                            <div class="form-outline mb-3">
                                                <label for="judul" class="form-label">Title:</label>
                                                <input type="text" class="form-control" id="judul" name="judul"
                                                    value="<?= old('judul') ?>" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label for="deskripsi" class="form-label">Description:</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                    <?= old('deskripsi') ?> />
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    Upload
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        function previewIMG(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img-preview').html('<img style="width: 100%" src="' + e.target.result + '" />');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#image').change(function () {
            previewIMG(this);
        });
    </script>
</body>

</html>