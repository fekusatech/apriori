<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            <?= $title . ' ' . $idtransaksi ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">No</th>
                                        <th>Penyewaan Gedung</th>
                                        <th>Durasi</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data as $d) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= ucwords($d->namaperumahan) ?></td>
                                            <td><?= ($d->durasi * $d->durasi_produk) . " jam" ?></td>
                                            <td>Rp<?= number_format($d->total, 0, ',', '.') ?></td>
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