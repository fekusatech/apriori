<main id="main">
  <!-- ======= Intro Single ======= -->
  <section class="intro-single pb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Registrasi</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Registrasi
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->
  <div class="limiter">
    <div class="container pt-0">
      <form method="post" action="<?= base_url('auth/aksi_registrasi') ?>" class="login100-form validate-form flex-sb flex-w">
        <div class="row">
          <div class="col-md-7 col-12 mx-auto">
            <div class="mb-3">
              <label for="nama" class="mb-1">Nama Lengkap <span class="text-danger">*</span></label>
              <input class="form-control" id="nama" type="text" name="nama" placeholder="Masukan nama lengkap" required>
            </div>
            <div class="mb-3">
              <label for="nohp" class="mb-1">Nomor Telepon <span class="text-danger">*</span></label>
              <input class="form-control" id="nohp" type="number" name="nohp" placeholder="Masukan nomor WA / Handphone" required>
            </div>
            <div class="mb-3">
              <label for="email" class="mb-1">Email Address <span class="text-danger">*</span></label>
              <input class="form-control" id="email" type="email" name="email" placeholder="Masukan email aktif" required>
            </div>
            <div class="mb-3">
              <label for="password" class="mb-1">Kata Sandi <span class="text-danger">*</span></label>
              <input class="form-control" id="password" type="password" name="password" placeholder="Masukan password" required>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary w-100">
                Daftar
              </button>
            </div>
            <div class="w-full text-center p-t-55">
              <span class="txt2">
                Sudah memiliki akun?
              </span>
              <a href="<?= base_url('auth') ?>" class="txt2 bo1">
                Login sekarang
              </a>
            </div>
          </div>
      </form>
    </div>
  </div>
  <?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>
</main>