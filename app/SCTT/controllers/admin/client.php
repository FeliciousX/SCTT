<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* The client page shows all the client details
*
* @author Infinia
*/
class Client extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->helper('array');
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var email - email passed as parameter
	 */
	public function index($email = '')
	{
		if ( ! file_exists('../app/SCTT/views/admin/client.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Client Details'; // Capitalize the first letter

		$email = str_replace('-', '@', $email);

		$this->data['query'] = object_to_array($this->client_model->get_client_by_email_param($email));

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/client', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}
}