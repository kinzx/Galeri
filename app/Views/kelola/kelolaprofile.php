<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/tes.php') ?>" rel="stylesheet">
    <title>Document</title>
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
                <a href="/profile"><img src="<?= base_url('img/seele.jpeg') ?>" class="rounded-circle" width="45"
                        height="45" /></a>
                <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="<?= base_url('editProfile') ?>" method="post" enctype="multipart/form-data">
            <!-- Input untuk username -->
            <label>Username</label>
            <input type="text" name="username" value="<?= $userData['username'] ?>" required>

            <!-- Input untuk email -->
            <label>Email</label>
            <input type="email" name="email" value="<?= $userData['email'] ?>" required>

            <!-- Input untuk alamat -->
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $userData['alamat'] ?>">

            <!-- Input untuk nama lengkap -->
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap" value="<?= $userData['namalengkap'] ?>">

            <!-- Input untuk mengunggah avatar baru -->
            <label>Avatar</label>
            <input type="file" name="avatar">

            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
    </div>
    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>

</html>