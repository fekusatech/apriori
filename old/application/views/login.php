  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single pb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Login</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url() ?>">Beranda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Login
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <div class="limiter">
      <div class="container pt-0">
        <form method="post" action="<?= base_url('auth/aksi_login') ?>">
          <div class="row">
            <div class="col-md-7 col-12 mx-auto">
              <div class="mb-3">
                <label for="email" class="mb-1">Email Address <span class="text-danger">*</span></label>
                <input class="form-control" id="email" type="email" name="email" required>
              </div>

              <div class="mb-3">
                <label for="password" class="mb-1">Kata Sandi <span class="text-danger">*</span></label>
                <input class="form-control" id="password" type="password" name="password" required>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">
                  Login
                </button>
              </div>

              <div class="w-full text-center p-t-55">
                <span class="txt2">
                  Belum memiliki akun?
                </span>

                <a href="<?= base_url('auth/register') ?>" class="txt2 bo1">
                  Daftar sekarang
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>
  </main>