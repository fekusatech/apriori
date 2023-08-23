<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Form Pembayaran</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Pembayaran
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= About Section ======= -->
  <section class="section-about">
    <div class="container">
      <div class="row">
        <div class="limiter">
          <div class="container pt-0">
            <form method="post" action="" enctype="multipart/form-data" class="login100-form validate-form flex-sb flex-w">
              <div class="row">
                  <center><p style="font-size:20px;">Lakukan Pembayaran Sebesar <b>Rp. <?=number_format($transaksi->total)?></b><br>
                  Pada Rekening : <?=$web->no_rek?> a/n <?=$web->pemilik_rek?> (<?=$web->bank_rek?>)<br>
                  <img src="<?=base_url("assets/img/{$web->foto_rek}")?>" width="200"><br>Segera kirim bukti transfer pada form dibawah ini agar bisa segera kami proses.</p></center>
                <div class="col-md-7 col-12 mx-auto">
                  <div class="mb-3">
                    <label for="nohp" class="mb-1">Upload Bukti Transfer<span class="text-danger">*</span></label>
                    <input type="hidden" name="id" value="<?=$id?>" class="form-control">
                    <input type="file" name="buktibayar" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                      Kirim Bukti Bayar
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <script></script>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>