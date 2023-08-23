<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">home</i>
            </div>
            <p class="card-category">Gedung dan Lapangan</p>
            <h3 class="card-title"><?= $this->db->get_where('produk')->num_rows(); ?>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> <?= date('d/m/Y H:i A') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store</i>
            </div>
            <p class="card-category">Category</p>
            <h3 class="card-title"><?= $this->db->get_where('kategori')->num_rows(); ?></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> <?= date('d/m/Y H:i A') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">book</i>
            </div>
            <p class="card-category">Promosi</p>
            <h3 class="card-title"><?= $this->db->get_where('artikel')->num_rows(); ?></h3>n
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> <?= date('d/m/Y H:i A') ?>
            </div>
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
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> <?= date('d/m/Y H:i A') ?>
            </div>
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