<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->helper('array');
	}

	public function index($cp_code = '')
	{
		if ( ! file_exists('../app/SCTT/views/pages/package.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Package';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		if($cp_code == '')
		{
			show_404();
		}

		$this->data['cp_code'] = $cp_code;

		$c_prefix = substr($cp_code, 0, 1); 		// Obtains c_prefix (only 1 alphabet)
		$code = explode('-', $cp_code);
		$c_code = (int) substr($code[0], 1);		// Obtains c_code
		$p_code = (int) $code[1];					// Obtains p_code

		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));
		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());
		$this->data['query_p_by_c'] = object_to_array($this->package_model->get_package_by_category($c_prefix, $c_code));
		$this->data['query_p_specific'] = object_to_array($this->package_model->get_package_by_code($p_code, $c_prefix, $c_code));

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);

		$this->_populate_banner($c_prefix, $c_code, $p_code);
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/package', $this->data);
		$this->load->view('templates/footer', $this->data);
	}

	private function _populate_banner($c_prefix = '', $c_code = 0, $p_code = 0)
	{
		$url = 'img/category/' . $c_prefix . $c_code . '/' . $p_code;
		$this->data['item']['img'][0] = img($url . '/1.png');

		$this->data['item']['caption'][0] = file_get_contents(base_url($url . '/1.txt'));


	}
}

/* End of file package.php */
/* Location: ./app/SCTT/controllers/package.php */