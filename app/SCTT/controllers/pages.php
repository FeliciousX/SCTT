<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

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
		// $data['navList'] = _get_nav_bar_list();
		// $data['attributes'] = _get_nav_bar_attrib();
		
		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/banner', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}

	/**
	 * Gets the navigation bar list from database
	 *
	 * @access 	private
	 * @return 	associative array of strings
	 */
	private function _get_nav_bar_list()
	{
		return array();
	}

	/**
	 * Gets the navigation bar attribute
	 *
	 * @access 	private
	 * @return associative array of strings
	 */
	private function _get_nav_bar_attrib()
	{
		return array();
	}


}

/* End of file pages.php */
/* Location: ./app/SCTT/controllers/pages.php */