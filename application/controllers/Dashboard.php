<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'adminsuper') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda belum login, anda tidak bisa mengakses halaman ini", "error");');
			redirect('auth');
		}

		$this->load->model('M_data');
		$this->load->model('MData');
		$this->load->model('M_admin');
		$this->data 	= $this->db->get('config')->row();
	}

	public function index()
	{
		$data['web']	= $this->data;
		$data['title']	= 'Dashboard';
		$data['body']	= 'back/home';
		$this->load->view('back/template', $data);
	}
	public function promosi()
	{
		$data['data']	= $this->MData->selectdataglobal2('promo');
		$data['web']	= $this->data;
		$data['title']	= 'Promosi Produk';
		$data['body']	= 'back/promosi';
		$data['MData'] = $this->MData;
		$this->load->view('back/template', $data);
	}
	public function promosi_add()
	{
		if ($this->input->post()) {

			$data = [
				'name'			=> $this->input->post('name'),
				'id_product'	=> $this->input->post('id_product'),
				'keterangan'	=> $this->input->post('keterangan'),
				'diskon'	    => $this->input->post('diskon'),
				'minim_order'	=> $this->input->post('minim_order')
			];


			$this->db->insert('promo', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah promo", "success");');
			redirect('dashboard/promosi');
		} else {
			$data['kat']	= $this->db->get('kategori')->result();
			$data['web']	= $this->data;
			$data['title']	= 'Tambah Promosi';
			$data['produklist']	= $this->MData->selectdatawhereresult('produk', ['status' => 'Y'], 'idproduk');
			$data['body']	= 'back/promosi_add';
			$data['MData']	= $this->MData;
			$this->load->view('back/template', $data);
		}
	}
	public function promosi_delete($id)
	{
		$this->db->delete('promo', ['id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus penyewaan gedung", "success");');
		redirect('dashboard/promosi');
	}
	public function produk()
	{
		$data['data']	= $this->M_admin->produk_all()->result();

		$data['web']	= $this->data;
		$data['title']	= 'Penyewaan Gedung';
		$data['body']	= 'back/produk';
		$this->load->view('back/template', $data);
	}
	public function produk_add()
	{
		if ($this->input->post()) {

			$data = [
				'namaperumahan'			=> $this->input->post('produk'),
				'contact_hp'			=> $this->input->post('contact_hp'),
				'idkategori'			=> $this->input->post('kategori'),
				'deskripsi'				=> $this->input->post('desk'),
				'alamat'				=> $this->input->post('alamat'),
				'luas'					=> $this->input->post('luas'),
				'harga'					=> $this->input->post('harga'),
				'embed'					=> $this->input->post('embed'),
				'status'				=> $this->input->post('status')
			];
			if ($_FILES['file']['name'] != '') {
				$config['upload_path'] 		= './assets/img/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
				$config['file_name']  		= 'penyewaan-' . rand();
				$config['overwrite']  		= true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$file = $this->upload->data();
					$data['gambar'] = $file['file_name'];
				} else {
					$this->session->set_flashdata('message', 'swal("Ops!", "Gambar penyewaan gedung gagal diupload", "warning");');
					redirect('dashboard/produk_add');
				}
			}
			$this->db->insert('produk', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah penyewaan gedung", "success");');
			redirect('dashboard/produk');
		} else {
			$data['kat']	= $this->db->get('kategori')->result();
			$data['web']	= $this->data;
			$data['title']	= 'Tambah Penyewaan Gedung';
			$data['body']	= 'back/produk_add';
			$this->load->view('back/template', $data);
		}
	}
	public function produk_edit($id)
	{
		if ($this->input->post()) {

			$data = [
				'namaperumahan'			=> $this->input->post('produk'),
				'contact_hp'			=> $this->input->post('contact_hp'),
				'idkategori'			=> $this->input->post('kategori'),
				'deskripsi'				=> $this->input->post('desk'),
				'alamat'				=> $this->input->post('alamat'),
				'luas'					=> $this->input->post('luas'),
				'harga'					=> $this->input->post('harga'),
				'embed'					=> $this->input->post('embed'),
				'status'				=> $this->input->post('status')
			];
			if ($_FILES['file']['name'] != '') {
				$config['upload_path'] 		= './assets/img/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
				$config['file_name']  		= 'burung-' . $id;
				$config['overwrite']  		= true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$file = $this->upload->data();
					$data['gambar'] = $file['file_name'];
				}
			}
			$this->db->update('produk', $data, ['idproduk' => $id]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah penyewaan gedung", "success");');
			redirect('dashboard/produk');
		} else {
			$data['kat']	= $this->db->get('kategori')->result();
			$data['data']	= $this->db->get_where('produk', ['idproduk' => $id])->row();
			$data['web']	= $this->data;
			$data['title']	= 'Update Penyewaan Gedung';
			$data['body']	= 'back/produk_edit';
			$this->load->view('back/template', $data);
		}
	}
	public function produk_delete($id)
	{
		$this->db->delete('produk', ['idproduk' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus penyewaan gedung", "success");');
		redirect('dashboard/produk');
	}

	public function kategori()
	{

		$data['data']	= $this->db->get('kategori')->result();
		$data['web']	= $this->data;
		$data['title']	= 'Kategori';
		$data['body']	= 'back/kategori';
		$this->load->view('back/template', $data);
	}

	public function kategori_add()
	{
		if ($this->input->post()) {

			$data = [
				'kategori'	=> ucwords($this->input->post('nama')),
				'durasi'	=> ucwords($this->input->post('durasi')),
			];
			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah kategori", "success");');
			redirect('dashboard/kategori');
		} else {
			$data['web']	= $this->data;
			$data['title']	= 'Tambah Kategori';
			$data['body']	= 'back/kategori_add';
			$this->load->view('back/template', $data);
		}
	}

	public function kategori_edit($id)
	{
		if ($this->input->post()) {

			$data = [
				'kategori'	=> ucwords($this->input->post('nama')),
				'durasi'	=> ucwords($this->input->post('durasi')),
			];
			$this->db->update('kategori', $data, ['idkategori' => $id]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah kategori", "success");');
			redirect('dashboard/kategori');
		} else {
			$data['data']	= $this->db->get_where('kategori', ['idkategori' => $id])->row();
			$data['web']	= $this->data;
			$data['title']	= 'Ubah Kategori';
			$data['body']	= 'back/kategori_edit';
			$this->load->view('back/template', $data);
		}
	}
	public function kategori_delete($id)
	{
		$this->db->delete('kategori', ['idkategori' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus kategori", "success");');
		redirect('dashboard/kategori');
	}
	public function config()
	{
		$data['user']	= $this->db->get('user')->row();
		$data['data']	= $this->db->get('config')->row();
		$data['web']	= $this->data;
		$data['title']	= 'Pengaturan Website';
		$data['body']	= 'back/config';
		$this->load->view('back/template', $data);
	}
	public function config_edit($id)
	{
		$data = [
			'nama'			=> $this->input->post('nama'),
			'nohp'			=> $this->input->post('wa'),
			'alamat'		=> $this->input->post('alamat'),
			'email'			=> $this->input->post('email'),
			'no_rek'			=> $this->input->post('no_rek'),
			'pemilik_rek'			=> $this->input->post('pemilik_rek'),
			'bank_rek'			=> $this->input->post('bank_rek'),
		];
	    if ($_FILES['foto_rek']['name'] != '') {
            $config['upload_path'] 		= './assets/img/';
            $config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
            $config['file_name']  		= 'rekening-' . $this->input->post('bank_rek');
            $config['overwrite']  		= true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_rek')) {
             $file = $this->upload->data();
             $data['foto_rek'] = $file['file_name'];
            }else{
                echo "error"; exit;
            }
		}		
		$this->db->update('config', $data, ['id_config' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah Pengaturan Website", "success");');
		redirect('dashboard/config');
	}

	public function user()
	{
		$data['data']	= $this->M_admin->user()->result();
		$data['web']	= $this->data;
		$data['title']	= 'Manajemen User';
		$data['body']	= 'back/user';
		$this->load->view('back/template', $data);
	}
	public function user_blokir($id)
	{
		$this->db->update('user', ['aktif' => 'T'], ['userid' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus pengguna", "success");');
		redirect('dashboard/user');
	}
	public function user_aktif($id)
	{
		$this->db->update('user', ['aktif' => 'Y'], ['userid' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus pengguna", "success");');
		redirect('dashboard/user');
	}
	public function artikel()
	{

		$data['data']	= $this->M_admin->artikel()->result();
		$data['web']	= $this->data;
		$data['title']	= 'Artikel';
		$data['body']	= 'back/artikel';
		$this->load->view('back/template', $data);
	}
	public function artikel_add()
	{
		if ($this->input->post()) {

			$data = [
				'judul'	=> ucwords($this->input->post('judul')),
				'slug'	=> strtolower(url_title($this->input->post('judul'), 'dash', true)),
				'isi'	=> $this->input->post('isi'),
			];

			$config['upload_path'] 		= './assets/img/artikel/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
			$config['file_name']		= $data['slug'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('cover')) {
				$file = $this->upload->data();
				$data['cover']	= $file['file_name'];
			}

			$this->db->insert('artikel', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah artikel", "success");');
			redirect('dashboard/artikel');
		} else {
			$data['web']	= $this->data;
			$data['title']	= 'Tambah artikel';
			$data['body']	= 'back/artikel_add';
			$this->load->view('back/template', $data);
		}
	}
	public function artikel_edit($id)
	{
		if ($this->input->post()) {

			$data = [
				'judul'	=> ucwords($this->input->post('judul')),
				'slug'	=> strtolower(url_title($this->input->post('judul'), 'dash', true)),
				'isi'	=> $this->input->post('isi'),
			];

			$config['upload_path'] 		= './assets/img/artikel/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
			$config['file_name']		= $data['slug'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('cover')) {
				$file = $this->upload->data();
				$data['cover']	= $file['file_name'];
			}

			$this->db->update('artikel', $data, ['idartikel' => $id]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah artikel", "success");');
			redirect('dashboard/artikel');
		} else {
			$data['data']	= $this->db->get_where('artikel', ['idartikel' => $id])->row();
			$data['web']	= $this->data;
			$data['title']	= 'Update artikel';
			$data['body']	= 'back/artikel_edit';
			$this->load->view('back/template', $data);
		}
	}
	public function artikel_delete($id)
	{
		$this->db->delete('artikel', ['idartikel' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus artikel", "success");');
		redirect('dashboard/artikel');
	}
	public function transaksi()
	{
		$data['data']	= $this->M_data->transaksiall()->result();
		$data['web']	= $this->data;
		$data['title']	= 'Transaksi';
		$data['body']	= 'back/transaksi';
		$this->load->view('back/template', $data);
	}

	public function transaksi_info($id)
	{
		$data['data']	= $this->db->select('transaksi_list.*, produk.namaperumahan, kategori.durasi AS durasi_produk, produk.harga')
			->from('transaksi_list')
			->join('produk', 'transaksi_list.idproduk = produk.idproduk')
			->join('kategori', 'produk.idkategori = kategori.idkategori')
			->where('transaksi_list.idtransaksi', $id)
			->get()
			->result();
		$data['idtransaksi'] = $id;
		$data['web']	= $this->data;
		$data['title']	= 'Transaksi';
		$data['body']	= 'back/transaksi_info';
		$this->load->view('back/template', $data);
	}

	public function transaksiterima($id)
	{
		$this->db->update('transaksi', ['statustransaksi' => 'diterima'], ['idtransaksi' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menerima pesanan, Status diubah", "success");');
		redirect('dashboard/transaksi');
	}
	public function transaksitolak($id)
	{
		$this->db->update('transaksi', ['statustransaksi' => 'ditolak'], ['idtransaksi' => $id]);
		$cek = $this->db->get_where('transaksi', ['idtransaksi' => $id])->row();
// 		$this->db->update('produk', ['status' => 'Y'], ['idproduk' => $cek->idproduk]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menolak pesanan, Status diubah", "success");');
		redirect('dashboard/transaksi');
	}

	public function apriori()
	{
		$data['web']	= $this->data;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data['min_support'] = $this->input->post('min_support');
			$data['tanggal_mulai'] = $this->input->post('tanggal_mulai');
			$data['tanggal_selesai'] = $this->input->post('tanggal_selesai');
			$jumlahTransaksi = $this->db->query("SELECT COUNT(idtransaksi) AS jumlah FROM transaksi WHERE DATE(waktu) BETWEEN '" . $data['tanggal_mulai'] . "' AND '" . $data['tanggal_selesai'] . "'")->row_array()['jumlah'] ?? 0;
			$data['list_item'] = $this->db->select('transaksi_list.idtransaksi, produk.idproduk, produk.namaperumahan')
				->from('transaksi_list')
				->join('transaksi', 'transaksi_list.idtransaksi = transaksi.idtransaksi')
				->join('produk', 'transaksi_list.idproduk = produk.idproduk')
				->where("DATE(waktu) BETWEEN '" . $data['tanggal_mulai'] . "' AND '" . $data['tanggal_selesai'] . "'", NULL, FALSE)
				->order_by('transaksi_list.idtransaksi')
				->get()
				->result_array();
			$data['transaksi'] = [];

			foreach ($data['list_item'] as $item) {
				if (!(isset($data['transaksi'][$item['idtransaksi']]))) {
					$data['transaksi'][$item['idtransaksi']] = [];
				}

				$data['transaksi'][$item['idtransaksi']][] = $item;
			}

			$data['jumlah_transaksi'] = $jumlahTransaksi;
			$data['min_support_relatif'] = (int) $data['min_support'] !== 0 && (int) $jumlahTransaksi !== 0 ? (($data['min_support'] / $jumlahTransaksi) * 100) : 0;
			$data['min_confidence'] = $this->input->post('min_confidence');
			$data['body']	= 'back/apriori_process';
		} else {
			$data['body']	= 'back/apriori';
		}

		$data['title']	= 'Apriori';
		$this->load->view('back/template', $data);
	}

	public function data()
	{
		$data['data']	= $this->M_admin->data_x()->result();

		$data['web']	= $this->data;
		$data['title']	= 'Data Proses Apriori ';
		$data['body']	= 'back/data';
		$this->load->view('back/template', $data);
	}

	public function data_tambah()
	{
		if ($this->input->post()) {

			$data = [
				'data_tanggal'	=> $this->input->post('tanggal'),
				'data_keterangan'	=> $this->input->post('keterangan')
			];

			$this->db->insert('data', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data", "success");');
			redirect('dashboard/data');
		} else {
			$data['web']	= $this->data;
			$data['title']	= 'Tambah artikel';
			$data['body']	= 'back/data_add';
			$this->load->view('back/template', $data);
		}
	}

	public function data_edit($id)
	{
		if ($this->input->post()) {

			$data = [
				'data_tanggal'			=> $this->input->post('tanggal'),
				'data_keterangan'			=> $this->input->post('keterangan')
			];

			$this->db->update('data', $data, ['data_id' => $id]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah Data ", "success");');
			redirect('dashboard/data');
		} else {
			$data['id']	= $this->db->get('data')->result();
			$data['data']	= $this->db->get_where('data', ['data_id' => $id])->row();
			$data['web']	= $this->data;
			$data['title']	= 'Update Data';
			$data['body']	= 'back/data_edit';
			$this->load->view('back/template', $data);
		}
	}
	public function data_delete($id)
	{
		$this->db->delete('data', ['data_id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus data", "success");');
		redirect('dashboard/data');
	}

	public function slider()
	{
		$data['data']	= $this->MData->selectdataglobal2('slider');
		$data['web']	= $this->data;
		$data['title']	= 'Slider';
		$data['body']	= 'back/slider';
		$this->load->view('back/template', $data);
	}
	public function slider_add()
	{
		if ($this->input->post()) {

			$data = [
				'text1'	=> ucwords($this->input->post('text1')),
				'text2'	=> ucwords($this->input->post('text2')),
			];

			$config['upload_path'] 		= './assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
			// $config['file_name']		= $data['slug'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$file = $this->upload->data();
				$data['image']	= $file['file_name'];
			}

			$this->db->insert('slider', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah artikel", "success");');
			redirect('dashboard/slider');
		} else {
			$data['web']	= $this->data;
			$data['title']	= 'Tambah Slider';
			$data['body']	= 'back/slider_add';
			$this->load->view('back/template', $data);
		}
	}
	public function slider_delete($id)
	{
		$this->db->delete('slider', ['id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus slider", "success");');
		redirect('dashboard/slider');
	}
	public function slider_edit($id)
	{
		if ($this->input->post()) {

			$data = [
				'text1'	=> ucwords($this->input->post('text1')),
				'text2'	=> ucwords($this->input->post('text2')),
			];

			$config['upload_path'] 		= './assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
			// $config['file_name']		= $data['slug'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$file = $this->upload->data();
				$data['image']	= $file['file_name'];
			}

			$this->db->update('slider', $data, ['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah slider", "success");');
			redirect('dashboard/slider');
		} else {
			$data['data']	= $this->db->get_where('slider', ['id' => $id])->row();
			$data['web']	= $this->data;
			$data['title']	= 'Update slider';
			$data['body']	= 'back/slider_edit';
			$this->load->view('back/template', $data);
		}
	}
	public function keluhan()
	{
		$data['data']	= $this->MData->selectdataglobal2('keluhan');
		$data['web']	= $this->data;
		$data['title']	= 'Keluhan';
		$data['body']	= 'back/keluhan';
		$this->load->view('back/template', $data);
	}

	public function keluhan_delete($id)
	{
		$this->db->delete('keluhan', ['id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Hapus Keluhan", "success");');
		redirect('dashboard/keluhan');
	}
}
