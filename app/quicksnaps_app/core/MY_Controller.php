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
	
	function __construct()
	{
		parent::__construct();

		// Debugging purposes. Will be removed during production.
		$this->output->enable_profiler(TRUE);
	}

}

require_once('../app/quicksnaps_app/core/Install_Controller.php');
require_once('../app/quicksnaps_app/core/QS_Controller.php');

/* End of file MY_Controllers.php */
/* Location: ./quicksnaps_app/libraries/MY_Controllers.php */

