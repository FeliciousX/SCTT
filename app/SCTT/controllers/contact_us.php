<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends Public_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('captcha_model');
		$this->load->helper('array');
		$this->load->helper('form');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->library('image_lib');
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
		$this->_load_captcha();

		if ($this->input->post('submit')) 
		{
			if ($this->form_validation->run()) 
			{
				if ($this->_captcha_check())
				{
					$this->_enquire();				
				}
			}
		}

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/contact_us', $this->data);
		$this->load->view('templates/footer', $this->data);

	}

	private function _load_captcha()
	{
		$vals = array(
			// 'img_path' =>  dirname(getcwd()) . '\app\SCTT\captcha',
			'img_path' =>  getcwd() . '\captcha\\',
			'img_url' => base_url('captcha') . '/'
			);

		$cap = create_captcha($vals);
		$this->data['image'] = $cap['image'];

		// $img_str = substr($cap['image'], 9);
		// echo $img_str . '<br />';
		// $img_pos = strpos($img_str, 'w');
		// $img_str = substr($img_str, 0, $img_pos);

		// echo $img_str;

		// $this->data['image'] 

		$captcha_data = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);

		$this->captcha_model->generate_captcha($captcha_data);
	}

	private function _captcha_check()
	{
		if($this->captcha_model->verify_captcha())
		{
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo '<div class="alert alert-error">Please submit the word that appears in the image correctly</div>';
		}
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
		echo 'Enquiry sent!';
	}

	private function _populate_contact_us_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'formarea',
			'id' => 'enquiry_form'
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