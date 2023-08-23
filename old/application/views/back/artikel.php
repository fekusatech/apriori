<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
              <a href="<?= base_url('dashboard/artikel_add') ?>" class="btn btn-default btn-sm float-right">Tambah Data</a>
            </h3>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="myTable">
                <thead>
                  <th style="width: 5px;">No</th>
                  <th>Judul</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($data as $d) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?= $d->judul ?><br>
                        <small><b><?= base_url('berita/' . $d->slug) ?></b></small>
                      </td>
                      <td><?= date($d->time) ?></td>
                      <td>
                        <a target="_blank" href="<?= base_url('berita/' . $d->slug) ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="<?= base_url('dashboard/artikel_edit/' . $d->idartikel) ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                        <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('dashboard/artikel_delete/' . $d->idartikel) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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