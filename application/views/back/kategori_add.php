<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header  card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
              <a href="<?= base_url('dashboard/kategori') ?>" class="btn btn-danger float-right btn-sm">Kembali</a>
            </h3>
          </div>
          <form method="post" action="<?= base_url('dashboard/kategori_add') ?>">
            <div class="card-body">
              <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control" required="">
              </div>
              <div class="mb-3">
                <label>Durasi (jam)</label>
                <input type="number" name="durasi" class="form-control" required="">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>