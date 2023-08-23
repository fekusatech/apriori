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
                    <form action="" method="POST">
                        <div class="card-body">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            <label for="min_support">Min Support</label>
                            <input type="number" class="form-control" id="min_support" name="min_support" required>
                            <label for="min_confidence">Min Confidence</label>
                            <input type="number" class="form-control" id="min_confidence" name="min_confidence" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Proses Data</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>