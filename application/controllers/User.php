<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

		check_not_login();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();

		$this->template->load('template', 'user/user_data', $data); 
	}
	
	public function add()
	{
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

	public function edit($id)
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required|trim');	
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|callback_username_check');	
		if ($this->input->post('pass')) {
			$this->form_validation->set_rules('pass', 'Password', 'min_length[5]');	
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[pass]',
				array('matches' => '%s does not match with the password')
			);	
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[pass]',
				array('matches' => '%s does not match with the password')
			);	
		}
		$this->form_validation->set_rules('level', 'Level', 'required');	
		$this->form_validation->set_message('required', '%s masih kosong, silakan isi!');
		$this->form_validation->set_message('min_length', '{field} masih minimal 5 karakter!');
		$this->form_validation->set_message('is_unique', '{field} sudah ada!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $data['row'] = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='". site_url('user') ."'</script>";
			}
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='". site_url('user') ."'</script>";
		}
		
	}

	public function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		} else {
			return TRUE;
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
