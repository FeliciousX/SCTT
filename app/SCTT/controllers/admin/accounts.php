<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {

	private $nav_list = array();
	private $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin_model');

		$this->load->helper(array('html', 'url', 'form'));

		$this->load->library('form_validation');

		$this->nav_list = array(
					'Home',
					'Categories',
					'Packages',
					'Photo Gallery',
					'Accounts'
					);

		$this->data['sidebar'] = array(
			anchor('admin/accounts/add', 'Add Admin'),
			anchor('admin/accounts/delete', 'Delete Admin'),
			anchor('admin/accounts/edit', 'Edit Admin')
			);

		$this->data['attributes'] = array(
			'class' => 'sidebar nav nav-tabs nav-stacked',
			'id' => 'sidebar'
			);
	}

	public function index()
	{
		$this->add();
	}

	public function add()
	{
		$this->data['title'] = 'Add Admin';
		$this->data['nav_list'] = $this->nav_list;
		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

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

	public function delete()
	{
		$this->data['title'] = 'Delete Admin'; 
		$this->data['nav_list'] = $this->nav_list;
		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);


		$this->data['form']['success'] = false;

		$this->_populate_delete_admin_form();

		$this->data['form']['success'] = $this->form_validation->run();

		$username_su = $this->input->post('username_su');
		$password_su = $this->input->post('password_su');

		if ($this->data['form']['success']) {
			
			$result = $this->admin_model->get_admin($username_su, $password_su);

			if ($result) {
				if ($result->superuser == 1) {
					$this->data['form']['success'] = $this->admin_model->delete_admin();
				}
			}
			else {
				$this->data['form']['success'] = false;
			}		
		}

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/delete', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function edit()
	{
		$this->data['title'] = 'Edit Admin'; 
		$this->data['nav_list'] = $this->nav_list;
		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		$this->_populate_edit_admin_form();

		$method = $this->input->post('method');
		$search = $this->input->post('search');
		
		if (strcmp($method, 'username') == 0) {
			$this->data['admin'] = $this->admin_model->get_all_admin_like_username($search);
		}
		elseif (strcmp($method, 'email') == 0) {
			$this->data['admin'] = $this->admin_model->get_all_admin_like_email($search);
		}
		elseif (strcmp($method, 'name') == 0) {
			$this->data['admin'] = $this->admin_model->get_all_admin_like_name($search);
		}
		else {
			$this->data['admin'] = $this->admin_model->get_all_admin();
		}

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/accounts/edit', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
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

	private function _populate_delete_admin_form()
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
			'required' => ''
			);

		$this->data['form']['username_su'] = array(
			'name' => 'username_su',
			'id' => 'username_su',
			'placeholder' => 'your username',
			'required' => ''
			);

		$this->data['form']['password_su'] = array(
			'name' => 'password_su',
			'id' => 'password_su',
			'placeholder' => 'your password',
			'onchange' => 'validatePassword()',
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

	private function _populate_edit_admin_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'form-search',
			'id' => 'delete_admin'
			);

		$this->data['form']['search'] = array(
			'name' => 'search',
			'id' => 'search',
			'class' => 'input-medium search-query',
			'required' => ''
			);

		$this->data['form']['submit'] = array(
			'type' => 'submit',
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn'
			);

		$this->data['form']['username'] = array(
			'name' => 'method',
			'id' => 'username',
			'value' => 'username',
			'checked' => true,
			);

		$this->data['form']['email'] = array(
			'name' => 'method',
			'id' => 'email',
			'value' => 'email',
			'checked' => false,
			);

		$this->data['form']['name'] = array(
			'name' => 'method',
			'id' => 'name',
			'value' => 'name',
			'checked' => false,
			);
	}
}

/* End of file accounts.php */
/* Location: ./app/SCTT/controllers/admin/accounts.php */