<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct() {
		parent::__construct();

		check_not_login();
		// check_admin();
		$this->load->model('supplier_m');
	}

	public function index()
	{
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data); 
	}

	public function del($id)
	{
		$this->supplier_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='". site_url('supplier') ."'</script>";
	}
}
