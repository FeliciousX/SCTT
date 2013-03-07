<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* This is the default controller for all admin pages.
*
* @author FeliciousX
*/
class MY_Controller extends CI_Controller {

	var $data = array();

	/**
	* The constructor checks for the user session and verify if admin is
	* logged in. Otherwise, redirect to login screen.
	* It also populates the navbar. Any changes to the navbar display
	* should be made here.
	*/
	function __construct()
	{
		parent::__construct();
	}
}

/* End of file MY_Controller.php */
/* Location: ./app/SCTT/core/MY_Controller.php */