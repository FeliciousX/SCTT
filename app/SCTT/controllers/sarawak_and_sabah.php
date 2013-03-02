<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sarawak_and_Sabah extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/sarawak_and_sabah.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'About Sarawak and Sabah';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('pages/sarawak_and_sabah', $this->data);
		$this->load->view('templates/footer', $this->data);

	}

}

/* End of file sarawak_and_sabah.php */
/* Location: ./app/SCTT/controllers/sarawak_and_sabah.php */