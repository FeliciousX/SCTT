<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* The home page shows all the bookings that is still pending
*
* @author FeliciousX
*/
class Home extends Admin_Controller {

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
		if ( ! file_exists('../app/SCTT/views/admin/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}
}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/admin/home.php */