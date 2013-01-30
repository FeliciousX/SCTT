<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data = array();

	function __construct()
	{
		parent::__construct();

		// Always check for user session
		if ( ! $this->session->userdata('logged_in')) {
			redirect('/admin/login', 'refresh');
		}

		$this->data['nav_list'] = array(
					anchor('/admin/home', 'Home'),
					anchor('/admin/categories/', 'Categories'),
					anchor('/admin/packages', 'Packages'),
					anchor('/admin/photo_gallery', 'Photo Gallery'),
					anchor('/admin/accounts', 'Accounts')
					);
	}
}

/* End of file MY_Controller.php */
/* Location: ./app/SCTT/core/MY_Controller.php */