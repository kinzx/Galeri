<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/font.css">

    <title>Document</title>
    <style>
        body {
            background-image: url('/img/bg-signup.jpg');
            background-size: cover;
            /* Properti ini akan memastikan gambar latar belakang menutupi seluruh area body */
            background-repeat: no-repeat;
            /* Untuk memastikan gambar tidak diulang */
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-lihgt shadow-lg p-3 mb-5 bg-body  text-black" style="border-radius: 3rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-black-50 mb-5">create an account!</p>
                                <?php
                                $session = session();
                                $error = $session->getFlashdata('error');
                                ?>

                                <?php if (!empty($error)): ?>
                                    <?php if (is_array($error)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php foreach ($error as $e): ?>
                                                <p>
                                                    <?= esc($e) ?>
                                                </p>
                                            <?php endforeach ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-danger" role="alert">
                                            <p>
                                                <?= esc($error) ?>
                                            </p>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                <form action="<?= base_url('/register') ?>" method="post">
                                    <div class="form-outline form-black mb-4">
                                        <label class="form-label">Username</label>

                                        <input type="text" name="username" class="form-control form-control-lg"
                                            style="border-radius: 5rem;" />
                                    </div>

                                    <div class="form-outline form-black mb-4">
                                        <label class="form-label ">Email</label>

                                        <input type="text" name="email" class="form-control form-control-lg"
                                            style="border-radius: 5rem;" /><label style="font-size: 12px; "><span
                                                style="font-size: 12px; color: red; ">*</span>Email tidak boleh
                                            sama</label>
                                    </div>

                                    <div class="form-outline form-black mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            style="border-radius: 5rem;" /><label style="font-size: 12px; "><span
                                                style="font-size: 12px; color: red; ">*</span>Password harus 8
                                            karakter</label>
                                        <br>
                                        <br>
                                        <label class="form-label">Repassword</label>
                                        <input id="password-field" type="password" name="confirm"
                                            class="form-control form-control-lg" style="border-radius: 5rem;" required>
                                        <span toggle="#password-field"></span>
                                    </div>

                                    <button class="btn btn-outline-dark btn-lg px-5 mb-3" name="register" type="submit"
                                        style="border-radius: 5rem;">Register</button>

                                    <div>
                                        <p class="mb-0">already have an account? <a href="<?= base_url('/login') ?>"
                                                class="text-black-50 fw-bold">Login</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>