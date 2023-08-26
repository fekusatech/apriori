<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
            </h3>
          </div>
          <form method="post" action="<?= base_url('dashboard/config_edit/' . $data->id_config) ?>" enctype="multipart/form-data">
            <div class="card-body row">
              <div class="col-md-12">
                <label>Nama Website</label>
                <input type="text" name="nama" class="form-control" required="" value="<?= $data->nama ?>">
                <label>Limit Qty Produk</label>
                <input type="text" name="limit_produk" class="form-control" required="" value="<?= $data->limit_produk ?>">
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