<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Daftar Penyewaan</h1>
            <span class="color-text-a">Semua Gedung</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Semua Gedung
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Property Grid ======= -->
  <section class="property-grid grid">
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($data as $t) { ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow aspect1p1">
              <div class="img-box-a">
                <img src="<?= base_url('assets/img/' . $t->gambar) ?>" alt="" class="img-a aspect1p1">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="<?= base_url('penyewaan_gedung/' . $t->idproduk) ?>"><?= ucwords($t->namaperumahan) ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a" style="text-transform: none !important;">Rp<?= number_format($t->harga, 0, ',', '.') . ' <small>/ ' . $t->durasi . ' jam</small>' ?></span>
                    </div>
                    <a href="<?= base_url('penyewaan_gedung/' . $t->idproduk) ?>" class="link-a">Informasi gedung
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around text-center">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?= $t->luas ?> m
                          <sup>2</sup>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section><!-- End Property Grid Single-->

</main><!-- End #main -->