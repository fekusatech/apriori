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
              <table class="table text-center table-bordered" id="myTable">
                <thead class="text-primary">
                  <th style="width: 5px;">No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $d->nama ?></td>
                      <td><?= $d->email ?></td>
                      <td><?= $d->notelp ?></td>
                      <td>
                        <?php if ($d->aktif == 'Y') { ?>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('dashboard/user_blokir/' . $d->userid) ?>" class="btn btn-danger btn-sm">Blokir</a>
                        <?php } ?>
                        <?php if ($d->aktif == 'T') { ?>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('dashboard/user_aktif/' . $d->userid) ?>" class="btn btn-info btn-sm">Aktifkan</a>
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