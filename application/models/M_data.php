<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->web = $this->db->get('config')->row();
	}

	public function produk_terbaru()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.idkategori = kategori.idkategori');
		$this->db->where('produk.status', 'Y');
		$this->db->order_by('produk.idproduk', 'desc');
		$this->db->limit(6);
		return $this->db->get();
	}

	public function berita_terbaru()
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->order_by('artikel.idartikel', 'desc');
		$this->db->where('artikel.status', 'aktif');
		$this->db->limit(6);
		return $this->db->get();
	}

	public function produk_all()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.idkategori = kategori.idkategori');
		$this->db->where('produk.status', 'Y');
		$this->db->order_by('produk.idproduk', 'desc');
		return $this->db->get();
	}

	public function produk_detail($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.idkategori = kategori.idkategori');
		$this->db->where('produk.idproduk', $id);
		return $this->db->get();
	}
	public function artikel_all()
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->order_by('artikel.idartikel', 'desc');
		return $this->db->get();
	}
	public function artikel_detail($slug)
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->where('artikel.slug', $slug);
		return $this->db->get();
	}
	//rajaongkir
	public function provinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: " . $this->web->rajaongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
	}
	public function kota($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/city?id&province=" . $id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: " . $this->web->rajaongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
	}
	public function kecamatan($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=" . $id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: " . $this->web->rajaongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
	}
	public function cost($dest, $weight, $kurir)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $this->web->origin . "&originType=subdistrict&destination=" . $dest . "&destinationType=subdistrict&weight=" . $weight . "&courier=" . $kurir,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: " . $this->web->rajaongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		return $response;
	}

	public function kode_transaksi()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(idorder,6)) AS kd_max FROM transaksi");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%06s", $tmp);
			}
		} else {
			$kd = "000001";
		}
		return 'O' . $kd;
	}

	public function cart_user($id)
	{
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->join('produk', 'cart.idproduk = produk.idproduk');
		$this->db->where('cart.idpembeli', $id);
		$this->db->order_by('cart.idcart', 'desc');
		return $this->db->get();
	}

	public function transaksi_user($id)
	{
		$this->db->select('transaksi.*, produk.*, SUM(transaksi_list.total) AS total_harga');
		$this->db->from('transaksi');
		$this->db->join('transaksi_list', 'transaksi.idtransaksi = transaksi_list.idtransaksi');
		$this->db->join('produk', 'transaksi_list.idproduk = produk.idproduk');
		$this->db->where('transaksi.idpembeli', $id);
		$this->db->order_by('transaksi.idtransaksi', 'desc');
		$this->db->group_by('transaksi.idtransaksi');
		return $this->db->get();
	}

	public function transaksiall()
	{
		$this->db->select('transaksi.*, user.*');
		$this->db->from('transaksi');
		$this->db->join('user', 'transaksi.idpembeli = user.userid');
		$this->db->order_by('transaksi.idtransaksi', 'desc');
		return $this->db->get();
	}

	public function listtransaksi_detail($id)
	{
		$this->db->select('*');
		$this->db->from('detailorder');
		$this->db->join('produk', 'detailorder.idproduk = produk.idproduk');
		$this->db->join('kategori', 'produk.idkategori = kategori.idkategori');
		$this->db->where('detailorder.orderid', $id);
		return $this->db->get();
	}

	public function pesan($id)
	{
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->where('pesan.pengirim', $id);
		$this->db->or_where('pesan.penerima', $id);
		$this->db->order_by('idpesan', 'asc');
		return $this->db->get();
	}

	public function count_itemset1($listTransaksi, $item1)
	{
		$count = 0;

		foreach ($listTransaksi as $transaksi) {
			$list = array_column($transaksi, 'idproduk');

			if (in_array($item1, $list) === true) {
				$count++;
			}
		}

		return $count;
	}

	public function check_if_exist_itemset2($listId, $id1, $id2)
	{
		$hasValues = false;

		// if (count($listId) > 0) {
		// 	foreach ($listId as $subArray) {
		// 		if (in_array($id1, $subArray) && in_array($id2, $subArray)) {
		// 			$hasValues = true;
		// 			break;
		// 		}
		// 	}
		// }

		return $hasValues;
	}

	public function count_itemset2($listTransaksi, $item1, $item2)
	{
		$count = 0;

		foreach ($listTransaksi as $transaksi) {
			$list = array_column($transaksi, 'idproduk');

			if (in_array($item1, $list) === true && in_array($item2, $list) === true) {
				$count++;
			}
		}

		return $count;
	}

	public function count_itemset3($listTransaksi, $item1, $item2, $item3)
	{
		$count = 0;

		foreach ($listTransaksi as $transaksi) {
			$list = array_column($transaksi, 'idproduk');

			if (in_array($item1, $list) === true && in_array($item2, $list) === true && in_array($item3, $list) === true) {
				$count++;
			}
		}

		return $count;
	}
}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */