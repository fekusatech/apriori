<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
              <a href="<?= base_url('dashboard/promosi_add') ?>" class="btn btn-default btn-sm float-right">Tambah Data</a>
            </h3>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="myTable">
                <thead>
                  <th style="width: 5px;">No</th>
                  <th>Promo</th>
                  <th>Keterangan</th>
                  <th>Produk</th>
                  <th>Diskon</th>
                  <th>Minim Order</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($data as $d) { 
                    $namaproduk = $MData->selectdatawhere('produk',['idproduk'=>$d->id_product])?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $d->name ?></td>
                      <td><small><?= $d->keterangan ?></small></td>
                      <td><?= $namaproduk->namaperumahan?></td>
                      <td><?= $d->diskon ?></td>
                      <td><?= $d->minim_order ?></td>
                      <td>
                        <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('dashboard/promosi_delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>