<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">

  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/Afavicon.jpg'); ?>" />
</head>

<!-- body start-->

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- Logo  -->
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>assets/images/ample.png" alt="logo" style="width:250px">
              </div>

              <!-- logo heading -->
              <h4>We believe in the growth of our clients.</h4>
              <!-- <h6 class="font-weight-light">Happy to see you again!</h6> -->
              <form class="pt-3" action="<?php echo base_url('home/login') ?>" method="POST" style="width:330px">



                <!--session call for error and success messages -->

                <?php
                if ($this->session->flashdata('login_failed')) :
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php

                    echo ($this->session->flashdata('login_failed')); ?>

                  </div>
                <?php endif; ?>

                <?php
                if ($this->session->flashdata('success')) :
                ?>
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php

                    echo ($this->session->flashdata('success')); ?>

                  </div>
                <?php endif; ?>

                <!--session End -->



                <!--Login form start -->

                <div class="form-group">
                  <label for="user_name">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="user_name" placeholder="Username">

                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" name="password" placeholder="Password">
                  </div>
                </div>

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <!-- <input type="checkbox" class="form-check-input"> Keep me signed in </label> -->
                  </div>
                  <a href="<?php echo base_url('home/forgot_password') ?>" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">

                  <!--Submit button -->
                  <button class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn" type="submit" name="submit" value="login">LOGIN</button>
                </div>
              </form>
              <!--Login form End -->
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-semibold text-center flex-grow align-self-end">Copyright &copy; 2021 All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>