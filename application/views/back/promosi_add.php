<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header  card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
              <a href="<?= base_url('dashboard/promosi') ?>" class="btn btn-danger float-right btn-sm">Kembali</a>
            </h3>
          </div>
          <form method="post" action="<?= base_url('dashboard/promosi_add') ?>" enctype="multipart/form-data">
            <div class="card-body">
              <label>Nama Promosi</label>
              <input type="text" name="name" class="form-control" required="">
              <label>Produk</label>
              <select class="form-control" name="id_product" require="">
                <option>--Pilih Produk--</option>
                <?php foreach ($produklist as $produklists) {
                  $getdata = $this->MData->selectdatawhere('promo', ['id_product' => $produklists->idproduk]);
                  if (!$getdata) {
                ?>
                    <option value="<?= $produklists->idproduk ?>"><?= $produklists->namaperumahan ?></option>
                <?php }
                } ?>
              </select>
              <!-- <input type="text" name="keterangan" class="form-control" required=""> -->
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control" required="">
              <label>Diskon (%)</label>
              <input type="number" name="diskon" class="form-control" min="1" max="100" required="">
              <label>Minim Order</label>
              <input type="text" name="minim_order" class="form-control" required="">
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