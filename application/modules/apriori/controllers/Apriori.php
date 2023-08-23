<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Apriori extends MY_Controller
{

	public function __construct()
	{
		if (!$this->session->userdata('role')) {
			redirect('auth');
		}
		if ($this->session->userdata('role')) {
			$this->db->select('*');
			$this->db->from('user_access');
			$this->db->join('user_submenu', 'user_access.id_menu=user_submenu.id_menu', 'inner');
			$this->db->where('user_access.id_role', $this->session->userdata('role'));
			$this->db->where('user_submenu.url', 'role');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('Apri_model', 'model');
	}

	public function upload()
	{
		$data = [
			'title' => 'Apriori'
		];
		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('upload', $data);
	}
	public function upload_proses()
	{
		if ($_FILES['file_upload']['name']) {
			$config['upload_path'] = './uploads/'; // Specify the path to store uploaded files
			$config['allowed_types'] = 'csv|xls|xlsx'; // Only allow XLSX files
			$config['max_size'] = 2048; // Maximum file size in kilobytes
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file_upload')) {
				// File upload failed, display error message
				$error = $this->upload->display_errors();
				echo json_encode(['status' => false, 'pesan' => strip_tags($error)]);
			} else {
				// File uploaded successfully, process the data
				$fileInfo = $this->upload->data();
				$filePath = $fileInfo['full_path'];
				$outputapri = $this->extractDataFromExcel($filePath);
				echo json_encode(['status' => true, 'pesan' => "Data berhasil di upload"]);
				// $this->session->set_flashdata('success', 'Data berhasil diupload!');
				// $data['list_item'] = $outputapri;
			}
		}
	}
	public function proses()
	{
		$data = [
			'title' => 'Apriori'
		];
		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js_proses', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('proses', $data);
	}
	public function hasil()
	{
		$data = [
			'title' => 'Apriori'
		];
		$this->load->view('_layout/admin/head', $data);
		$this->load->view('core/js', $data);
		$this->load->view('core/modals', $data);
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();

		// Fetch member's records
		$role = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($role as $d) {
			$i++;
			$data[] = array($d->id, $d->transaction_date, $d->produk);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model->countAll(),
			"recordsFiltered" => $this->model->countFiltered($_POST),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function aksi()
	{
		if ($_POST['aksi'] == 'tambah') {
			$data = $this->model->tambah();
			echo json_encode($data);
		} else if ($_POST['aksi'] == 'edit') {
			$data = $this->model->edit();
			echo json_encode($data);
		} else if ($_POST['aksi'] == 'hapus') {
			$data = $this->model->hapus();
			echo json_encode($data);
		}
	}
	private function extractDataFromExcel($filePath)
	{
		$spreadsheet = IOFactory::load($filePath);
		$worksheet = $spreadsheet->getActiveSheet();
		$data = $worksheet->toArray();
		for ($i = 1; $i < count($data); $i++) {
			$datanew = [
				'transaction_date' => date('Y-m-d', strtotime($data[$i][0])),
				'produk' => $data[$i][1]
			];
			$datanewraw[] = [
				'transaction_date' => date('Y-m-d', strtotime($data[$i][0])),
				'produk' => $data[$i][1]
			];
			$this->db->insert('transaksi_apri', $datanew);
		}
		return $datanewraw;
	}
}
