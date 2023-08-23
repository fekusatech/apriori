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
          <form method="post" action="<?= base_url('dashboard/artikel_add') ?>" enctype="multipart/form-data">
            <div class="card-body">
              <label>Judul</label>
              <input type="text" name="judul" class="form-control" required="">
              <label>Cover</label>
              <input type="file" name="cover" class="form-control" required="">
              <label>Judul</label>
              <textarea name="isi" class="ckeditor" required=""></textarea>
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