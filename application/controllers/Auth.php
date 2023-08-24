<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data['web']		= $this->db->get('config')->row();
		$data['title']		= $data['web']->nama;
		$data['body']		= 'login';
		$this->load->view('auth/auth', $data);
	}

	public function aksi_login()
	{
		$data = [
			'email'		=> $this->input->post('email'),
			'password'	=> md5($this->input->post('password'))
		];
		$cek = $this->db->get_where('user', $data);

		if ($cek->num_rows() > 0) {

			$p = $cek->row_array();
			if ($p['aktif'] == 'Y') {
				$this->session->set_userdata($p);
				if ($p['role'] == 'pembeli') {
					redirect(base_url());
				} else if ($p['role'] == 'admin' || $p['role'] == 'adminsuper') {
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', 'swal("Ops!", "User tidak ditemukan", "error");');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'swal("Ops!", "User anda belum aktif atau di blokir oleh admin", "error");');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'swal("Ops!", "Username / password salah", "error");');
			redirect('auth');
		}
	}
	public function register()
	{
		$data['web']		= $this->db->get('config')->row();
		$data['title']		= $data['web']->nama;
		$data['body']		= 'registrasi';
		$this->load->view('front/template', $data);
	}
	public function aksi_registrasi()
	{

		$data = [
			'nama'		=> $this->input->post('nama'),
			'email'		=> $this->input->post('email'),
			'notelp'	=> $this->input->post('nohp'),
			'password'	=> md5($this->input->post('password')),
			'role'		=> 'pembeli',
			'aktif'		=> 'Y'
		];

		//cek apakah email sudah terdaftar atau belum
		$cek = $this->db->get_where('user', ['email' => $data['email']])->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('message', 'swal("Ops!", "Email sudah terdaftar", "error");');
			redirect('auth/register');
		}
		$this->db->insert('user', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Silahkan login untuk melanjutkan", "success");');
		redirect('auth');
	}
	public function logout()
	{
		session_destroy();
		redirect('auth');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */