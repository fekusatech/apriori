<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function produk_all()
	{
		$this->db->select("produk.*, CASE status WHEN 'Y' THEN 'Aktif' WHEN 'T' THEN 'Tidak Aktif' END AS status, kategori.durasi");
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.idkategori = kategori.idKategori');
		$this->db->order_by('produk.idproduk', 'desc');
		return $this->db->get();
	}

	public function artikel()
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->order_by('artikel.idartikel', 'desc');
		return $this->db->get();
	}

	public function data_x()
	{
		$this->db->select('*');
		$this->db->from('data');
		$this->db->order_by('data.data_tanggal', 'desc');
		return $this->db->get();
	}

	public function user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role !=', 'admin');
		$this->db->order_by('aktif', 'asc');
		return $this->db->get();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */