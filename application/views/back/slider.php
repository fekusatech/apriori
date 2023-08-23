<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            <?= $title ?>
                            <a href="<?= base_url('dashboard/slider_add') ?>" class="btn btn-default btn-sm float-right">Tambah Data</a>
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="myTable">
                                <thead>
                                    <th style="width: 5px;">No</th>
                                    <th>Text1</th>
                                    <th>Text2</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data as $d) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $d->text1 ?></td>
                                            <td><?= $d->text2 ?></td>
                                            <td><img src="<?= base_url("assets/img/{$d->image}") ?>" width="150"></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/slider_edit/' . $d->id) ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                                                <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('dashboard/slider_delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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