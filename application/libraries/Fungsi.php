<?php

Class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function user_login()
    {
        $this->ci->load->model('user_m');
        $userid = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($userid)->row();

        return $user_data;
    }
}