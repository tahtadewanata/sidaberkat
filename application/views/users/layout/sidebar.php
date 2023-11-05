<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>soft-ui/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/log.png">
  <title>
    SIDABERKAT | Kab. Nganjuk
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url();?>soft-ui/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url();?>soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url();?>soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url();?>soft-ui/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--toaster-->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <!-- Sweet Alert css-->
  <link href="<?= base_url()?>material/assets/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <!-- datatables -->
  <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
        <img src="<?= base_url();?>soft-ui/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dinas Arpus</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url();?>admin">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-project-diagram fa-lg" style="color: #000000;"></i>
            </div>
            <span class="nav-link-text ms-1">Data Arsip</span>
          </a>
        </li>
<!-- 
        <li class="nav-item">
          <a class="nav-link " href="<?= base_url();?>admin/master-opd">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-university fa-lg" style="color: #000000;"></i>
            </div>
            <span class="nav-link-text ms-1">Master OPD</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link  " href="<?= base_url();?>admin/master-pokok-masalah">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="fas fa-receipt fa-lg" style="color: #000000;"></i>
           </div>
           <span class="nav-link-text ms-1">Master Pokok Masalah</span>
         </a>
       </li> -->

       <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="<?= base_url();?>admin/reset">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-key fa-lg" style="color: #000000;"></i>
          </div>
          <span class="nav-link-text ms-1">Ganti Password</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <a class="btn bg-gradient-primary mt-3 w-100" href="<?= site_url('auth/auth/logout'); ?>">Log Out</a>
  </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <script>
  // Get the current URL path
    var currentPath = window.location.pathname;

  // Get all navigation links
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

  // Loop through the navigation links and add the 'active' class to the appropriate one
    navLinks.forEach(function(link) {
      var linkPath = new URL(link.getAttribute('href'), window.location.origin).pathname;
      console.log(currentPath + ' -- ' + linkPath);
      if (currentPath === linkPath) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  </script>

