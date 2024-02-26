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
    <link rel="stylesheet" href="/css/font.css">
    <link href="/css/img.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <img src="<?= base_url('/img/Icon1.png') ?>" alt="Deskripsi gambar" width="45" height="45" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a href="/profile">
                    <?php if ($userData['avatar']) : ?>
                        <img src=" <?= base_url('/uploads/' . $userData['avatar']) ?>" alt="Avatar" class="rounded-circle  " width="45px" height="45px">
                    <?php else : ?>
                        <!-- Jika avatar tidak tersedia, tampilkan avatar default -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" "
                                                                                                                                                    stroke-width=" 1.5" width="45" height="45" stroke="currentColor" style="color: black;" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>
    <div class="container">

        <?php foreach ($gambarAlbum as $albumitem) :
            foreach ($gambarDariDatabase as $gambar) :
                if ($gambar['idfoto'] == $albumitem['idfoto']) : ?>
                    <?php
                    $gambarPath = base_url('uploads/' . $gambar['lokasifoto'] ?? 'default.jpg');
                    ?>
                    <a class="row" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $gambar['idfoto'] ?>">
                        <img class="mb-3" style="border-radius: 50px;" src="<?= $gambarPath ?>" alt="">
                    </a>
        <?php endif;
            endforeach;
        endforeach; ?>
    </div>
    <?php foreach ($gambarAlbum as $albumitem) :
        foreach ($gambarDariDatabase as $gambar) :
            if ($gambar['idfoto'] == $albumitem['idfoto']) : ?>
                <div class="modal fade" id="exampleModal<?= $gambar['idfoto'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                        <div class="modal-content border border-5 border-dark" style="border-radius: 25px;">
                            <div class="modal-header d-flex align-items-start border-1">
                                <h4>
                                    <?= $gambar['judul'] ?>
                                </h4>
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="row">
                                    <!-- <div class="col-md-6"> -->
                                    <?php
                                    $gambarPath = base_url('uploads/' . $gambar['lokasifoto']);
                                    ?>
                                    <img class="img-fluid rounded mb-3" st src="<?= $gambarPath ?>" alt="">
                                    <form action="<?= base_url('hapus_foto/' . $albumitem['albumfotoid']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php endif;
        endforeach;
    endforeach; ?>



    <!-- <?php if (session()->has('success') || session()->has('error')) : ?>
        <div class="alert alert-<?php echo session()->has('success') ? 'success' : 'danger'; ?>" role="alert">
            <?= session()->has('success') ? session('success') : session('error'); ?>
        </div>
    <?php endif; ?> -->


    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>