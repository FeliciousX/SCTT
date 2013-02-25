<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('testimonial_model');
		$this->load->helper('array');
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/testimonial.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Testimonial';

		$this->data['query'] = object_to_array($this->testimonial_model->get_all_testimonial());

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/testimonial', $this->data);
		$this->load->view('templates/footer', $this->data);

	}


}

/* End of file testimonial.php */
/* Location: ./app/SCTT/controllers/testimonial.php */