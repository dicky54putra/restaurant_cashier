<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function getAllLevel()
    {
        return $this->db->get('level')->result_array();
    }

    public function getAllUser()
    {
        return $this->db->get('user_view')->result_array();
    }

    public function userSearch()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('user_name', $keyword);
        $this->db->or_like('user_username', $keyword);
        return $this->db->get('user_view')->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['user_id' => $id])->row_array();
    }

    public function userAdd()
    {
        $data = [
            'user_name' => $this->input->post('user_name'),
            'user_username' => $this->input->post('user_username'),
            'user_password' => password_hash($this->input->post('user_password2'), PASSWORD_DEFAULT),
            'level_id' => $this->input->post('level_id'),
            'user_status' => 1
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully added a user.</div>');
        redirect('admin/user');
        // var_dump($data);
        // die;
    }

    public function userDelete($id)
    {
        $this->db->delete('user', ['user_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully delete a user.</div>');
        redirect('admin/user');
    }

    public function userUpdate($id)
    {
        $data = [
            'level_id' => $this->input->post('level_id'),
            'user_status' => $this->input->post('user_status')
        ];
        // var_dump($data);
        // die;
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully update a user.</div>');
        redirect('admin/user');
    }

    public function getAllTable()
    {
        return $this->db->get('table')->result_array();
    }

    public function getTableById($id)
    {
        return $this->db->get_where('table', ['table_id' => $id])->row_array();
    }

    public function tableAdd()
    {
        $data = [
            'table_no' => $this->input->post('table_no'),
            'table_capacity' => $this->input->post('table_capacity')
        ];
        $this->db->insert('table', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Successfully added a table.</div>');
        redirect('admin/table');
        // var_dump($data);
        // die;
    }

    public function tableUpdate($id)
    {
        $data = [
            'table_no' => $this->input->post('table_no'),
            'table_capacity' => $this->input->post('table_capacity')
        ];
        $this->db->where('table_id', $id);
        $this->db->update('table', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Successfully updated a table.</div>');
        redirect('admin/table');
    }

    public function tableDelete($id)
    {
        $this->db->delete('table', ['table_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully delete a table.</div>');
        redirect('admin/table');
    }

    public function getAllMenu()
    {
        return $this->db->get('menu')->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('menu', ['menu_id' => $id])->row_array();
    }

    public function menuAdd()
    {
        $data = [
            'menu_name' => $this->input->post('menu_name'),
            'menu_description' => $this->input->post('menu_description'),
            'menu_price' => $this->input->post('menu_price'),
            'menu_status' => $this->input->post('menu_status')
        ];
        // var_dump($data);
        // die;
        $this->db->insert('menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully add a menu...</div>');
        redirect('admin/index');
    }

    public function menuUpdate($id)
    {
        $data = [
            'menu_name' => $this->input->post('menu_name'),
            'menu_description' => $this->input->post('menu_description'),
            'menu_price' => $this->input->post('menu_price'),
            'menu_status' => $this->input->post('menu_status')
        ];
        $this->db->where('menu_id', $id);
        $this->db->update('menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully Update a menu...</div>');
        redirect('admin/index');
    }

    public function menuDelete($id)
    {
        $this->db->delete('menu', ['menu_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Successfully Delete a menu...</div>');
        redirect('admin/index');
    }
}
