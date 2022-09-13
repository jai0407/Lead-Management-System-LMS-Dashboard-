<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
  <!--  jQuery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css'); ?>">

  <!-- Layout styles -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/Afavicon.jpg'); ?>" />

  <style>
    .error {
      color: red;
      font-weight: bold;
      font-style: italic;
    }
  </style>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?php echo base_url('home/dashboard') ?>">
              <img src="<?php echo base_url('assets/images/ample.png" alt="logo" ') ?>" style="min-height: 75px;"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('home/dashboard') ?>"><img src="<?php echo base_url('assets/images/ample.png" alt="logo" ') ?>" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <!-- <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                </div>
              </li>
            </ul> -->
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-img">
                    <img src="<?php echo base_url('assets/images/faces/face69.jpg" alt="image" ') ?>" />
                  </div>
                  <div class="nav-profile-text">
                    <p class="text-black font-weight-semibold m-0">
                      <?php $user_name = $this->session->userdata('user_name');
                      echo $user_name; ?>
                    </p>
                    <span class="font-13 online-color"> online <i class="mdi mdi-chevron-down"></i></span>
                  </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('home/change_password') ?>">
                    <i class="mdi mdi-key mr-2 "></i> Change Password </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('home/logout') ?>">
                    <i class="mdi mdi-logout mr-2 text-primary">
                    </i> Signout </a>
                  </d iv>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>



      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('home/dashboard') ?>">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <?php if ($this->session->userdata('user_role') =='ADMIN') {
               ?>
            <li class="nav-item">       
                <a class="nav-link" href="<?php echo base_url('home/setting') ?>">
                  <i class="mdi mdi mdi-brightness-7 menu-icon"></i>
                  <span class="menu-title">Setting</span>
                </a>         
            </li>
            <?php  } ?>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('home/lead_list') ?>">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">Leads</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('home/notification') ?>">
                <i class="mdi mdi-bell menu-icon"></i>
                <span class="menu-title">Notification</span>
              </a>
            </li>

            <?php if ($this->session->userdata('user_role') =='ADMIN') {
               ?>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">Reports</span>
              </a>
            </li>
            <?php  } ?>
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                <!-- <i class="mdi mdi-clipboard-text menu-icon"></i>
                    <span class="menu-title">Reports</span> -->
              </a>
            </li>
            <!--
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                    <span class="menu-title">Reports</span>
                  </a>
                </li> -->
          </ul>
        </div>
      </nav>




    </div>