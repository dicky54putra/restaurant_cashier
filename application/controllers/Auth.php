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

            $user = $this->db->get_where('user', ['user_username' => $username])->row_array();

            if ($user) {
                if (password_verify($password, $user['user_pasword'])) {
                    $data = [
                        'user_username' => $user['user_username'],
                        'user_name' => $user['user_name'],
                        'id_level' => $user['id_level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_level'] == 1) {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  incorrect username or password!.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  incorrect username or password!.</div>');
                redirect('auth');
            }
        }
    }
}
