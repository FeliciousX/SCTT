<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**

* The category page shows all the category information

*

* @author Infinia

*/

class Packages extends Admin_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('category_model');

		$this->load->model('package_model');

		$this->load->model('image_model');

		$this->load->helper('array');

		$this->load->helper('file');

	}



	/**

	 * Index Page for this controller. Shows error 404 if page not found.

	 * @var page - string for page name

	 */

	public function index($code = '')

	{

		if ( ! file_exists('app/SCTT/views/admin/packages.php'))

		{

			// Whoops, we don't have a page for that!

			show_404();

		}



		$this->data['title'] = 'Packages'; // Capitalize the first letter



		if($code == '')

		{

			$code = 'A1';

		}



		$c_prefix = substr($code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)

		$c_code = substr($code, 1); 		// Obtains c_code (undetermined length of numbers)

		$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));

		$this->data['query_c'] = object_to_array($this->category_model->get_all_category());

		$this->data['query_p_by_c'] = object_to_array($this->package_model->get_package_by_category($c_prefix, $c_code));



		$this->load->view('admin/templates/head', $this->data);

		$this->load->view('admin/templates/navbar', $this->data);

		$this->load->view('admin/packages', $this->data);

		$this->load->view('admin/templates/footer', $this->data);



	}



	public function edit($cp_code = '')

	{

		if ( ! file_exists('app/SCTT/views/admin/packages.php'))

		{

			// Whoops, we don't have a page for that!

			show_404();

		}



		$this->data['title'] = 'Edit Package'; // Capitalize the first letter



		if($cp_code == '')

		{

			show_404();

		}



		if($this->input->post('p_code') != '')

		{

			$this->package_model->update_package_by_code();

			redirect('admin/packages' . '/' . $this->input->post('c_prefix') . $this->input->post('c_code'), 'refresh');

		}

		else

		{

			$c_prefix = substr($cp_code, 0, 1); 		// Obtains c_prefix (only 1 alphabet)

			$code = explode('-', $cp_code);

			$c_code = (int) substr($code[0], 1);		// Obtains c_code

			$p_code = (int) $code[1];					// Obtains p_code



			$this->data['query_c_specific'] = object_to_array($this->category_model->get_category_by_code($c_prefix, $c_code));

			$this->data['query_p_specific'] = object_to_array($this->package_model->get_package_by_code($p_code, $c_prefix, $c_code));



			$this->load->view('admin/templates/head', $this->data);

			$this->load->view('admin/templates/navbar', $this->data);

			$this->load->view('admin/packages/edit', $this->data);

			$this->load->view('admin/templates/footer', $this->data);

		}

	}



	public function insert($code = '')

	{

		if ( ! file_exists('app/SCTT/views/admin/packages.php'))

		{

			// Whoops, we don't have a page for that!

			show_404();

		}



		$this->data['title'] = 'Add New Package'; // Capitalize the first letter



		if($this->input->post('p_code') != '')

		{

			$p_code = ltrim($this->input->post('p_code'), '0');



			if($this->input->post('p_code') < 10)

			{

				$p_code = '00' . $p_code;

			}

			else if($this->input->post('p_code') < 100)

			{

				$p_code = '0' . $p_code;

			}

			else

			{	}



			$this->package_model->insert_package($p_code, $this->input->post('c_prefix'), $this->input->post('c_code'), $this->input->post('p_name') ,$this->input->post('price'), $this->input->post('description'), $this->input->post('duration'));

			redirect('admin/packages/' . $this->input->post('c_prefix') . $this->input->post('c_code'), 'refresh');

		}

		else

		{

			if($code == '')

			{

				show_404();

			}



			$this->data['c_prefix'] = substr($code, 0, 1); 	// Obtains c_prefix (only 1 alphabet)

			$this->data['c_code'] = substr($code, 1); 		// Obtains c_code (undetermined length of numbers)



			$this->load->view('admin/templates/head', $this->data);

			$this->load->view('admin/templates/navbar', $this->data);

			$this->load->view('admin/packages/insert', $this->data);

			$this->load->view('admin/templates/footer', $this->data);

		}

	}



	public function delete($cp_code = '')

	{

		if ( ! file_exists('app/SCTT/views/admin/packages.php'))

		{

			// Whoops, we don't have a page for that!

			show_404();

		}



		$c_prefix = substr($cp_code, 0, 1); 		// Obtains c_prefix (only 1 alphabet)

		$code = explode('-', $cp_code);

		$c_code = (int) substr($code[0], 1);		// Obtains c_code

		$p_code = (int) $code[1];					// Obtains p_code

		$album = object_to_array($this->image_model->get_album_by_cp_code($c_prefix, $c_code, $p_code));

		$this->package_model->delete_package_by_code($p_code, $c_prefix, $c_code);

		$this->image_model->delete_photos_by_album($album[0]['id']);

		$this->image_model->delete_album_by_cp_code($c_prefix, $c_code, $p_code);

		delete_files(getcwd() . '/uploads/gallery-' . $album[0]['id']);

		rmdir(getcwd() . '/uploads/gallery-' . $album[0]['id']);

		redirect('admin/packages' . '/' . $c_prefix . $c_code, 'refresh');

	}

}



/* End of file packages.php */

/* Location: ./app/SCTT/controllers/admin/packages.php */