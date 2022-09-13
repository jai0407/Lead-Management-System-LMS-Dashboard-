<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/Afavicon.jpg'); ?>" />

</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
              <img src="<?php echo base_url(); ?>assets/images/ample.png" alt="logo" style="width:250px">
              <h4>We believe in the growth of our clients.</h4>
              </div>

              <form class="pt-3" action="<?php echo base_url('home/forgot_password') ?>" method="POST" style="width:330px">


                <?php
                if ($this->session->flashdata('error')) :
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php

                    echo ($this->session->flashdata('error')); ?>

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

                <!-- <h2><i class="mdi mdi-account"></i> Forgot your Password? </h2> -->
               <h2 class="forgot-pass">Forgot your Password?</h2>
               
                </br>
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" name="email" placeholder="Enter Email Address..">
                  </div>

                </div>

                <!-- <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" name="password" placeholder="Password">
                  </div>
                </div> -->

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <!-- <input type="checkbox" class="form-check-input"> Keep me signed in </label> -->
                  </div>
                  <a href="<?php echo base_url('home/index') ?>" class="auth-link text-black">  Back to login</a>
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-semibold auth-form-btn" type="submit" name="submit" value="reset">Reset Password</button>
                </div>
              </form>
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
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>

  <!-- endinject -->

</body>

</html>