<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Login controller handles the login page.
*
* @author FeliciousX
*/
class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form'));

		if ($this->session->userdata('logged_in'))
		{
			redirect('/admin/home', 'refresh');
		}
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var page - string for page name
	 */
	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/admin/login.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Login'; // Capitalize the first letter
		$this->_populate_login_form();

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/login', $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}

	public function submit()
	{
		$this->load->model('admin_model');

		$result = $this->admin_model->get_admin();

		if ($result)
		{

			$array = array(
				'username' => $result->username ,
				'email' => $result->email ,
				'superuser' => $result->superuser,
				'logged_in' => TRUE
			);
			
			$this->session->set_userdata($array);
			
			redirect('/admin/home/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('error', 'Incorrect username or password !');
			redirect('/admin/login/', 'refresh');
		}

	}

	private function _populate_login_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'form-horizontal',
			'id' => 'add_admin'
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
			'placeholder' => 'password'
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Login'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse',
			'value' => 'Clear'
			);
	}
}

/* End of file login.php */
/* Location: ./app/SCTT/controllers/admin/login.php */