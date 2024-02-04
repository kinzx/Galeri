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
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" style="border-radius: 50px"
                                placeholder="Search" aria-label="Search" />
                        </form>
                    </li>
                </ul>
                <a href="/profile"><img src="<?= base_url('img/seele.jpeg') ?>" class="rounded-circle" width="45"
                        height="45" /></a>
                <a class="nav-link" href="#">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="" style="text-align: center;">
            <img src="<?= base_url('img/seele.jpeg') ?>" alt="Profile Image" width="90px" height="90px"
                class="rounded-circle">
            <h4>Kinar Aurasae</h4>
            <a href="<?= base_url('/kelolaprofile')?>">
                <button class="btn btn-dark mb-2" style="border-radius: 50px;">Kelola Akun</button>
            </a>
        </div>
    </div>

    <div class="container">

        <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Album</h1>


        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-start">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid rounded " src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid rounded " src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
                </a>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('') ?>" alt="">
                </div>
                <div class="modal-footer">

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