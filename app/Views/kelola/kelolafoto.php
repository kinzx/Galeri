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
                <a href="/profile"><img src="<?= base_url('img/seele.jpeg') ?>" class="rounded-circle" width="45"
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
                                                <div class="card" style="width: 18rem;">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><input type="text" name="judul" value="<?= $gambar['judul'] ?>"></li>
                                                    <li class="list-group-item"><input type="text" name="deskripsi" value="<?= $gambar['deskripsi'] ?>"></li>
                                                    <li class="list-group-item"><button type="submit">Update Photo</button></li>
                                                </ul>
                                            </div>
                                                <input type="hidden" name="action" value="edit">
                                                <h4>
                                                    <?= $gambar['idfoto'] ?>
                                                </h4>
                                                
                                                

                                                <!-- Tambahkan input file untuk gambar -->
                                                
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
            <?php endforeach; ?>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <img class="img-fluid rounded mb-3"
                                    src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('/img/seele.jpeg') ?>" alt="Deskripsi gambar"
                                                width="40" height="40" class="me-3  rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-5 h-5 me-3" width="35" height="35">
                                                <path
                                                    d="M13 4.5a2.5 2.5 0 1 1 .702 1.737L6.97 9.604a2.518 2.518 0 0 1 0 .792l6.733 3.367a2.5 2.5 0 1 1-.671 1.341l-6.733-3.367a2.5 2.5 0 1 1 0-3.475l6.733-3.366A2.52 2.52 0 0 1 13 4.5Z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" width="40" height="40" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>

                                        </div>
                                        <button type="button" class="btn btn-outline"
                                            style="border-radius: 50px;">Simpan</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                            libero et
                                            velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad
                                            litora
                                            torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna
                                            at
                                            turpis condimentum lobortis. Ut commodo efficitur neque. Ut diam quam,
                                            semper
                                            iaculis condimentum ac, vestibulum eu nisl.</p>
                                        <h6>Komentar</h6>
                                        <hr>

                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Recipient's username"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" width="10" height="10"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer>

            </footer>

            <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
            <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
            <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>

</html>