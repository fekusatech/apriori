<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header  card-header-primary">
            <h3 class="card-title">
              <?= $title ?>
              <a href="<?= base_url('dashboard/artikel') ?>" class="btn btn-danger float-right btn-sm">Kembali</a>
            </h3>
          </div>
          <form method="post" action="" enctype="multipart/form-data">
            <div class="card-body">
              <label>Text 1</label>
              <input type="text" name="text1" class="form-control" required="">
              <label>Text 2</label>
              <input type="text" name="text2" class="form-control" required="">
              <label>Image</label>
              <input type="file" name="image" class="form-control" required="">
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