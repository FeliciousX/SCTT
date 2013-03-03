<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* This is the default controller for all admin pages.
*
* @author FeliciousX
*/
class Admin_Controller extends MY_Controller {

	/**
	* The constructor checks for the user session and verify if admin is
	* logged in. Otherwise, redirect to login screen.
	* It also populates the navbar. Any changes to the navbar display
	* should be made here.
	*/
	function __construct()
	{
		parent::__construct();

		// Always check for user session
		if ( ! $this->session->userdata('logged_in'))
		{
			redirect('/admin/login', 'refresh');
		}

		$this->data['nav_list'] = array(
					anchor('/admin/home', 'Home'),
					anchor('/admin/banner', 'Banner'),
					anchor('/admin/categories', 'Categories'),
					anchor('/admin/packages', 'Packages'),
					anchor('/gallery.php', 'Photo Gallery'),
					anchor('/admin/testimonial', 'Testimonial'),
					anchor('/admin/accounts', 'Accounts')
					);
	}
}

/* End of file Admin_Controller.php */
/* Location: ./app/SCTT/core/Admin_Controller.php */