<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->model('photo_link_model');
		$this->load->helper('array');
	}

	public function index($c_prefix_code = '')
	{
		if ( ! file_exists('../app/SCTT/views/pages/category.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Package Categories';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		if($c_prefix_code == '')
		{
			$c_prefix_code = 'A1';
		}

		$c_prefix = substr($c_prefix_code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)
		$c_code = substr($c_prefix_code, 1); 		// Obtains c_code (undetermined length of numbers)

		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));
		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());
		$this->data['query_p_by_c'] = object_to_array($this->package_model->get_package_by_category($c_prefix, $c_code));
		$this->data['img_url'] = base_url('img/category/' . $c_prefix . $c_code);

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}

/* End of file category.php */
/* Location: ./app/SCTT/controllers/category.php */