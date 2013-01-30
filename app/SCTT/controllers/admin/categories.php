<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var page - string for page name
	 */
	public function index($page = 'home')
	{
		if ( ! file_exists('../app/SCTT/views/admin/categories/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/categories/'.$page, $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}
}

/* End of file categories.php */
/* Location: ./app/SCTT/controllers/admin/categories.php */