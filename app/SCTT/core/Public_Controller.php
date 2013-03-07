<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* This is the default controller for all customer-side pages.
*
* @author FeliciousX
*/
class Public_Controller extends MY_Controller {

	/**
	* It also populates the navbar. Any changes to the navbar display
	* should be made here.
	*/
	function __construct()
	{
		parent::__construct();

		$this->data['nav_list'] = array(
						anchor('/home', 'Home'),
						anchor('/category', 'Tour Packages'),
						anchor('/gallery.php', 'Photo Gallery'),
						anchor('/sarawak_and_sabah', 'About Sarawak &amp; Sabah'),
						anchor('/testimonial', 'Testimonial'),
						anchor('/contact_us', 'Contact Us')
						);
	}
}

/* End of file Public_Controller.php */
/* Location: ./app/SCTT/core/Public_Controller.php */