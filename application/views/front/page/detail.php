<main id="main">

	<!-- ======= Intro Single ======= -->
	<section class="intro-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-6">
					<div class="title-single-box">
						<h1 class="title-single"><?= ucwords($data->namaperumahan) ?></h1>
						<span class="color-text-a"><?= ucfirst($data->alamat) ?></span>
					</div>
				</div>
				<div class="col-md-12 col-lg-6">
					<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= base_url('penyewaan_gedung') ?>">Penyewaan</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								<?= ucwords($data->namaperumahan) ?>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section><!-- End Intro Single-->

	<!-- ======= Property Single ======= -->
	<section class="property-single nav-arrow-b">
		<div class="container">
			<center><img src="<?= base_url('assets/img/' . $data->gambar) ?>" alt=""></center>
			<br>
			<br>

			<div class="row">
				<form onsubmit="return confirm('apakah anda yakin ingin memasukkan gedung ini ke keranjang?')" method="post" action="<?= base_url('cart/' . $data->idproduk) ?>">
					<div class="col-sm-12">
						<div class="row justify-content-between">
							<div class="col-md-5 col-lg-4">
								<div class="property-price foo">
									<div class="title-box-d">
										<h3 class="title-d">Harga</h3>
									</div>
									<div class="card-header-c d-flex">
										<div class="card-title-c ">
											<h5 class="fs-5"><span class="text-primary fw-bolder">Rp<?= number_format($data->harga, 0, ',', '.') ?></span> <?= '<small>/ ' . $data->durasi . ' jam</small>' ?>
											</h5>
										</div>
									</div>
								</div>
								<div class="property-summary">
									<div class="row">
										<div class="col-sm-12">
											<div class="title-box-d pt-5">
												<h3 class="title-d">Informasi Penyewaan</h3>
											</div>
										</div>
									</div>
									<div class="summary-list">
										<ul class="list">
											<li class="d-flex justify-content-between">
												<strong>Property ID:</strong>
												<span><?= $data->idproduk ?></span>
											</li>
											<li class="d-flex justify-content-between">
												<strong>Property Type:</strong>
												<span><?= ucfirst($data->kategori) ?></span>
											</li>
											<li class="d-flex justify-content-between">
												<strong>Area:</strong>
												<span><?= ucfirst($data->luas) ?>m
													<sup>2</sup>
												</span>
											</li>
											<li class="d-flex justify-content-between">
												<strong>Contact HP / WA:</strong>
												<span><a href="https://wa.me/62<?= $data->contact_hp ?>"><?= $data->contact_hp ?></a></span>
											</li>
										</ul>
									</div>
								</div>
								<div class="property-summary">
									<div class="row">
										<div class="col-sm-12">
											<div class="title-box-d pt-5">
												<h3 class="title-d">Form Sewa</h3>
												<p style="font-size: 10pt; font-weight: normal;">Silahkan diisi untuk proses sewa gedung</p>
											</div>
										</div>
									</div>
									<div class="summary-list">
										<ul class="list">
											<div class="form-group">
												<li class="d-flex justify-content-between">
													<strong>Waktu Sewa:</strong>
													<span><input type="datetime-local" id="reqtanggal" style="border: none;outline: none;width: 180px;height:20px;" name="waktu_order" class="form-control" onchange="validasitanggal(this.value,`<?= $idgedung ?>`)" step="any" required></span>
												</li>
											</div>
											<div class="form-group">
												<li class="d-flex justify-content-between">
													<strong>Lama Sewa [per <span id="durasinya"><?= $data->durasi ?></span> jam] :</strong>
													<span>
														<input type="number" onchange="hitung(this.value, <?= (int) $data->harga ?>)" onkeyup="hitung(this.value,<?= $data->harga ?>)" id="lama" style="border: none;outline: none;width: 80px;height:20px;" name="lama" min="1" value="1" class="form-control"></span>
													<input type="hidden" style="border: none;outline: none;width: 80px;height:20px;" name="totalnya" id="totalnya" value="<?= $data->harga ?>" class="form-control">
													<input type="hidden" style="border: none;outline: none;width: 80px;height:20px;" name="totaljam" id="totaljam" value="<?= $data->durasi ?>" class="form-control" readonly>
												</li>
											</div>
											<?php if ($cekpromo) { ?>
												<span class="badge badge-success"><small><?= $cekpromo->keterangan ?></small></span>
											<?php } ?>
											<br>
											<li class="d-flex justify-content-between">
												<strong>Total Harga :</strong>
												<span id="harga">Rp<?= number_format($data->harga, 0, ',', '.') ?></span>
											</li>
										</ul>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end gap-1">
									<a href="<?= $this->agent->referrer() ?>" class="btn btn-danger">Kembali</a>
									<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Sewa </button>
								</div>
							</div>
							<div class="col-md-7 col-lg-7 section-md-t3">
								<div class="row">
									<div class="col-sm-12">
										<div class="title-box-d">
											<h3 class="title-d">Deskripsi</h3>
										</div>
									</div>
								</div>
								<div class="property-description" style="text-align: justify;">
									<p class="description color-text-a">
										<?= ucfirst($data->deskripsi) ?>
									</p>
								</div>
								<hr>
								<?= $data->embed ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section><!-- End Property Single-->

</main><!-- End #main -->

<!-- Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function hitung(text, harga) {
		var cekpromo = "<?= $cekpromo ? 1 : 0 ?>";
		var durasinya = $("#durasinya").text();
		var a = formatRupiah((harga * text).toString(), 'Rp');
		if (cekpromo === "1") {
			<?php if ($cekpromo) { ?>
				var minimorder = <?= (int)$cekpromo->minim_order ?>;
				var diskon = <?= (int)$cekpromo->diskon ?>;
				if (text > minimorder) {
					var hargaawal = harga * text;
					var b = hargaawal - (harga * text / 100 * diskon);
					$('#harga').html(formatRupiah(b.toString(), 'Rp') + `&nbsp;<small><span style="text-decoration: line-through;">` + formatRupiah(hargaawal.toString(), 'Rp') + `</span></small>`);
					$("#totalnya").val(b);
					$("#totaljam").val(durasinya * text);
				} else {
					$("#totaljam").val(durasinya * text);
					$("#totalnya").val(harga * text);
					$('#harga').text(a);
				}
			<?php } ?>
		} else {
			$("#totaljam").val(durasinya * text);
			$("#totalnya").val(harga * text);
			$('#harga').text(a);
		}
	}

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
	}

	function validasitanggal(valuedate, id) {
        var newdate = valuedate.replace('T', ' ');
        newdate = newdate.replace('Z', '');
        console.log(newdate);
// 		const originalDateTime = new Date(valuedate);
// 		const formattedDateTimeStr = originalDateTime.toISOString().replace("T", " ").slice(0, 19);

		$.ajax({
			type: "POST",
			url: "<?=base_url('home/cekvalid')?>",
			dataType: "json",
			data: {
				date: newdate,
				id: id
			},
			success: function(data) {
                if(data.status === false){
                    swal("Ops!", data.message, "error");
                    $("#reqtanggal").val("");
                }

			},
		});
	}
</script>