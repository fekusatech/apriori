<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?= $title ?>
            </h3>
          </div>
          <form method="post" action="<?= base_url('dashboard/produk_edit/' . $data->id) ?>" enctype="multipart/form-data">
            <div class="card-body row">
              <div class="col-md-3">
                <label>Nama Produk</label>
                <input type="hidden" name="id" value="<?= $data->id ?>" class="form-control" required="">
                <input type="text" name="produk" value="<?= $data->produk ?>" class="form-control" required="">
              </div>
              <div class="col-md-3">
                <label>Qty Produk</label>
                <input type="text" name="qty" value="<?= $data->qty ?>" class="form-control" required="">
              </div>
              <div class="col-md-6">
                <label>Status Produk</label>
                <select name="status" class="form-control" required="">
                  <option value="">Pilih Opsi</option>
                  <option value="1" <?= $data->status == "1" ? "selected" : NULL ?>>Aktif</option>
                  <option value="0" <?= $data->status == "0" ? "selected" : NULL ?>>Non-Aktif</option>
                </select>
              </div>
              <div class="col-md-6">
                <label>Harga Produk</label>
                <input type="number" name="harga" value="<?= $data->harga ?>" class="form-control" required="">
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= base_url('dashboard/produk') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</section>