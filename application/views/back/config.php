<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">
              <?=$title?>
            </h3>
          </div>
          <form method="post" action="<?=base_url('dashboard/config_edit/'.$data->id_config)?>"  enctype="multipart/form-data">
          <div class="card-body row">
            <div class="col-md-12">
              <label>Nama Website</label>
              <input type="text" name="nama" class="form-control" required="" value="<?=$data->nama?>">
              <label>Nomor Whatsapp website</label>
              <input type="text" name="wa" class="form-control" required="" value="<?=$data->nohp?>">
              <label>Email website</label>
              <input type="email" name="email" class="form-control" required="" value="<?=$data->email?>">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" required="" value="<?=$data->alamat?>">
              <label>No Rekening</label>
              <input type="text" name="no_rek" class="form-control" required="" value="<?=$data->no_rek?>">
              <label>Pemilik Rekening</label>
              <input type="text" name="pemilik_rek" class="form-control" required="" value="<?=$data->pemilik_rek?>">
              <label>Bank Rekening</label>
              <input type="text" name="bank_rek" class="form-control" required="" value="<?=$data->bank_rek?>">
              <label>Foto Rekening</label>
              <input type="file" name="foto_rek" class="form-control">
            </div>

            
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