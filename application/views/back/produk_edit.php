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
          <form method="post" action="<?= base_url('dashboard/produk_edit/' . $data->idproduk) ?>" enctype="multipart/form-data">
            <div class="card-body row">
              <div class="col-md-3">
                <label>Nama Penyewaan</label>
                <input type="text" name="produk" class="form-control" required="" value="<?= $data->namaperumahan ?>">
              </div>
              <div class="col-md-3">
                <label>Contact HP (WA)</label>
                <input type="text" name="contact_hp" class="form-control" value="<?= $data->contact_hp ?>"  required="">
              </div>
              <div class="col-md-6">
                <label>Kategori Penyewaan</label>
                <select name="kategori" class="form-control" required="">
                  <option value="">Pilih Opsi</option>
                  <?php foreach ($kat as $k) { ?>
                    <option <?php if ($data->idkategori == $k->idkategori) {
                              echo "selected";
                            } ?> value="<?= $k->idkategori ?>"><?= $k->kategori ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Foto Penyewaan</label>
                <input type="file" name="file" class="form-control">
              </div>
              <div class="col-md-6">
                <label>Harga Sewa</label>
                <input type="number" name="harga" class="form-control" required="" value="<?= $data->harga ?>">
              </div>
              <div class="col-md-6">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required="" value="<?= $data->alamat ?>">
              </div>
              <div class="col-md-3">
                <label>Fasilitas</label>
                <input type="text" name="Fasilitas" class="form-control" required="" value="<?= $data->luas ?>">
              </div>
              <div class="col-md-3">
                <label>Status Penyewaan</label>
                <select name="status" class="form-control" required="">
                  <option value="">Pilih Opsi</option>
                  <option <?php if ($data->status == 'Y') {
                            echo "selected";
                          } ?> value="Y">Aktif</option>
                  <option <?php if ($data->status == 'T') {
                            echo "selected";
                          } ?> value="T">Tidak Aktif</option>
                </select>
              </div>
              <div class="col-md-12">
                <label>Deskripsi</label>
                <textarea class="ckeditor" id="ckeditor" name="desk" required=""><?= $data->deskripsi ?></textarea>
              </div>
              <div class="col-md-12">
                <label>Embed Google Maps</label>
                <textarea class="form-control" id="" name="embed" required="" placeholder="(width='100%', height='250px')"><?= $data->embed ?></textarea>
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