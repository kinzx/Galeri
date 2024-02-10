<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Glaria</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/tes.css') ?>" rel="stylesheet">

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
                <form class="d-flex" style="flex: 1;">
                    <!-- Menggunakan flex untuk mengisi ruang tersisa -->
                    <input class="form-control me-2" type="search" style="border-radius: 50px; width: 100%;"
                        placeholder="Search" aria-label="Search" />
                </form>
                <a href="/profile"><img src="<?= base_url($userData['avatar']) ?>" class="rounded-circle" width="45"
                        height="45" /></a>
                <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>





    <div class="d1">

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif ?>
        <div class="container">
            <?php foreach ($gambarDariDatabase as $gambar): ?>
                <a class="row rounded-4" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $gambar['idfoto'] ?>">
                    <?php $gambarPath = base_url('uploads/' . $gambar['lokasifoto']); ?>
                    <img class="mb-3" src="<?= $gambarPath ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>
        <?php foreach ($gambarDariDatabase as $gambar): ?>

            <div class="modal fade" id="exampleModal<?= $gambar['idfoto'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <?php
                                    $gambarPath = base_url('uploads/' . $gambar['lokasifoto']);
                                    ?>
                                    <img class="img-fluid rounded mb-3 " st src="<?= $gambarPath ?>" alt="">
                                </div>
                                <div class="col-md-6">

                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-between">
                                            <form action="<?= base_url('edit/' . $gambar['idfoto']) ?>" method="post"
                                                enctype="multipart/form-data" class="mt-4">
                                                <div class="card border-0" style="width: 23rem;">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item border-0"><input type="text" name="judul"
                                                                value="<?= $gambar['judul'] ?>"></li>
                                                        <li class="list-group-item border-0"><input type="text"
                                                                name="deskripsi" value="<?= $gambar['deskripsi'] ?>"></li>
                                                        <li class="list-group-item border-0"><button type="submit">Update
                                                                Photo</button></li>
                                                    </ul>
                                                </div>
                                                <input type="hidden" name="action" value="edit">
                                                <h4>
                                                    <?= $gambar['idfoto'] ?>
                                                </h4>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <form action="<?= base_url('delete/' . $gambar['idfoto']) ?>" method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>


    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>

</html>