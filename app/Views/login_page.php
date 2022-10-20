<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <a href="/" class="h2 text-gray-900 mb-2">SE - FT</a>
                    <h2 class="h4 text-gray-900 mb-4">Student Employee Fakultas Teknik</h2>
                    <hr>
                  </div>
                  <form class="user" action="<?php echo '/login' ?>" method="post">
                    <div class="form-group text-center">
                      <label for="inputUsername">Username</label>
                      <input type="text" name="username" class="form-control form-control-user" id="inputUsername" aria-describedby="emailHelp" placeholder="Masukkan username anda...">
                    </div>
                    <div class="form-group text-center">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password" class="form-control form-control-user" id="inputPassword" placeholder="Masukkan password anda...">
                    </div>
                    <div class="text-center" style="color:red">
                      <?php
                      if (isset($eror)) {
                        echo $eror;
                      } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-4"> Login
                    </button>


                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



</body>


<?= $this->endSection(); ?>