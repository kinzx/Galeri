<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Glaria</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- <link href="<?= base_url('css/back.css') ?>" rel="stylesheet"> -->
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="/css/img.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font.css">
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
                        <a class="nav-link " href=" <?= base_url('/uploadForm') ?> ">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/kelolafoto') ?>">Kelola foto</a>
                    </li>
                </ul>

                <a href="/profile">
                    <?php if ($userData['avatar']) : ?>
                        <img src=" <?= base_url('/uploads/' . $userData['avatar']) ?>" alt="Avatar" class="rounded-circle  " width="45px" height="45px">
                    <?php else : ?>
                        <!-- Jika avatar tidak tersedia, tampilkan avatar default -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" "
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            stroke-width=" 1.5" width="45" height="45" stroke="currentColor" style="color: black;" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>


    <div class="d1">
        <div class="container">
            <?php
            usort($gambarDariDatabase, function ($a, $b) {
                return $b['idfoto'] - $a['idfoto'];
            });
            ?>
            <?php foreach ($gambarDariDatabase as $gambar) : ?>
                <a class="row" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $gambar['idfoto'] ?>">
                    <?php $gambarPath = base_url('uploads/' . $gambar['lokasifoto']); ?>
                    <img class="mb-3" style="border-radius: 50px;" src="<?= $gambarPath ?>" alt="">

                </a>


            <?php endforeach; ?>
        </div>

        <?php foreach ($gambarDariDatabase as $gambar) : ?>
            <!-- modal gambar -->
            <div class="modal fade" id="exampleModal<?= $gambar['idfoto'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog  modal-dialog-centered modal-lg">
                    <div class="modal-content border border-5 border-dark" style="border-radius: 25px;">
                        <div class="modal-header d-flex align-items-start border-1">
                            <h4>
                                <?= $gambar['judul'] ?>
                            </h4>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $gambarPath = base_url('uploads/' . $gambar['lokasifoto']);
                                    ?>
                                    <img class="img-fluid rounded mb-3" st src="<?= $gambarPath ?>" alt="">
                                </div>
                                <div class="col-md-6  ">
                                    <div class="row ">

                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="p-2 bd-highlight">
                                                <div class="p-2 bd-highlight d-flex align-items-center">
                                                    <?php if ($gambar['avatar']) : ?>
                                                        <img src=" <?= base_url('/uploads/' . $gambar['avatar']) ?>" alt="Avatar" class="rounded-circle  " width="45px" height="45px">
                                                    <?php else : ?>
                                                        <!-- Jika avatar tidak tersedia, tampilkan avatar default -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" " 1.5" width="45" height="45" stroke="currentColor" style="color: black;" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <a href="<?= base_url('like/' . $gambar['idfoto']) ?>" class="btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="40" height="40" stroke="<?= $isLikedArray[$gambar['idfoto']] ? 'red' : 'currentColor' ?>" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ms-auto p-2 bd-highlight"><button class="btn btn-outline-dark" style="height: 50px; border-radius: 50px;" data-bs-target="#exampleModalToggle2<?= $gambar['idfoto'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Simpan</button></div>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-between">
                                        <div class="card border-0" style="width: 23rem;">
                                            <ul class="list-group list-group-flush">
                                                <p style="max-height: 77px; overflow-y: auto;">
                                                    <?= $gambar['deskripsi'] ?>
                                                </p>
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Komentar</h6>
                                    <div id="komentarContainer" style="max-height: 500px; overflow-y: auto;">
                                        <?php foreach ($komentar as $komen) : ?>
                                            <?php if (isset($komen['avatar']) && $komen['fotoid'] == $gambar['idfoto']) : ?>
                                                <div class="komentar-item p-3 mb-1 rounded-lg shadow-sm">
                                                    <div class="d-flex align-items-center">
                                                        <?php if ($komen['avatar']) : ?>
                                                            <img src="<?= base_url('/uploads/' . $komen['avatar']) ?>" alt="Avatar" class="rounded-circle me-3" width="45px" height="45px">
                                                        <?php else : ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="45" height="45" stroke="currentColor" style="color: black;" class="me-3">
                                                            </svg>
                                                        <?php endif; ?>
                                                        <div>
                                                            <strong>
                                                                <?= $komen['username']; ?>
                                                            </strong>
                                                            <div>
                                                                <?= $komen['deskripsi']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="Komen">
                                    <form action=" /home/<?= $gambar['idfoto'] ?>" method="post">
                                        <div class="input-group mb-3 d-flex align-items-center ">
                                            <input type="text" class="form-control " style="border-radius: 50px;" name="deskripsi" placeholder="Tambahkan komentar..." aria-label="Tambahkan komentar..." aria-describedby="basic-addon2">
                                            <!-- Tambahkan input hidden untuk menyimpan fotoid -->
                                            <input type="hidden" name="fotoid" value="<?= $gambar['idfoto'] ?>">
                                            <button style="border-radius: 50px;" type="submit" class="input-group-text" id="basic-addon2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="10" height="10" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2<?= $gambar['idfoto'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2"> Simpan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('simpan-foto') ?>" method="post">
                                <input type="hidden" name="idfoto" value="<?= $gambar['idfoto'] ?>">
                                <div class="mb-3">
                                    <label for="albumSelect<?= $gambar['idfoto'] ?>" class="form-label">Pilih Album:</label>
                                    <select class="form-select" id="albumSelect<?= $gambar['idfoto'] ?>" name="albumid">
                                        <?php foreach ($userAlbums as $album) : ?>
                                            <option value="<?= $album['albumid'] ?>">
                                                <?= $album['namaalbum'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Masonry.js CDN -->
    <script>
        // Fungsi untuk menambahkan komentar baru
        function tambahKomentarBaru(komentarHTML) {
            var komentarContainer = document.getElementById("komentarContainer");
            komentarContainer.innerHTML += komentarHTML;
            // Gulir ke bawah untuk menampilkan komentar baru
            window.scrollTo(0, document.body.scrollHeight);
        }

        // Contoh penggunaan: tambahkan komentar baru dari server
        // var komentarBaru = "<div class='komentar-item'>...</div>";
        // tambahKomentarBaru(komentarBaru);
    </script>
    <script src="<?= base_url('bootstrap-5.0.2/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/tiny-slider.js') ?>"></script>
    <script src="<?= base_url('bootstrap-5.0.2/js/custom.js') ?>"></script>

</body>

</html>