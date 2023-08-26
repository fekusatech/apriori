<?php
$limit_stok = $this->db->get_where('config', ['id_config' => '1'])->row();
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">inventory</i>
            </div>
            <p class="card-category">Produk</p>
            <h3 class="card-title"><?= $this->db->get_where('produk_new')->num_rows(); ?>
            </h3>
          </div>
          <div class="stats">
            &nbsp;
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">warning</i>
            </div>
            <p class="card-category">Produk < Limit Stok</p>
                <h3 class="card-title"><?= $this->db->get_where('produk_new', ['qty <' => $limit_stok->limit_produk])->num_rows(); ?></h3>
          </div>
          <div class="stats">
            &nbsp;
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-user"></i>
            </div>
            <p class="card-category">User</p>
            <h3 class="card-title"><?= $this->db->get_where('user')->num_rows(); ?></h3>
          </div>
          <div class="stats">
            &nbsp;
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="alert alert-info text-center">
          <span>Selamat datang <?= $this->session->userdata('nama') ?>, Saat ini anda sedang menggunakan Dashboard <?= $web->nama ?></span>
        </div>
      </div>
    </div>
  </div>
</div>