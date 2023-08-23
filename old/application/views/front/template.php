<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $web->nama ?></title>
  <meta content="<?= $web->nama ?> adalah sebuah perusahaan dibidang penyewaan gedung dengan kualitas yang sangat bagus" name="description">
  <meta content="<?= $web->nama ?>,penyewaan gedung" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/img/logo.png" rel="icon">
  <link href="<?= base_url() ?>assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.3.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
  $uri = $this->uri->segment(1);
  ?>
  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>

  <div class="d-none d-md-block" style="background-color: #ca2e3e;">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between py-2" style="font-size: 13px;">
        <div class="d-flex align-items-center justify-content-between gap-4">
          <a href="https://wa.me/<?= $web->nohp ?>" target="_blank" class="text-decoration-none text-white">
            <i class="bi-whatsapp text-white"></i>&nbsp; <?= $web->nohp ?>
          </a>
          <a href="mailto:<?= $web->email ?>" target="_blank" class="text-decoration-none text-white">
            <i class="bi-envelope text-white"></i>&nbsp; <?= $web->email ?>
          </a>
        </div>
        <div class="d-flex align-items-center justify-content-end gap-1">
         
          <a href="https://wa.me/6281362346171 " class="text-decoration-none bg-success p-2 w-100 rounded-2 d-flex align-items-center" target="_blank" style="line-height: 12px;">
            <i class="bi-whatsapp text-white" style="font-size: 12px;"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg sticky-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
     
      <div class="navbar-collapse collapse" id="navbarDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link <?= $uri === '' || $uri === 'home' ? 'active' : '' ?>" href="<?= base_url() ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $uri === 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $uri === 'penyewaan_gedung' ? 'active' : '' ?>" href="<?= base_url('penyewaan_gedung') ?>">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $uri === 'berita' ? 'active' : '' ?>" href="<?= base_url('berita') ?>">Promosi</a>
          </li>
          <?php if (!$this->session->userdata('userid')) : ?>
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('auth') ?>">Login</a>
            </li>
          <?php elseif ($this->session->userdata('userid')) : ?>
            <li class="nav-item">
              <a class="nav-link <?= $uri === 'keluhan' ? 'active' : '' ?>" href="<?= base_url('keluhan') ?>">Form Keluhan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?= ucwords($this->session->userdata('nama')) ?> </a>
              <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink" style="background-color: #ca2e3e;">
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                  <li><a style="color:white" class="dropdown-item" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <?php elseif ($this->session->userdata('role') == 'pembeli') : ?>
                  <li><a style="color:white" class="dropdown-item" href="<?= base_url('cart') ?>">Keranjang</a></li>
                <?php endif ?>
                <li><a style="color:white" class="dropdown-item" href="<?= base_url('transaksi') ?>">Transaksi</a></li>
                <li><a style="color:white" onclick="return confirm('apakah anda yakin ?')" class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
              </ul>
            </li>
          <?php endif ?>
        </ul>
      </div>
 <a class="navbar-brand text-brand" href="<?= base_url() ?>"><?= $web->nama ?></a>
    </div>
  </nav><!-- End Header/Navbar -->

  <?php $this->load->view($body) ?>

  <!-- ======= Footer ======= -->
 
 
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>
  <script src="<?php echo base_url('assets/') ?>alert.js"></script>
  <?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>
</body>

</html>