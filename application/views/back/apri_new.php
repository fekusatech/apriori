<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success')) : ?>
            <center>
                <h4><span class="badge badge-pill badge-success"> <?php echo $this->session->flashdata('success'); ?></span></h4>
            </center>
        <?php endif; ?>
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header  card-header-primary">
                        <h3 class="card-title">
                            Upload Data
                        </h3>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <label for="file_upload">File Input</label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Proses Data</button>
                        </div>
                    </form>
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
                            Data Transaksi
                        </h3>
                    </div>
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
                                        echo "<td>" . $list_items['transaction_date'] . "</td>";
                                        echo "<td>" . $list_items['produk'] . "</td>";
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
                </div>
            </section>
        </div>
    </div>
</section>