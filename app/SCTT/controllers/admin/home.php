<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	private $nav_list = array();
	private $data = array();

	public function __construct()
	{
		parent::__construct();


		$this->load->helper(array('html', 'url', 'form'));

		$this->load->library('form_validation');

		$this->nav_list = array(
					'Home',
					'Categories',
					'Packages',
					'Photo Gallery',
					'Accounts'
					);
	}


	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var page - string for page name
	 */
	public function index($page = 'home')
	{
		if ( ! file_exists('../app/SCTT/views/admin/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter
		$this->data['nav_list'] = $this->nav_list;
		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}
}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/admin/home.php */