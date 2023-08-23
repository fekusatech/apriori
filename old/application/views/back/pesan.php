<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    
                <div class="direct-chat-messages">
                  <?php foreach ($data as $d) { 
                  if ($d->pengirim != $this->session->userdata('userid')) { 
                ?>
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?=ucfirst($user->nama)?></span>
                      <span class="direct-chat-timestamp float-right"><?=date('d M Y H:i A',strtotime($d->waktu))?></span>
                    </div>
                    <img class="direct-chat-img" src="<?=base_url('assets/backend/assets/img/noprofile.png')?>" alt="">
                    <div class="direct-chat-text">
                      <?=ucfirst($d->pesan)?>
                    </div>
                  </div>
                  <?php }else { ?>
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?=ucfirst($this->session->userdata('nama'))?></span>
                      <span class="direct-chat-timestamp float-left"><?=date('d M Y H:i A',strtotime($d->waktu))?></span>
                    </div>
                    <img class="direct-chat-img" src="<?=base_url('assets/backend/assets/img/noprofile.png')?>" alt="">
                    <div class="direct-chat-text">
                      <?=ucfirst($d->pesan)?>
                    </div>
                  </div>
                  <?php } ?>
                <?php } ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="<?=base_url('admin/kirim_pesan/'.$user->userid)?>" method="post">
                  <div class="input-group">
                    <input type="text" name="pesan" required="" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
      </section>
    </div>
  </div>
</section>