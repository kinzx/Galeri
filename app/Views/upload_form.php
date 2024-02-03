

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/tambah.css') ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <img src="<?= base_url('/img/Icon1.png') ?>" alt="Deskripsi gambar" width="45" height="45">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?= base_url('/home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href=" <?= base_url('/tambah') ?> ">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/kelolafoto') ?>">Kelola foto</a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" style="border-radius: 50px;"
                                placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                </ul>
                <a href="/profile"><img src="<?= base_url('img/seele.jpeg') ?>" class="rounded-circle" width="45"
                        height="45"></a>
                <a class="nav-link " href="#">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Check for success message -->
<?php if (session()->has('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('success') ?>
    </div>
<?php endif; ?>

<!-- Form using Bootstrap 5 -->
<form action="<?= base_url('/uploadForm') ?>" method="post" enctype="multipart/form-data" class="mt-4">
    <div class="mb-3">
        <label for="judul" class="form-label">Title:</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Description:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= old('deskripsi') ?></textarea>
    </div>

    <div class="mb-3">
        <label for="lokasifile" class="form-label">Choose Photo:</label>
        <input type="file" class="form-control" id="lokasifile" name="lokasifile" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>

<!-- Display validation errors if any -->
<?php if (isset($validation)): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>




    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>
 
</html>