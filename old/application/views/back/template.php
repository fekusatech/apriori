<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/backend/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/backend/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $web->nama ?> | Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>assets/backend/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url() ?>assets/backend/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url() ?>assets/backend/img/sidebar-3.jpg">
      <div class="logo"><a href="<?= base_url('dashboard') ?>" class="simple-text logo-normal">
          <?= $web->nama ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?= $this->uri->segment(2) === null ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
              <i class="material-icons">home</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($_SESSION['role'] == "adminsuper") {?>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'data') !== false ? 'active' : '' ?>">
            
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'user') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/user') ?>">
              <i class="material-icons">person</i>
              <p>Manajemen User</p>
            </a>
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'kategori') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/kategori') ?>">
              <i class="material-icons">category</i>
              <p>Kategori</p>
            </a>
          </li>
          <?php }?>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'produk') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/produk') ?>">
              <i class="material-icons">home</i>
              <p>Produk</p>
            </a>
          </li>
          <?php if($_SESSION['role'] == "adminsuper") {?>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'promosi') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/promosi') ?>">
              <i class="fa fa-usd"></i>
              <p>Diskon Produk</p>
            </a>
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'transaksi') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/transaksi') ?>">
              <i class="material-icons">list</i>
              <p>Transaksi</p>
            </a>
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'artikel') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/artikel') ?>">
              <i class="material-icons">article</i>
              <p>Artikel Promosi</p>
            </a>
          </li>
          <?php }?>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'keluhan') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/keluhan') ?>">
              <i class="fa fa-exclamation-circle"></i>
              <p>Keluhan</p>
            </a>
          </li>
 
          <?php if($_SESSION['role'] == "adminsuper") {?> 
          <li class="nav-item <?= strpos($this->uri->segment(1), 'apriori') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="#">
              <i class="material-icons">table</i>
              <p>Apriori</p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  <?= strpos($this->uri->segment(2), 'apri_upload') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('apriori/apri_upload') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Data</p>
                </a>
              </li>
              <li class="nav-item  <?= strpos($this->uri->segment(2), 'apri_proses') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('apriori/apri_proses') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses</p>
                </a>
              </li>
              <li class="nav-item  <?= strpos($this->uri->segment(2), 'apri_hasil') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('apriori/apri_hasil') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'config') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/config') ?>">
              <i class="fa fa-cog"></i>
              <p>Setting</p>
            </a>
          </li>
          <li class="nav-item <?= strpos($this->uri->segment(2), 'slider') !== false ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard/slider') ?>">
              <i class="material-icons">slideshow</i>
              <p>Produk Hasil Apriori</p>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><?= $title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i> <?= $this->session->userdata('nama') ?>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <a class="dropdown-item" href="#">Profile</a> -->
                  <a onclick="return confirm('apakah anda yakin ingin keluar ?')" class="dropdown-item" href="<?= base_url('auth/logout') ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php $this->load->view($body) ?>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> <b>Dashboard <?= $web->nama ?></b>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/backend/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url() ?>assets/backend/demo/demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
  <script src="<?php echo base_url('assets/') ?>alert.js"></script>
  <?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>