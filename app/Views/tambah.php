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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" style="border-radius: 50px;" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                </ul>
                <a href="/profile"><img src="<?= base_url('img/seele.jpeg') ?>" class="rounded-circle" width="45" height="45"></a>
                <a class="nav-link " href="#">Logout</a>
            </div>
        </div>
    </nav>

    
    <div class="container text-center ">
        <div class="row g-0 ">
            <div class="w-50 ">
                <div class="dropzone uploadfuzone fuzone">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="fu-text"> <span><i class="fa fa-picture-o"></i> Click here file to upload</span> </div>
                        </div>
                    </div>
                    <input type="file" class="input" accept="image/*">
                </div>
                <div class="status"></div>
                <div class="text-center"><span class="imgur-link"></span></div>
            </div>
            <div class="col-sm-6 col-md-4 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label d-flex justify-content-start">Judul</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label d-flex justify-content-start">Deskripsi</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-dark d-flex justify-content-start">Upload</button>
                </form>
            </div>
        </div>
    </div>





    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
</body>

</html>