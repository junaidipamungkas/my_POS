<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

		check_not_login();

		$this->load->model('user_m');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();

		$this->template->load('template', 'user/user_data', $data); 
	}
	
	public function add()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama', 'required|trim');	
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[user.username]');	
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');	
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[pass]',
			array('matches' => '%s does not match with the password')
		);	
		$this->form_validation->set_rules('level', 'Level', 'required');	
		$this->form_validation->set_message('required', '%s masih kosong, silakan isi!');
		$this->form_validation->set_message('min_length', '{field} masih minimal 5 karakter!');
		$this->form_validation->set_message('is_unique', '{field} sudah ada!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'user/user_form_add');
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='". site_url('user'	) ."'</script>";
		}
		
	}
	
	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='". site_url('user') ."'</script>";
	}
}
