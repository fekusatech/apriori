<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            Data Proses
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Min Support Absolut</th>
                                <td><?= $min_support ?></td>
                            </tr>
                            <tr>
                                <th>Min Support Relatif</th>
                                <td><?= $min_support_relatif ?></td>
                            </tr>
                            <tr>
                                <th>Min Confidence</th>
                                <td><?= $min_confidence ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?= $tanggal_mulai . ' s/d ' . $tanggal_selesai ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            Itemset 1
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Penyewaan</th>
                                    <th>Jumlah</th>
                                    <th>Support</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $listItemset1 = $this->db->select('COUNT(durasi) AS jumlah, produk.idproduk, produk.namaperumahan')
                                ->from('transaksi_list')
                                ->join('transaksi', 'transaksi_list.idtransaksi = transaksi.idtransaksi')
                                ->join('produk', 'transaksi_list.idproduk = produk.idproduk')
                                ->where("DATE(waktu) BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'", NULL, FALSE)
                                ->group_by('transaksi_list.idproduk')
                                ->get()
                                ->result_array();
                                ?>
                                <?php $listItemset2 = []; ?>
                                <?php foreach ($listItemset1 as $key => $item) : ?>
                                    <?php $jumlah = $this->M_data->count_itemset1($transaksi, $item['idproduk']); ?>
                                    <?php $support = ($jumlah / $jumlah_transaksi) * 100; ?>
                                    <?php if ($support >= $min_support) $listItemset2[] = $item; ?>
                                    <tr>
                                        <td class="text-center"><?= $key + 1 ?></td>
                                        <td><?= $item['namaperumahan'] ?></td>
                                        <td class="text-center"><?= $item['jumlah'] ?></td>
                                        <td class="text-center"><?= number_format($support, 2, ',', '.') ?></td>
                                        <td class="text-center"><?= $support >= $min_support ? 'Lolos' : 'Tidak Lolos'  ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            Itemset 2
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th rowspan="2" class="align-middle">No</th>
                                    <th rowspan="2" class="align-middle">Penyewaan 1</th>
                                    <th rowspan="2" class="align-middle">Penyewaan 2</th>
                                    <th rowspan="2" class="align-middle">Jumlah</th>
                                    <th rowspan="2" class="align-middle">Support XUY</th>
                                    <th rowspan="2" class="align-middle">Support X</th>
                                    <th rowspan="2" class="align-middle">Confidence</th>
                                    <th colspan="2" class="align-middle">Keterangan</th>
                                </tr>
                                <tr>
                                    <th>Support XUY</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $listProdukId2 = []; ?>
                                <?php $listItemset3 = []; ?>
                                <?php $nomor = 1; ?>

                                <?php print_r($listItemset2); ?>

                                <?php foreach ($listItemset2 as $key => $item) : ?>
                                    <?php foreach ($listItemset2 as $keys => $items) : ?>
                                        <?php if ($key !== $keys) : ?>
                                            <?php $jumlah = $this->M_data->count_itemset2($transaksi, $item['idproduk'], $items['idproduk']); ?>
                                            <?php if ((int) $jumlah > 0) : ?>
                                                <?php if ($this->M_data->check_if_exist_itemset2($listProdukId2, $item['idproduk'], $items['idproduk']) === false) : ?>
                                                    <?php $listProdukId2[] = [$item['idproduk'], $items['idproduk']]; ?>
                                                    <?php $support = ($jumlah / $jumlah_transaksi) * 100; ?>
                                                    <?php $supportX = ($this->M_data->count_itemset1($transaksi, $item['idproduk']) / $jumlah_transaksi) * 100; ?>
                                                    <?php $confidence = ($support / $supportX) * 100; ?>
                                                    <?php if ($support >= $min_support) $listItemset3[] = [$item, $items]; ?>
                                                    <tr>
                                                        <td class="text-center"><?= $nomor++ ?></td>
                                                        <td><?= $item['namaperumahan'] ?></td>
                                                        <td><?= $items['namaperumahan'] ?></td>
                                                        <td class="text-center"><?= $jumlah ?></td>
                                                        <td class="text-center"><?= number_format($support, 2, ',', '.') ?></td>
                                                        <td class="text-center"><?= number_format($supportX, 2, ',', '.') ?></td>
                                                        <td class="text-center"><?= number_format($confidence, 2, ',', '.') ?></td>
                                                        <td class="text-center"><?= $support >= $min_support ? 'Lolos' : 'Tidak Lolos'  ?></td>
                                                        <td class="text-center"><?= $confidence >= $min_confidence ? 'Lolos' : 'Tidak Lolos'  ?></td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">
                            Itemset 3
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th rowspan="2" class="align-middle">No</th>
                                    <th rowspan="2" class="align-middle">Penyewaan 1</th>
                                    <th rowspan="2" class="align-middle">Penyewaan 2</th>
                                    <th rowspan="2" class="align-middle">Penyewaan 3</th>
                                    <th rowspan="2" class="align-middle">Jumlah</th>
                                    <th rowspan="2" class="align-middle">Support XUY</th>
                                    <th rowspan="2" class="align-middle">Support X</th>
                                    <th rowspan="2" class="align-middle">Confidence</th>
                                    <th colspan="2" class="align-middle">Keterangan</th>
                                </tr>
                                <tr>
                                    <th>Support XUY</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($listItemset3 as $key => $item) : ?>
                                    <?php foreach ($listItemset1 as $keys => $items) : ?>
                                        <?php if ($item[0]['idproduk'] !== $items['idproduk'] && $item[1]['idproduk'] !== $items['idproduk']) : ?>
                                            <?php $jumlah = $this->M_data->count_itemset3($transaksi, $item[0]['idproduk'], $item[1]['idproduk'], $items['idproduk']); ?>
                                            <?php if ((int) $jumlah > 0) : ?>
                                                <?php $support = ($jumlah / $jumlah_transaksi) * 100; ?>
                                                <?php $supportX = ($this->M_data->count_itemset1($transaksi, $item[0]['idproduk']) / $jumlah_transaksi) * 100; ?>
                                                <?php $confidence = ($support / $supportX) * 100; ?>
                                                <tr>
                                                    <td class="text-center"><?= $nomor++ ?></td>
                                                    <td><?= $item[0]['namaperumahan'] ?></td>
                                                    <td><?= $item[1]['namaperumahan'] ?></td>
                                                    <td><?= $items['namaperumahan'] ?></td>
                                                    <td class="text-center"><?= $jumlah ?></td>
                                                    <td class="text-center"><?= number_format($support, 2, ',', '.') ?></td>
                                                    <td class="text-center"><?= number_format($supportX, 2, ',', '.') ?></td>
                                                    <td class="text-center"><?= number_format($confidence, 2, ',', '.') ?></td>
                                                    <td class="text-center"><?= $support >= $min_support ? 'Lolos' : 'Tidak Lolos'  ?></td>
                                                    <td class="text-center"><?= $confidence >= $min_confidence ? 'Lolos' : 'Tidak Lolos'  ?></td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>