<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('admin_model');
        if ($this->session->userdata('user_username') == false) {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Admin page',
            'user' => $this->db->get_where('user', ['user_username' => $this->session->userdata('user_username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
}
