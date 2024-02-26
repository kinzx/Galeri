<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Glaria</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="<?= base_url('css/layout.css') ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="/css/font.css">
    <style>

    </style>
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
                        <a class="nav-link" href="<?= base_url('/uploadForm') ?>">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/kelolafoto') ?>">Kelola foto</a>
                    </li>
                </ul>
                <a style="border-radius: 100px;" onclick="return confirm('Apakah Anda yakin ingin logout?')" class="btn btn-danger " href="<?= base_url('/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="" style="text-align: center;">
            <a href="/profile">
                <?php if ($userData['avatar']) : ?>
                    <img src="<?= base_url('/uploads/' . $userData['avatar']) ?>" alt="Avatar" class="rounded-circle  " width="100px" height="100px">
                <?php else : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="100px" height="100px" stroke="currentColor" style="color: black;" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                <?php endif; ?>
            </a>
            <h4>
                <?= $userData['username'] ?>
            </h4>
            <a href="<?= base_url('/kelolaprofile') ?>">
                <button class="btn btn-dark mb-2" style="border-radius: 50px;">Kelola Akun</button>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="fw-light text-center text-lg-start mt-4 mb-0 ">Album</h1>
            <div class="d-flex align-items-end">
                <a class="btn btn-outline-dark d-flex align-items-center" style="border-radius: 50px;" data-bs-toggle="modal" href="#exampleModalToggle" role="button" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20px" height="20px" class="w-5 h-5">
                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    Album
                </a>
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="/album/create" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama album</label>
                                        <input type="text" class="form-control" name="namaalbum" id="namaalbum" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                                    </div>
                                    <button type="submit" style="border-radius: 50px;" class="btn btn-success">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-2 mb-5">
        <?php if (session()->has('success') || session()->has('error')) : ?>
            <div class="alert alert-<?php echo session()->has('success') ? 'success' : 'danger'; ?>" role="alert">
                <?= session()->has('success') ? session('success') : session('error'); ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="container">
        <div class="row">
            <?php if (!empty($userAlbums)) : ?>
                <?php foreach ($userAlbums as $album) : ?>
                    <div class="col-sm-4 mb-4">
                        <div class="card mx-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $album['namaalbum'] ?>
                                </h5>
                                <p class="card-text">
                                    <?= $album['deskripsi'] ?>
                                </p>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('album?id=' . $album['albumid']) ?>" style="border-radius: 50px;" class="btn btn-primary">Open</a>
                                    <form action="<?= base_url('hapus_album/' . $album['albumid']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this album?');">
                                        <button type="submit" style="border-radius: 50px;" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Belum ada album yang dibuat.</p>
            <?php endif; ?>
        </div>
    </div>



    </div>
    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>

</html>