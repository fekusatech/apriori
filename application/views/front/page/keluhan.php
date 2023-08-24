<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Form Keluhan</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Keluhan
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
            <form method="post" action="" class="login100-form validate-form flex-sb flex-w">
              <div class="row">
                <div class="col-md-7 col-12 mx-auto">
                  <div class="mb-3">
                    <label for="nama" class="mb-1">Judul Keluhan <span class="text-danger">*</span></label>
                    <input class="form-control" id="judul" type="text" name="judul" placeholder="Judul Keluhan" required="">
                    <input class="form-control" id="judul" type="hidden" name="created_by" value="<?= $this->session->userdata('nama') ?>">
                  </div>
                  <div class="mb-3">
                    <label for="nohp" class="mb-1">Isi Keluhan <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="10" name="isi" placeholder="Masukan Keluhan Anda" required=""></textarea>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                      Kirim Keluhan
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