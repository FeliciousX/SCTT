<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit_booking extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->model('captcha_model');
		$this->load->helper('array');
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/submit_booking.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Submit Booking';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		$this->captcha_model->verify_captcha();

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/submit_booking', $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}

/* End of file submit_booking.php */
/* Location: ./app/SCTT/controllers/submit_booking.php */