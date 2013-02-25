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
		$this->load->model('booking_model');
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->helper('array');
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

		$this->data['query'] = object_to_array($this->booking_model->get_all_booking_today());

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/bookings/today', $this->data);
		$this->load->view('admin/'.$page, $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function category($code = '')
	{
		if ( ! file_exists('../app/SCTT/views/admin/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Bookings by Category'; // Capitalize the first letter

		if($code == '')
		{
			$code = 'A1';
		}

		$c_prefix = substr($code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)
		$c_code = substr($code, 1); 		// Obtains c_code (undetermined length of numbers)

		$this->data['query'] = object_to_array($this->booking_model->get_all_booking_by_category($c_prefix, $c_code));
		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));
		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/bookings/category', $this->data);
		$this->load->view('admin/home', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function package($cp_code = '')
	{
		if ( ! file_exists('../app/SCTT/views/admin/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Bookings by Package'; // Capitalize the first letter

		if($cp_code == '')
		{
			$cp_code = 'A1';
		}

		if(strlen($cp_code)!=6)
		{
			$cp_code .= '-001';
		}

		$c_prefix = substr($cp_code, 0, 1); 		// Obtains c_prefix (only 1 alphabet)
		$code = explode('-', $cp_code);
		$c_code = (int) substr($code[0], 1);		// Obtains c_code
		$p_code = (int) $code[1];					// Obtains p_code

		$this->data['query'] = object_to_array($this->booking_model->get_all_booking_by_package($p_code, $c_prefix, $c_code));
		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());
		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));
		$this->data['query_p_by_c'] = object_to_array($this->package_model->get_package_by_category($c_prefix, $c_code));
		$this->data['query_p_specific'] = object_to_array($this->package_model->get_package_by_code($p_code, $c_prefix, $c_code));

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/bookings/package', $this->data);
		$this->load->view('admin/home', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function tourdate()
	{
		if ( ! file_exists('../app/SCTT/views/admin/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Bookings by Tour Date'; // Capitalize the first letter

		$this->data['query'] = object_to_array($this->booking_model->get_all_booking_by_date_start());
		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/bookings/tourdate', $this->data);
		$this->load->view('admin/home', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function status($var_status = '', $booking_id = 0)
	{
		if ( ! file_exists('../app/SCTT/views/admin/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		if($var_status=='' || $booking_id == 0)
		{
			show_404();
		}

		$this->booking_model->update_booking_status_by_id($var_status, $booking_id);

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/admin/home.php */