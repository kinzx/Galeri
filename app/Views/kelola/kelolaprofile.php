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
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <label>Avatar</label>
                        <div class="text-center pt-md-5 pb-5 my-md-5" style="padding-right: 24px">
                            <input type="file" class="form-control" id="image" name="avatar" accept="image/*" />
                            <div class="img-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Username</label>
                                <input class="form-control" type="text" name="username"
                                    value="<?= $userData['username'] ?>">
                            </div>

                            <div class="col-md-12"><label class="labels">Email</label>
                                <input class="form-control" type="email" name="email" value="<?= $userData['email'] ?>">
                            </div>

                            <div class="col-md-12"><label class="labels">Nama lengkap</label>
                                <input class="form-control" type="text" name="namalengkap"
                                    value="<?= $userData['namalengkap'] ?>">
                            </div>

                            <div class="col-md-12"><label class="labels">Alamat</label>
                                <input class="form-control" type="text" name="alamat"
                                    value="<?= $userData['alamat'] ?>">
                            </div>

                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save
                                    Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>
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