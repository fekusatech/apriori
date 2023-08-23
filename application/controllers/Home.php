<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		$this->load->model('MData');
		$this->data = $this->db->get('config')->row();
	}

	public function index()
	{
		$data['web']		= $this->data;
		$data['title']		= $data['web']->nama;
		$data['terbaru']	= $this->M_data->produk_terbaru()->result();
		$data['berita']		= $this->M_data->berita_terbaru()->result();
		$data['slider']		= $this->MData->selectdataglobal2('slider');
		$data['body']		= 'front/page/home';
		$this->load->view('front/template', $data);
	}
	public function about()
	{
		$data['web']		= $this->data;
		$data['title']		= 'About Me';
		$data['body']		= 'front/page/about';
		$this->load->view('front/template', $data);
	}
	public function k()
	{
		$data['web']		= $this->data;
		$data['title']		= 'About Me';
		$data['body']		= 'front/page/keluhan';
		if($this->input->post()){
			$data = [
				'judul'		=> $this->input->post('judul'),
				'isi'		=> $this->input->post('isi'),
				'created_by'		=> $this->input->post('created_by'),
			];
			$this->db->insert('keluhan', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Terima kasih atas masukan anda", "success");');
			redirect('keluhan');
		}
		$this->load->view('front/template', $data);
	}
	public function cekvalid(){
	    if($this->input->post()){
	        $date = $_POST['date'];
	        $id = $_POST['id'];
	        $query = "SELECT * FROM transaksi_list inner join transaksi on transaksi_list.idtransaksi = transaksi.idtransaksi where idproduk = {$id} and transaksi.statustransaksi not in ('ditolak') and '{$date}' BETWEEN waktu_order AND waktu_order_berakhir";
	        $cekdata = $this->MData->customrow($query);
	        if($cekdata == false){
	            //cek di cart 
	            $cekcart = $this->MData->customrow("SELECT *from cart where idproduk = {$id} AND '{$date}' BETWEEN waktu_order AND waktu_order_berakhir");
	            if($cekcart == false){
	                echo json_encode(['status'=>true,'message'=>'Siap']);
	            }else{
                    echo json_encode(['status'=>false,'message'=>'Tanggal dan Jam ini sudah di book']);
	            }
	        }else{
	            echo json_encode(['status'=>false,'message'=>'Tanggal dan Jam ini sudah di book']);
	        }
	    }
	}
	public function b($id = null)
	{
		if ($id) {
			$data['web']	= $this->data;
			$data['idgedung']	= $id;
			$data['title']	= $data['web']->nama;
			$data['data']	= $this->M_data->produk_detail($id)->row();
			$data['cekpromo'] = $this->MData->selectdatawhere('promo',['id_product'=>$id]);
			$data['body']	= 'front/page/detail';
			$this->load->view('front/template', $data);
		} else {
			$data['web']	= $this->data;
			$data['title']	= $data['web']->nama;
			$data['data']	= $this->M_data->produk_all()->result();
			$data['body']	= 'front/page/properti';
			$this->load->view('front/template', $data);
		}
	}
	public function a($slug = null)
	{
		if ($slug) {
			$data['web']	= $this->data;
			$data['title']	= $data['web']->nama;
			$data['data']	= $this->M_data->artikel_detail($slug)->row();
			$data['body']	= 'front/page/artikel_single';
			$this->load->view('front/template', $data);
		} else {
			$data['web']	= $this->data;
			$data['title']	= $data['web']->nama;
			$data['data']	= $this->M_data->artikel_all()->result();
			$data['body']	= 'front/page/artikel';
			$this->load->view('front/template', $data);
		}
	}

	public function cart($id = null)
	{
		if ($id) {
			if ($this->session->userdata('role') != 'pembeli') {
				$this->session->set_flashdata('message', 'swal("Ops!", "Anda harus login dulu", "info");');
				redirect('auth');
			}

			$cek = $this->db->get_where('produk', ['idproduk' => $id])->row();

			$data = [
				'idproduk'		=> $id,
				'idpembeli'		=> $this->session->userdata('userid'),
			];

			if ($p = $this->input->post()) {
			    $waktu_order_berakhir = date("Y-m-d H:i:s", strtotime($p['waktu_order'] . " +{$p['totaljam']} hours"));
				$data['waktu_order']	= $p['waktu_order'];
				$data['durasi']	= $p['lama'];
				// $data['total']	= $cek->harga * $data['durasi'];
				$data['total']	=  $p['totalnya'];
				$data['totaldurasi']	=  $p['totaljam'];
				$data['waktu_order_berakhir']	=  $waktu_order_berakhir;
				
			} else {
				$data['durasi']	= 0;
				$data['total']	= $cek->harga;
			}
			$this->db->insert('cart', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Selanjutnya Anda perlu ke menu keranjang untuk menyewa gedung ini", "success");');
			redirect('cart');
		} else {
			$data['data']		= $this->M_data->cart_user($this->session->userdata('userid'))->result();
			$data['web']		= $this->data;
			$data['title']		= 'Data Transaksi ' . $this->session->userdata('nama');
			$data['body']		= 'front/page/cart';
			$this->load->view('front/template', $data);
		}
	}

	public function cart_process()
	{
		if ($this->session->userdata('role') != 'pembeli') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda harus login dulu", "info");');
			redirect('auth');
		}

		$listCart = $this->db->get_where('cart', [
			'idpembeli' => $this->session->userdata('userid')
		])->result_array();

		if ($listCart !== null && count($listCart) > 0) {
			$idtransaksi = 'T' . date('YmdHis');
			$data = [
				'idtransaksi'	=> $idtransaksi,
				'idpembeli'		=> $this->session->userdata('userid'),
				'waktu'			=> date('Y-m-d H:i:s')
			];
			$this->db->insert('transaksi', $data);
			foreach ($listCart as $cart) {
			    $waktu_order_berakhir = date("Y-m-d H:i:s", strtotime($cart['waktu_order'] . " +{$cart['totaldurasi']} hours"));
				$this->db->insert('transaksi_list', [
					'idtransaksi' => $idtransaksi,
					'idproduk' => $cart['idproduk'],
					'waktu_order' => $cart['waktu_order'],
					'waktu_order_berakhir' => $waktu_order_berakhir,
					'totaldurasi' => $cart['totaldurasi'],
					'durasi' => $cart['durasi'],
					'total' => $cart['total'],
				]);	
				// $this->db->update('produk', ['status' => 'T'], ['idproduk' => $cart['idproduk']]);
			}

			$this->db->delete('cart', ['idpembeli' => $this->session->userdata('userid')]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Selanjutnya untuk untuk admin memverifikasi", "success");');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('message', 'swal("Gagal!", "Silahkan pilih gedung untuk disewa", "error");');
			redirect('cart');
		}
	}

	public function cart_batal($id)
	{
		if ($this->session->userdata('role') != 'pembeli') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda harus login dulu", "info");');
			redirect('auth');
		}

		$this->db->delete('cart', [
			'idcart' => $id,
			'idpembeli' => $this->session->userdata('userid')
		]);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Penyewaan gedung telah dibatalkan dari keranjang", "success");');
		} else {
			$this->session->set_flashdata('message', 'swal("Gagal!", "Tidak ada penyewaan gedung yang dibatalkan dari keranjang", "error");');
		}

		redirect('cart');
	}

	public function transaksi($id = null)
	{
		if ($id !== null) {
			$data['data']		= $this->db->select('*')
				->from('transaksi_list')
				->join('transaksi', 'transaksi_list.idtransaksi = transaksi.idtransaksi')
				->join('produk', 'transaksi_list.idproduk = produk.idproduk')
				->where('transaksi_list.idtransaksi', $id)
				->where('transaksi.idpembeli', $this->session->userdata('userid'))
				->get()
				->result();
			$data['idtransaksi'] = $id;
			$data['web']		= $this->data;
			$data['title']		= 'Data Transaksi ' . $this->session->userdata('nama');
			$data['body']		= 'front/page/transaksi_info';
			$this->load->view('front/template', $data);
		} else {
			$data['data']		= $this->M_data->transaksi_user($this->session->userdata('userid'))->result();
			$data['web']		= $this->data;
			$data['title']		= 'Data Transaksi ' . $this->session->userdata('nama');
			$data['body']		= 'front/page/transaksi';
			$this->load->view('front/template', $data);
		}
	}

	public function transaksi_batal($id, $produk)
	{
		$this->db->delete('transaksi', ['idtransaksi' => $id]);
		$this->db->update('produk', ['status' => 'Y'], ['idproduk' => $produk]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Membatalkan pesanan, transaksi dihapus", "success");');
		redirect('transaksi');
	}
	public function uploadbukti($id)
	{
		$config['upload_path'] = './assets/img/bukti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|gimp';
		$config['file_name']  = $id;
		$config['overwrite']  = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('message', 'swal("Ops!", "Bukti gagal diupload!", "error");');
			redirect('transaksi');
		} else {
			$file =  $this->upload->data();
			$data = [
				'bukti'		=> $file['file_name'],
				'idorder'	=> $id
			];
			$this->db->trans_start();
			$this->db->insert('bukti', $data);
			$this->db->update('transaksi', ['status' => 'dibayar'], ['idorder' => $id]);
			$this->db->trans_complete();
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Bukti berhasil diupload", "success");');
			redirect('transaksi');
		}
	}


	public function profile()
	{
		$data['data']		= $this->db->get_where('user', ['userid' => $this->session->userdata('userid')])->row();
		$data['web']		= $this->data;
		$data['title']		= 'Profile user';
		$data['body']		= 'front/page/profile';
		$this->load->view('front/template', $data);
	}
	public function update_profile($id)
	{
		$data = [
			'nama'		=> $this->input->post('nama'),
			'email'		=> $this->input->post('email'),
			'notelp'	=> $this->input->post('notelp'),
		];
		if ($this->input->post('password') != '') {
			$data['password'] = md5($this->input->post('password'));
		}
		$this->db->update('user', $data, ['userid' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Ubah profile", "success");');
		redirect('profile');
	}
	public function pembayaran($id)
	{
		if ($id) {
		    if($this->input->post()){
        		$data = [
        			'statustransaksi'    => "menunggu",
        		];
        	    if ($_FILES['buktibayar']['name'] != '') {
                    $config['upload_path'] 		= './assets/img/';
                    $config['allowed_types'] 	= 'gif|jpg|png|jpeg|gimp';
                    $config['file_name']  		= 'buktibayar-' .$_FILES['buktibayar']['name'];
                    $config['overwrite']  		= true;
        
                    $this->load->library('upload', $config);
        
                    if ($this->upload->do_upload('buktibayar')) {
                     $file = $this->upload->data();
                     $data['buktibayar'] = $file['file_name'];
                    }
        		}		
        		$this->db->update('transaksi', $data, ['idtransaksi' => $this->input->post('id')]);
        		$this->session->set_flashdata('message', 'swal("Berhasil!", "Terima kasih telah melakukan transaksi dengan kami. Kami akan menginfokan anda segera", "success");');
        		redirect(base_url('transaksi'));
		    }
			$data['web']	= $this->data;
			$data['title']	= "Pembayaran";
			$data['id'] = $id;
			$data['transaksi'] = $this->MData->selectdatawhere('transaksi_list',['idtransaksi' =>$id]);
			$data['body']	= 'front/page/pembayaran';
			$this->load->view('front/template', $data);
		} else {
			redirect(base_url());
		}
	}
}
