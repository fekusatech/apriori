<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header  card-header-primary">
                        <h3 class="card-title">
                            <?= $title ?>
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <form action="" method="POST">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= $tanggalmulai == "0" ?  date('Y-m-d') : $tanggalmulai ?>" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?= $tanggalselesai == "0" ?  date('Y-m-d') : $tanggalselesai ?>" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="methodnya" value="searchrange">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="" method="POST">
                                    <label for="min_support">Min Support</label>
                                    <input type="number" class="form-control" id="min_support" name="min_support" required>
                                    <label for="min_confidence">Min Confidence</label>
                                    <input type="number" class="form-control" id="min_confidence" name="min_confidence" required>
                                    <input type="hidden" name="methodnya" value="prosesdata">
                                    <input type="hidden" name="tanggal_mulai" value="<?= $tanggalmulai ?>">
                                    <input type="hidden" name="tanggal_selesai" value="<?= $tanggalselesai ?>">
                                    <button type="submit" class="btn btn-success" <?= $list_item <> null ? null : "disabled" ?>>Proses Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header  card-header-primary">
                        <h3 class="card-title">
                            Hasil
                        </h3>
                    </div>
                    <div class="card-body">
                        <?= $outputfirst ?>
                        <?= $outputmining ?>
                        <?php if ($outputmining == null) { ?>
                            <div class="table-responsive">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Produk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if ($list_item <> null) {
                                            foreach ($list_item as $list_items) {
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . $list_items->transaction_date . "</td>";
                                                echo "<td>" . $list_items->produk . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr>";
                                            echo "<td colspan='3' align='center'>Data tidak ada</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>