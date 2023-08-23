<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Daftar Transaksi <?= ucwords($this->session->userdata('nama')) ?></h1>
            <span class="color-text-a">Transaksi</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url() ?>">Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Transaksi
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
      <table class="table table-bordered">
        <thead class="bg-primary text-center text-white">
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Total</th>
          <th>Waktu Pemesanan</th>
          <th>Status</th>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $t) : ?>
            <tr>
              <td class="text-center"><?= $key + 1 ?></td>
              <td><?= $t->idtransaksi ?></td>
              <td><?= 'Rp' . number_format($t->total_harga, 0, ',', '.') ?></td>
              <td><?= $t->waktu ?></td>
              <td>
                <a href="<?= base_url('transaksi/' . $t->idtransaksi) ?>" class="text-info">Informasi Penyewaan</a> |
                <?php if ($t->statustransaksi == 'diterima') : ?>
                  Diterima |
                  <a target="_blank" href="https://api.whatsapp.com/send/?phone=<?= $web->nohp ?>&text=hai <?= $web->nama ?>, saya sudah melakukan transaksi untuk sewa gedung. Bagaimanakah untuk tahap selanjutnya ? Terima kasih." style="color:orange">Kirim Pesan Whatsapp</a>
                <?php elseif ($t->statustransaksi == 'menunggu') : ?>
                  Menunggu | <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('home/transaksi_batal/' . $t->idtransaksi . '/' . $t->idproduk) ?>" style="color:orange">Batalkan</a>
                <?php elseif ($t->statustransaksi == 'ditolak') : ?>
                  Ditolak | <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('home/transaksi_batal/' . $t->idtransaksi . '/' . $t->idproduk) ?>" style="color:orange">Batalkan</a>
                <?php elseif ($t->statustransaksi == 'Belum Bayar') : ?>
                  <a href="<?=base_url("home/pembayaran/{$t->idtransaksi}")?>" style="color:green">Lakukan Pembayaran</a> | <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('home/transaksi_batal/' . $t->idtransaksi . '/' . $t->idproduk) ?>" style="color:orange">Batalkan</a>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    </div>
  </section><!-- End Property Grid Single-->

</main><!-- End #main -->
<?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>