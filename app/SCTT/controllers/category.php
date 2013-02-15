<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->helper('array');
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/category.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Package Categories';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		
		$data['query_c'] = $this->category_model->get_all_category();

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('templates/footer', $this->data);

	}


}

/* End of file category.php */
/* Location: ./app/SCTT/controllers/category.php */