<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= base_url('bootstrap-5.0.2/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- <link href="<?= base_url('css/back.css') ?>" rel="stylesheet"> -->
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="/css/font.css">

  <link rel="stylesheet" href="/css/font.css">

</head>
<style>
  body {
    background-image: url('/img/bg-masthead.jpg');
    background-size: cover;
    /* Properti ini akan memastikan gambar latar belakang menutupi seluruh area body */
    background-repeat: no-repeat;
    /* Untuk memastikan gambar tidak diulang */
  }
</style>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-50 text-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-light shadow-lg p-3 mb-5 bg-body text-black" style="border-radius: 3rem;">
            <div class="card-body p-5 text-center">

              <div class="mt-md-4 pb-5">
                <form action="<?= current_url('/valid_login') ?>" method="POST">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-black-50 mb-5">Please enter your email and password!</p>
                  <!-- Menampilkan pesan kesalahan -->
                  <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session('error') ?>
                    </div>
                  <?php endif; ?>
                  <div class="form-outline form-black mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input value="<?= old('email') ?>" autocomplete="off" autofocus="on" type="text" id="email" name="email" class="form-control form-control-lg" style="border-radius: 5rem;" />
                  </div>

                  <div class="form-outline form-black mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input value="<?= old('password') ?>" type="password" id="password" name="password" class="form-control form-control-lg" style="border-radius: 5rem;" />
                  </div>

                  <button class="btn btn-outline-dark btn-lg px-5 mb-3" type="submit" style="border-radius: 5rem;">Login</button>
                  <p class="mb-0">Don't have an account? <a href="/register" class="text-black-50 fw-bold">Register</a></p>
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