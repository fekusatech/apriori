<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">

          </div>
          <form method="post" action="<?= base_url('dashboard/produk_add/') ?>" enctype="multipart/form-data">
            <div class="card-body row">
              <div class="col-md-3">
                <label>Nama Produk</label>
                <input type="text" name="produk" class="form-control" required="">
              </div>
              <div class="col-md-3">
                <label>Qty Produk</label>
                <input type="text" name="qty" class="form-control" required="">
              </div>
              <div class="col-md-6">
                <label>Status Produk</label>
                <select name="status" class="form-control" required="">
                  <option value="">Pilih Opsi</option>
                  <option value="1">Aktif</option>
                  <option value="0">Non-Aktif</option>
                </select>
              </div>
              <!-- <div class="col-md-6">
                <label>Foto Penyewaan</label>
                <input type="file" name="file" class="form-control" required="">
              </div> -->
              <div class="col-md-6">
                <label>Harga Produk</label>
                <input type="number" name="harga" class="form-control" required="">
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