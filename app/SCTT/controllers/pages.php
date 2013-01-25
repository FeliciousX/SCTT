<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	private $nav_list = array();

	public function __construct()
	{
		parent::__construct();


		$this->load->helper('html');
		$this->load->helper('url');

		$this->nav_list = array(
					'Home',
					'Tour Packages',
					'Photo Gallery',
					'Sarawak &amp; Sabah',
					'Testimonial',
					'Contact');
	}


	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var page - string for page name
	 */
	public function index($page = 'home')
	{
		if ( ! file_exists('../app/SCTT/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['nav_list'] = $this->nav_list;
		$data['page_uri'] = uri_string();
		$data['nav_active'] = explode('/', $data['page_uri']);

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/banner', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}


}

/* End of file pages.php */
/* Location: ./app/SCTT/controllers/pages.php */