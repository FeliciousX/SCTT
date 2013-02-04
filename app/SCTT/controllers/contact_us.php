<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends Public_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/contact_us.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Contact Us';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		$this->_populate_contact_us_form();

		if ($this->input->post('submit')) {
			if ($this->form_validation->run()) {
				$this->_enquire();				
			}
		}

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/contact_us', $this->data);
		$this->load->view('templates/footer', $this->data);

	}

	private function _enquire()
	{
		$this->load->library('email');

		$from = $this->input->post('email');
		$to = 'enquiry@borneo4u.com';
		$cc = 'samuelchung@email.com';

		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$this->email->from($from);
		$this->email->to($to);
		$this->email->cc($cc);

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();

		echo $this->email->print_debugger();
	}

	private function _populate_contact_us_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'formarea',
			'id' => 'enquiry_form',
			'onsubmit' => 'return validateAddAdminForm()'
			);

		$this->data['form']['f_name'] = array(
			'name' => 'f_name',
			'id' => 'f_name',
			'placeholder' => 'First Name',
			'required' => ''
			);

		$this->data['form']['l_name'] = array(
			'name' => 'l_name',
			'id' => 'l_name',
			'placeholder' => 'Last Name',
			'required' => ''
			);

		$this->data['form']['address'] = array(
			'name' => 'address',
			'id' => 'address',
			'placeholder' => 'Address',
			'rows' => '3'
			);

		$this->data['form']['phone_num'] = array(
			'name' => 'phone_num',
			'id' => 'phone_num',
			'placeholder' => 'Contact Number',
			'type' => 'tel'
			);

		$this->data['form']['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'placeholder' => 'Email',
			'type' => 'email',
			'required' => ''
			);

		$this->data['form']['subject'] = array(
			'name' => 'subject',
			'id' => 'subject',
			'placeholder' => 'Subject of Enquiry',
			'required' => ''
			);

		$this->data['form']['message'] = array(
			'name' => 'message',
			'id' => 'message',
			'placeholder' => 'What would you like to know from us?',
			'rows' => '4',
			'required' => ''
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary btn-large',
			'value' => 'Submit Enquiry'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse rightalign margintop',
			'value' => 'Clear'
			);
	}


}

/* End of file contact_us.php */
/* Location: ./app/SCTT/controllers/contact_us.php */