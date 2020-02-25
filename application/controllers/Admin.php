<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Admin page'
		];
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function table()
	{
		$data = [
			'title' => 'Admin page',
			'tableall' => $this->admin_model->getAllTable(),
			'title_box' => 'Table Add',
			'title_list' => 'Table List',
			'table_no' => set_value('table_no'),
			'table_capacity' => set_value('table_capacity'),
			'page' => 'Admin',
			'page2' => 'table'
		];

		$this->form_validation->set_rules('table_no', 'table number', 'required');
		$this->form_validation->set_rules('table_capacity', 'table capacity', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/table', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->tableAdd();
		}
	}

	public function table_edit($id)
	{
		$row = $this->admin_model->getTableById($id);
		if ($row) {
			$data = [
				'title' => 'Admin page',
				'tableall' => $this->admin_model->getAllTable(),
				'title_box' => 'Table Edit',
				'title_list' => 'Table List',
				'table_no' => set_value('table_no', $row['table_no']),
				'table_capacity' => set_value('table_capacity', $row['table_capacity']),
				'page' => 'Admin',
				'page2' => 'table'
			];
		}

		$this->form_validation->set_rules('table_no', 'table number', 'required');
		$this->form_validation->set_rules('table_capacity', 'table capacity', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/table', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->tableUpdate($id);
		}
	}

	public function table_delete($id)
	{
		$this->admin_model->tableDelete($id);
		
	}

	public function user()
	{
		$data = [
			'title' => 'User list',
			'userall' => $this->admin_model->getAllUser(),
			'levelall' => $this->admin_model->getAllLevel(),
			'action' => site_url('admin/user'),
			'button' => 'SAVE'
		];

		$this->form_validation->set_rules('user_name', 'Name user', 'trim|required');
		$this->form_validation->set_rules('user_username', 'Username', 'trim|required|is_unique[user.user_username]');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_password2', 'Repeat password', 'trim|required|min_length[3]|matches[user_password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/user', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->userAdd();
			// echo 'ok';
		}
	}

	public function user_add()
	{
		$data = [
			'title' => 'User Add',
			'levelall' => $this->admin_model->getAllLevel(),
			'action' => site_url('admin/user'),
			'button' => 'SAVE'
		];
		$this->form_validation->set_rules('user_name', 'Name user', 'trim|required');
		$this->form_validation->set_rules('user_username', 'Username', 'trim|required|is_unique[user.user_username]');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_password2', 'Repeat password', 'trim|required|min_length[3]|matches[user_password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/user_form', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->userAdd();
			// echo 'ok';
		}
	}

	public function user_status($id)
	{
		$level = $this->admin_model->getUserById($id);
		if ($level['user_status'] == 1) {
			$this->db->where('user_id', $id);
			$this->db->update('user', ['user_status' => 2]);
			redirect('admin/user');
		} elseif ($level['user_status'] == 2) {
			$this->db->where('user_id', $id);
			$this->db->update('user', ['user_status' => 1]);
			redirect('admin/user');
		}
	}

	public function user_delete($id)
	{
		$this->db->delete('user', ['user_id' => $id]);
		redirect('admin/user');
	}
}
