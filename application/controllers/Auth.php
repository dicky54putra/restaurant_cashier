<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('auth_model');
    // }
    public function index()
    {
        $data = [
            'title' => 'Login page'
        ];

        $this->form_validation->set_rules('user_username', 'Username', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('template/_footer');
        } else {
            $username = $this->input->post('user_username');
            $password = $this->input->post('user_password');
            if ($username) {
                # code...
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  incorrect username or password!.</div>');
            }
        }
    }
}
