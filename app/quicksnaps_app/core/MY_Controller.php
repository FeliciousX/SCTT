<?php

/**
 * MY Controller class
 *
 * Extends the base class and loads Install and Quicksnap Controllers
 *
 * @package		QuickSnaps
 * @author		Eoin McGrath
 * @link		http://www.starfishwebconsulting.co.uk/quicksnaps
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

require_once('app/quicksnaps_app/core/Install_Controller.php');
require_once('app/quicksnaps_app/core/QS_Controller.php');

/* End of file MY_Controllers.php */
/* Location: ./quicksnaps_app/libraries/MY_Controllers.php */

