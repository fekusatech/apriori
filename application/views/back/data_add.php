<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <!-- <?= $title ?> -->
              <!-- <a href="<?= base_url('dashboard/data') ?>" class="btn btn-danger float-right btn-sm">Kembali</a> -->
            </h3>
          </div>
          <form method="post" action="<?= base_url('dashboard/data_tambah') ?>" enctype="multipart/form-data">
            <div class="card-body row">
              <div class="col-md-12">
                <label>Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required="">
              </div>
              
              <div class="col-md-12">
                <label>Data Keterangan</label>
                <textarea class="form-control" name="keterangan" required></textarea>
              </div>
              
              
            </div>
            <div class="card-footer">
              <a href="<?= base_url('dashboard/data') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>