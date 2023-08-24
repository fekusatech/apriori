<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?= ucwords($data->judul) ?></h1>
            <span class="color-text-a"><?= $data->slug ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?= ucwords($data->judul) ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Blog Single ======= -->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-img-box">
            <center><img src="<?= base_url('assets/img/artikel/' . $data->cover) ?>" alt="" class="img-fluid"></center>
          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              <li class="list-inline-item mr-2">
                <strong>Author : </strong>
                <span class="color-text-a">Administrator</span>
              </li>
              <li class="list-inline-item">
                <strong>Date : </strong>
                <span class="color-text-a"><?= date('d M Y', strtotime($data->time)) ?></span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a" style="text-align: justify;">
            <?= $data->isi ?>
          </div>
          <div class="post-footer">
            <div class="post-share">
              
              <ul class="list-inline socials">
                
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Blog Single-->

</main><!-- End #main -->