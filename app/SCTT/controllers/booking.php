<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->model('captcha_model');
		$this->load->helper('array');
		$this->load->helper('captcha');
	}

	public function index($cp_code = '')
	{
		if ( ! file_exists('../app/SCTT/views/pages/booking.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Booking';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		if($cp_code == '')
		{
			show_404();
		}

		$this->data['cp_code'] = $cp_code;

		$c_prefix = substr($cp_code, 0, 1); 		// Obtains c_prefix (only 1 alphabet)
		$code = explode('-', $cp_code);
		$c_code = substr($code[0], 1);				// Obtains c_code
		$p_code = $code[1];							// Obtains p_code

		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));
		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());
		$this->data['query_p_by_c'] = object_to_array($this->package_model->get_package_by_category($c_prefix, $c_code));
		$this->data['query_p_specific'] = object_to_array($this->package_model->get_package_by_code($p_code, $c_prefix, $c_code));

		// $vals = array(
		// 	'img_path' => './captcha/',
		// 	'img_url' => base_url('captcha')
		// 	);

		// $cap = create_captcha($vals);
		// $this->data['cap'] = $cap;

		// $captcha_data = array(
		// 	'captcha_time' => $cap['time'],
		// 	'ip_address' => $this->input->ip_address(),
		// 	'word' => $cap['word']
		// 	);

		// $this->data['query_cap'] = object_to_array($this->captcha_model->generate_captcha($captcha_data));

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/booking', $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}

/* End of file booking.php */
/* Location: ./app/SCTT/controllers/booking.php */