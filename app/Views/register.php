<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/tes.css') ?>">
    <title>Document</title>
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

                                <div class="form-outline form-black mb-4">
                                    <label class="form-label" for="typeUsername">Username</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" style="border-radius: 5rem;"/>
                                </div>

                                <div class="form-outline form-black mb-4">
                                    <label class="form-label" for="typeEmailX">Email</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" style="border-radius: 5rem;"/>
                                </div>

                                <div class="form-outline form-black mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" style="border-radius: 5rem;"/>
                                </div>

                                <div class="form-outline form-black mb-4">
                                    <label class="form-label" for="typePasswordX">Repeat your password</label>
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" style="border-radius: 5rem;"/>
                                </div>

                                <button class="btn btn-outline-dark btn-lg px-5" type="submit" style="border-radius: 5rem;">Register</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                                <div>
                                    <p class="mb-0">already have an account? <a href="<?= base_url('/login') ?>" class="text-black-50 fw-bold">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>