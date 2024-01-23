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
    <link href="<?= base_url('/css/layout.css') ?>" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="<?= base_url('/img/Icon1.png') ?>" alt="Deskripsi gambar" width="45" height="45">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" <?= base_url('/tambah') ?> ">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" style="border-radius: 50px;" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                </ul>
                <a class="nav-link " href="#">Logout</a>
            </div>
        </div>
    </nav>


    <div class="d1">
        <div class="container">

            <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Thumbnail Gallery</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-start">

                <div class="col-lg-3 col-md-4 col-6">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img class="img-fluid rounded " src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded " src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid rounded" src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Img</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('/img/Icon1.png') ?>" alt="Deskripsi gambar" width="45" height="45">
                                        <h1>tes</h1>
                                    </div>
                                </div>
                                <div class="col">
                                    
                                <div class="col">
                                    <h1>tes</h1>
                                </div>
                            </div>
                            <div>
                                <!-- Konten tambahan di sini -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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