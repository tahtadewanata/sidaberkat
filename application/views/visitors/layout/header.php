<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url(); ?>vuexy/assets/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SIDABERKAT | Kab. Nganjuk</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>vuexy/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>vuexy/assets/vendor/libs/leaflet/leaflet.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url(); ?>vuexy/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url(); ?>vuexy/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url(); ?>vuexy/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-xxl">
                    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                                </svg>
                            </span>
                            <span class="app-brand-text demo menu-text fw-bold">SIDABERKAT</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="ti ti-x ti-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- Style Switcher -->
                            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="ti ti-md"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- / Style Switcher-->

                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
                        <input type="text" class="form-control search-input border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Layout container --> <!-- menu bawah -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                        <div class="container-xxl d-flex h-100">
                            <ul class="menu-inner">
                                <!-- Data Stunting -->
                                <li class="menu-item">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                                        <div data-i18n="Data Stunting">Data Stunting</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link">
                                                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                                                <div data-i18n="Charts">Charts</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= site_url('data_stunting'); ?>" class="menu-link">
                                                <i class="menu-icon tf-icons ti ti-map"></i>
                                                <div data-i18n="Data Stunting">Data Stunting</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Data Kemiskinan -->
                                <li class="menu-item">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                                        <div data-i18n="Data Kemiskinan">Data Kemiskinan</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                                                <div data-i18n="Charts">Charts</div>
                                            </a>
                                            <ul class="menu-sub">
                                                <li class="menu-item">
                                                    <a href="charts-chartjs.html" class="menu-link">
                                                        <div data-i18n="ChartJS">ChartJS</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= site_url('data_kemiskinan'); ?>" class="menu-link">
                                                <i class="menu-icon tf-icons ti ti-map"></i>
                                                <div data-i18n="Data Kemiskinan">Data Kemiskinan</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- / Menu -->
                    <script>
                        // Ambil URL saat ini
                        var currentUrl = window.location.href;

                        // Dapatkan semua elemen <a> di dalam <ul class="menu-inner">
                        var menuLinks = document.querySelectorAll('.menu-inner a');

                        // Loop melalui setiap elemen <a> untuk memeriksa URL
                        menuLinks.forEach(function(link) {
                            // Bandingkan URL saat ini dengan atribut href dari setiap elemen <a>
                            if (link.href === currentUrl) {
                                // Jika cocok, tambahkan kelas "active" pada elemen <li> terdekat
                                link.closest('.menu-item').classList.add('active');
                            }
                        });
                    </script>