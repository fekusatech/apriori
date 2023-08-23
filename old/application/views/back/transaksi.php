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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="myTable">
                <thead>
                  <tr>
                    <th rowspan="2" style="width: 5px;">No</th>
                    <th colspan="2">Detail</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                    <th>Transaksi</th>
                    <th>Pemesan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td style="text-align: left">
                        <b>ID : #<?= $d->idtransaksi ?></b><br>
                        <?php if ($d->statustransaksi == 'menunggu') {
                          $w = 'info';
                        } ?>
                        <?php if ($d->statustransaksi == 'diterima') {
                          $w = 'success';
                        } ?>
                        <?php if ($d->statustransaksi == 'ditolak') {
                          $w = 'danger';
                        } ?>
                        <?php if ($d->statustransaksi == 'Belum Bayar') {
                          $w = 'primary';
                        } ?>
                        Status Transaksi : <span class="badge badge-<?= $w ?>"><?= ucfirst($d->statustransaksi) ?></span>
                      </td>
                      <td style="text-align: left">
                        Nama : <?= ucwords($d->nama) ?><br>
                        Email : <?= $d->email ?><br>
                        No HP : <?= $d->notelp ?><br>
                      </td>
                      <td>
                        <a href="<?= base_url('dashboard/transaksi_info/' . $d->idtransaksi) ?>" class="btn btn-primary btn-sm">Informasi</a>
                        <?php if ($d->statustransaksi == 'menunggu') { ?>
                          <a target="_blank" href="<?= base_url('assets/img/' . $d->buktibayar) ?>" class="btn btn-success btn-sm">Bukti Bayar</a>
                          <a onclick="return confirm('Apakah anda yakin ingin menerima transaksi ID #<?= $d->idtransaksi ?> ?')" href="<?= base_url('dashboard/transaksiterima/' . $d->idtransaksi) ?>" class="btn btn-info btn-sm">Terima</a>
                          <a onclick="return confirm('Apakah anda yakin ingin menolak transaksi ID #<?= $d->idtransaksi ?> ?')" href="<?= base_url('dashboard/transaksitolak/' . $d->idtransaksi) ?>" class="btn btn-danger btn-sm">Tolak</a>
                        <?php } ?>
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