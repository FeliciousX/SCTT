<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Always check for user session
		if ( ! $this->session->userdata('logged_in')) {
			redirect('/admin/login', 'refresh');
		}

		$this->load->model('admin_model');
		$this->load->helper(array('form', 'array'));
		$this->load->library('form_validation');


		$this->data['sidebar'] = array(
			anchor('admin/accounts/search', 'Search Admin'),
			anchor('admin/accounts/add', 'Add Admin'),
			anchor('admin/accounts/delete', 'Delete Admin')
			);

		$this->data['sidebar_attributes'] = array(
			'class' => 'sidebar nav nav-tabs nav-stacked',
			'id' => 'sidebar'
			);
	}

	public function index()
	{
		$this->search();
	}

	public function search()
	{
		$this->data['title'] = 'Search Admin';

		$this->_populate_search_admin_form();

		$method = $this->input->post('method');
		$search = $this->input->post('search');
		
		/* Populate table */
		$this->load->library('table');
		$this->_set_table_template();

		if (strcmp($method, 'radio_username') == 0) {
			$query = $this->admin_model->get_all_admin_like_username($search);
		}
		elseif (strcmp($method, 'radio_email') == 0) {
			$query = $this->admin_model->get_all_admin_like_email($search);
		}
		elseif (strcmp($method, 'radio_name') == 0) {
			$query = $this->admin_model->get_all_admin_like_name($search);
		}
		else {
			$query = $this->admin_model->get_all_admin();
		}
		$query = object_to_array($query);

		for ($i=0; $i < count($query); $i++) { 
			$action_button = '<div class="btn-group">';
			$action_button .= '<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">';
			$action_button .= 'Action';
			$action_button .= '<span class="caret"></span>';
			$action_button .= '</a> <ul class="dropdown-menu">';
			$action_button .= '<li><a href="' . base_url('index.php/admin/accounts/edit') . '/' . $query[$i]['username'] . '">Edit</a></li>';
			$action_button .= '<li><a href="' . base_url('index.php/admin/accounts/delete') . '/' . $query[$i]['username'] . '">Delete</a></li>';
			$action_button .= '</ul></div>';

			$query[$i]['action'] = $action_button;
			$query[$i]['superuser'] == 0 ? $query[$i]['superuser'] = 'Normal Admin' : $query[$i]['superuser'] = 'Super Admin';
		}

		$this->data['table'] = $this->table->generate($query);

		/* end populating table */

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/search', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function edit($username = '')
	{
		$this->data['title'] = 'Edit Admin';

		$admin = $this->admin_model->get_admin_by_username($username);

		$this->data['editee'] = $admin->username;
		$this->data['rank'] = $admin->superuser;
		$this->data['query'] = false;

		$this->_populate_edit_admin_form();

		if ($this->input->post('submit')) {

			if ($admin) {

				if ( ! $this->form_validation->run('accounts/edit') ) {
					$this->session->set_flashdata('error', validation_errors());
					redirect('/admin/accounts/edit/' . $username, 'refresh');
				}

				$password = $this->input->post('password');
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$superuser = $this->input->post('superuser');

				if ( $this->session->userdata('superuser') > $superuser OR strcmp($username, $this->session->userdata('username')) == 0 ) {
					
					if ( $password ) {
						$this->data['query'] = $this->admin_model->update_admin_password($username, $password);
					}

					if ( $name ) {
						$this->data['query'] = $this->admin_model->update_admin_name($username, $name);
					}

					if ( $email ) {
					 	$this->data['query'] = $this->admin_model->update_admin_email($username, $email);
					}

					if ( ( $superuser == 1 OR $superuser == 0 ) && ( strcmp($username, $this->session->userdata('username')) != 0 ) ) {
						$this->data['query'] = $this->admin_model->update_admin_superuser($username, $superuser);
					}

					if ($this->data['query']) {
						$this->session->set_flashdata('success', 'Successfully updated account ' . $username);
					}
				}
				else {
					$this->session->set_flashdata('error', 'Insufficient authority to edit this admin');
				}
			}
			else {
				$this->session->set_flashdata('error', 'Admin with username ' . $username . ' not found!');
			}

			redirect('/admin/accounts/search', 'refresh');
		}
		
		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/edit', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	/**
	* This page adds a new admin account to the system
	*/
	public function add()
	{
		$this->data['title'] = 'Add Admin';

		$this->data['form']['success'] = false;

		$this->_populate_add_admin_form();

		$this->data['form']['success'] = $this->form_validation->run();
		if ($this->data['form']['success']) {
			$this->data['query'] = $this->admin_model->insert_admin();
		}

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/add', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	/**
	* This page is to delete another admin. Admin can only delete another admin if
	* their level is higher or equal (Measured by superuser field).
	* Ranking from 0 lowest and 2 highest.
	*/
	public function delete($username = '')
	{
		$this->data['title'] = 'Delete Admin'; 

		$this->data['form']['success'] = false;
		$this->data['query'] = false;

		$this->_populate_delete_admin_form($username);

		$this->data['form']['success'] = $this->form_validation->run();
		$this->data['form']['error'] = validation_errors();

		$admin_username = $this->session->userdata('username');

		if ($this->data['form']['success']) {
			
			$result = $this->admin_model->get_admin($admin_username);
			$to_delete = $this->admin_model->get_admin_by_username($username);

			if ($result) {
				if ($result->superuser > $to_delete->superuser) {
					$this->data['query'] = $this->admin_model->delete_admin();
				}
				else {
					$this->data['form']['error'] = 'Insufficient authority to delete admin.';
				}
			}
			else {
				$this->data['form']['success'] = false;
				$this->data['form']['error'] = 'Wrong Password.';
			}		
		}

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/delete', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	private function _populate_search_admin_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'form-search',
			'id' => 'delete_admin'
			);

		$this->data['form']['search'] = array(
			'name' => 'search',
			'id' => 'search',
			'class' => 'input-medium search-query'
			);

		$this->data['form']['submit'] = array(
			'type' => 'submit',
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn'
			);

		$this->data['form']['radio_username'] = array(
			'name' => 'method',
			'id' => 'radio_username',
			'value' => 'radio_username',
			'checked' => true,
			);

		$this->data['form']['radio_email'] = array(
			'name' => 'method',
			'id' => 'radio_email',
			'value' => 'radio_email',
			'checked' => false,
			);

		$this->data['form']['radio_name'] = array(
			'name' => 'method',
			'id' => 'radio_name',
			'value' => 'radio_name',
			'checked' => false,
			);

		$this->data['form']['edit_head'] = array(
			'class' => 'form-horizontal',
			'id' => 'edit_admin',
			'onsubmit' => 'return editAdmin()'
			);

		$this->data['form']['username'] = array(
			'name' => 'username',
			'id' => 'username',
			'placeholder' => 'login',
			'required' => ''
			);

		$this->data['form']['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'placeholder' => 'password',
			'onchange' => 'validatePassword()',
			'required' => ''
			);

		$this->data['form']['name'] = array(
			'name' => 'name',
			'id' => 'name',
			'placeholder' => 'real name',
			'required' => ''
			);

		$this->data['form']['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'placeholder' => 'work mail',
			'type' => 'email',
			'required' => ''
			);
	}

	private function _set_table_template()
	{
		$tmpl = array ('table_open'          => '<table class="table table-hover">');
		$this->table->set_heading('Username', 'Name', 'Email', 'Rank');

		$this->table->set_template($tmpl);
	}

	private function _populate_edit_admin_form()
	{
		
		$this->data['form']['head'] = array(
			'class' => 'form-horizontal',
			'id' => 'edit_admin',
			'onsubmit' => 'return validateAddAdminForm()'
			);

		$this->data['form']['username'] = array(
			'name' => 'username',
			'id' => 'username',
			);

		$this->data['form']['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'placeholder' => 'password',
			'onchange' => 'validatePassword()'
			);

		$this->data['form']['name'] = array(
			'name' => 'name',
			'id' => 'name',
			'placeholder' => 'real name'
			);

		$this->data['form']['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'placeholder' => 'work mail',
			'type' => 'email'
			);

		$this->data['form']['superuser'] = array(
			0 => 'Normal Admin',
			1 => 'Super Admin'
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Save Changes'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse',
			'value' => 'Clear'
			);
	}

	private function _populate_add_admin_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'form-horizontal',
			'id' => 'add_admin',
			'onsubmit' => 'return validateAddAdminForm()'
			);

		$this->data['form']['username'] = array(
			'name' => 'username',
			'id' => 'username',
			'placeholder' => 'login',
			'onchange' => 'validateUsername()',
			'required' => ''
			);

		$this->data['form']['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'placeholder' => 'password',
			'onchange' => 'validatePassword()',
			'required' => ''
			);

		$this->data['form']['confirm_password'] = array(
			'name' => 'confirm_password',
			'id' => 'confirm_password',
			'placeholder' => 'repeat password',
			'onchange' => 'validatePassword()',
			'required' => ''
			);

		$this->data['form']['name'] = array(
			'name' => 'name',
			'id' => 'name',
			'placeholder' => 'real name',
			'required' => ''
			);

		$this->data['form']['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'placeholder' => 'work mail',
			'type' => 'email',
			'required' => ''
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Create Admin'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse',
			'value' => 'Clear'
			);
	}

	private function _populate_delete_admin_form($username = '')
	{
		$this->form_validation->set_message('is_not_unique', 'This user does not exist.');
		
		$this->data['form']['head'] = array(
			'class' => 'form-horizontal',
			'id' => 'delete_admin',
			'onsubmit' => 'return validateForm()'
			);

		$this->data['form']['username'] = array(
			'name' => 'username',
			'id' => 'username',
			'placeholder' => 'user to delete',
			'value' => $username,
			'required' => ''
			);

		$this->data['form']['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'placeholder' => 'your password',
			'required' => ''
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Delete Admin'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse',
			'value' => 'Clear'
			);
	}
}

/* End of file accounts.php */
/* Location: ./app/SCTT/controllers/admin/accounts.php */