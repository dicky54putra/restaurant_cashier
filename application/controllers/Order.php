<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Order page',
            'tableall' => $this->order_model->getAllTable()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('order/index', $data);
        $this->load->view('template/footer');
    }
}
