<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Daftar promosi</h1>
            <span class="color-text-a">Semua promosi</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Semua promosi
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- =======  Blog Grid ======= -->
  <section class="news-grid grid">
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($data as $t) { ?>
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box aspect1p1">
              <div class="img-box-b">
                <img src="<?= base_url('assets/img/artikel/' . $t->cover) ?>" alt="" class="img-b aspect1p1">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b" style="color: white">Administrator</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="<?= base_url('berita/' . $t->slug) ?>"><?= ucwords($t->judul) ?></a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b"><?= date('d M Y', strtotime($t->time)) ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section><!-- End Blog Grid-->

</main><!-- End #main -->