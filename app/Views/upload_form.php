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

    <nav class=" navbar navbar-expand-lg navbar-light bg-light mb-5">
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
                <a href="/profile"><img src="<?= base_url($userData['avatar']) ?>" class="rounded-circle" width="45"
                        height="45" /></a>
                <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>


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