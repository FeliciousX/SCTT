<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* The category page shows all the category information
*
* @author FeliciousX
*/
class Categories extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helper('array');
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 * @var page - string for page name
	 */
	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/admin/categories.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Categories'; // Capitalize the first letter

		$this->data['query_c'] = object_to_array($this->category_model->get_all_category_orderby_code());

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/categories', $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}

	public function edit($code = '')
	{
		if ( ! file_exists('../app/SCTT/views/admin/categories.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Edit Category'; // Capitalize the first letter

		if($this->input->post('c_prefix') != '')
		{
			$this->category_model->update_category_by_link();
			redirect('admin/categories', 'refresh');
		}
		else
		{
			$c_prefix = substr($code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)
			$c_code = substr($code, 1); 		// Obtains c_code (undetermined length of numbers)

			$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));

			$this->load->view('admin/templates/head', $this->data);
			$this->load->view('admin/templates/navbar', $this->data);
			$this->load->view('admin/categories/edit', $this->data);
			$this->load->view('admin/templates/footer', $this->data);
		}
	}

	public function insert()
	{
		if ( ! file_exists('../app/SCTT/views/admin/categories.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Add New Category'; // Capitalize the first letter

		if($this->input->post('c_prefix') != '')
		{
			$this->category_model->insert_category($this->input->post('c_prefix'), $this->input->post('c_code'), $this->input->post('c_description'), $this->input->post('c_name'), $this->input->post('featured'));
			redirect('admin/categories', 'refresh');
		}
		else
		{
			$this->load->view('admin/templates/head', $this->data);
			$this->load->view('admin/templates/navbar', $this->data);
			$this->load->view('admin/categories/insert', $this->data);
			$this->load->view('admin/templates/footer', $this->data);
		}
	}

	public function delete($code = '')
	{
		if ( ! file_exists('../app/SCTT/views/admin/categories.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$c_prefix = substr($code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)
		$c_code = substr($code, 1); 		// Obtains c_code (undetermined length of numbers)

		$this->category_model->delete_category_by_code($c_prefix, $c_code);
		redirect('admin/categories', 'refresh');
	}
}

/* End of file categories.php */
/* Location: ./app/SCTT/controllers/admin/categories.php */