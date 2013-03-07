<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Simple logging out controller.
* Destroys current session and redirect to login page.
*
* @author FeliciousX
*/
class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in'))
		{
			$this->session->sess_destroy();
		}

		redirect('/admin/login', 'refresh');
	}
}

/* End of file logout.php */
/* Location: ./app/SCTT/controllers/admin/logout.php */