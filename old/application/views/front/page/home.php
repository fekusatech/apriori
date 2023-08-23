<div class="intro intro-carousel swiper-container position-relative">

  <div class="swiper-wrapper">
    <?php foreach ($slider as $sliders) { ?>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(<?= base_url() ?>assets/img/<?= $sliders->image ?>)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?= $web->alamat ?>, <br> <?= $web->nohp ?>
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b"><?= $sliders->text1 ?></span>
                      <br> <?= $sliders->text2 ?>
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->

<main id="main">

  <!-- ======= Services Section ======= -->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Menghadirkan Pelayanan</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico d-flex align-items-center gap-2">
                <span class="bi bi-cart"></span>
                <div class="card-title-c">
                  <h2 class="title-c">Elegan</h2>
                </div>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c text-muted fs-6">
                Lengkapi kehidupan anda dengan penyewaan gedung yang dapat meningkatkan gaya hidup anda.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico d-flex align-items-center gap-2">
                <span class="bi bi-calendar4-week"></span>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Cepat</h2>
                </div>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c text-muted fs-6">
                Kami menyediakan gedung yang bisa anda gunakan sesuai dengan kebutuhan anda.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico d-flex align-items-center gap-2">
                <span class="bi bi-card-checklist"></span>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sewa</h2>
                </div>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c text-muted fs-6">
                Kami menyediakan gedung untuk kebutuhan premier anda dengan harga sesuai dengan budget anda.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Latest Properties Section ======= -->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Penyewaan Terbaru</h2>
            </div>
            <div class="title-link">
              <a href="<?= base_url('penyewaan_gedung') ?>">Lihat Semua
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="property-carousel" class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($terbaru as $key => $t) { ?>
            <div class="carousel-item-b swiper-slide">
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
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="propery-carousel-pagination carousel-pagination"></div>

    </div>
  </section><!-- End Latest Properties Section -->

  <!-- ======= Agents Section ======= -->
  <!-- <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Best Agents</h2>
              </div>
              <div class="title-link">
                <a href="agents-grid.html">All Agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="<?= base_url() ?>assets/img/agent-4.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="link-two">Margaret Sotillo
                        <br> Escala</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234
                    </p>
                    <p>
                      <strong>Email: </strong> agents@example.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="<?= base_url() ?>assets/img/agent-1.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="link-two">Stiven Spilver
                        <br> Darw</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234
                    </p>
                    <p>
                      <strong>Email: </strong> agents@example.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="<?= base_url() ?>assets/img/agent-5.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="link-two">Emma Toledo
                        <br> Cascada</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234
                    </p>
                    <p>
                      <strong>Email: </strong> agents@example.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --><!-- End Agents Section -->

  <!-- ======= Latest News Section ======= -->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Artikel Promosi</h2>
            </div>
            <div class="title-link">
              <a href="<?= base_url('berita') ?>">Lihat Semua
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($berita as $t) { ?>
            <div class="carousel-item-c swiper-slide">
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
            </div><!-- End carousel item -->
          <?php  } ?>
        </div>
      </div>

      <div class="news-carousel-pagination carousel-pagination"></div>
    </div>
  </section><!-- End Latest News Section -->
</main><!-- End #main -->