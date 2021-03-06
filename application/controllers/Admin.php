<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if (!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Menu list',
			'menuall' => $this->admin_model->getAllMenu(),
		];
		if ($this->input->post('keyword')) {
			$data['menuall'] = $this->admin_model->menuSearch();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/menu', $data);
		$this->load->view('template/footer');
	}

	public function menu_add()
	{
		$data = [
			'title' => 'Add Menu',
			'button' => 'SAVE',
			'menu_status' => 1,
			'action' => site_url('admin/menu_add'),
			'menu_name' => '',
			'menu_description' => '',
			'menu_price' => '',
			'delete' => ''
		];

		$this->form_validation->set_rules('menu_name', 'table number', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/menu_form', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->menuAdd();
		}
	}

	public function menu_detail($id)
	{
		$row = $this->admin_model->getMenuById($id);
		if ($row) {
			$data = [
				'title' => 'Add Menu',
				'button' => 'SAVE',
				'menu_status' => $row['menu_status'],
				'action' => site_url('admin/menu_detail/' . $id),
				'menu_name' => set_value('menu_name', $row['menu_name']),
				'menu_description' => set_value('menu_description', $row['menu_description']),
				'menu_price' => set_value('menu_price', $row['menu_price']),
				'delete' => '<a href="' . site_url('admin/menu_delete/' . $row['menu_id']) . '" onclick="return confirm(' . "'Anda yakin?'" . ')" class="btn btn-flat bg-red">Delete</a>'
			];
		}

		$this->form_validation->set_rules('menu_name', 'table number', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/menu_form', $data);
			$this->load->view('template/footer');
		} else {
			$this->admin_model->menuUpdate($id);
		}
	}

	public function menu_delete($id)
	{
		$this->admin_model->menuDelete($id);
	}

	public function table()
	{
		$data = [
			'title' => 'Table list',
			'tableall' => $this->admin_model->getAllTable(),
			'title_box' => 'Table Add',
			'title_list' => 'Table List',
			'table_no' => set_value('table_no'),
			'table_capacity' => set_value('table_capacity'),
			'back' => ''
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
				'title' => 'Table list',
				'tableall' => $this->admin_model->getAllTable(),
				'title_box' => 'Table Edit',
				'title_list' => 'Table List',
				'table_no' => set_value('table_no', $row['table_no']),
				'table_capacity' => set_value('table_capacity', $row['table_capacity']),
				'page' => 'Admin',
				'page2' => 'table',
				'back' => '<a href="' . site_url('admin/table') . '" class="btn btn-flat bg-green">Back</a>'
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
		if ($this->input->post('keyword')) {
			$data['userall'] = $this->admin_model->userSearch();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('template/footer');
	}

	public function user_detail($id)
	{
		$row = $this->admin_model->getUserById($id);
		if ($row) {
			$data = [
				'title' => 'User Add',
				'levelall' => $this->admin_model->getAllLevel(),
				'action' => site_url('admin/user_detail/' . $row['user_id']),
				'disable' => 'disabled',
				'disable2' => '',
				'button' => 'SAVE',
				'user_name' => set_value('user_name', $row['user_name']),
				'user_username' => set_value('user_name', $row['user_username']),
				'user_status' => set_value('user_satus', $row['user_status']),
				'user_level' => $row['level_id'],
				'user_delete' => '<a href="' . site_url('admin/user_delete/' . $row['user_id']) . '"onclick="return confirm(' . "'Anda yakin?'" . ')" class="btn btn-flat bg-red">Delete</a>'
			];
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/user_form', $data);
		$this->load->view('template/footer');
		if ($this->input->post()) {
			$this->admin_model->userUpdate($id);
		}
	}

	public function user_add()
	{
		$data = [
			'title' => 'User Add',
			'levelall' => $this->admin_model->getAllLevel(),
			'action' => site_url('admin/user'),
			'disable' => '',
			'disable2' => 'disabled',
			'button' => 'SAVE',
			'user_name' => '',
			'user_username' => '',
			'user_status' => 1,
			'user_delete' => ''
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

	public function user_delete($id)
	{
		$this->admin_model->userDelete($id);
	}
}
