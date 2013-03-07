<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* The testimonial page
*
* @author Infinia
*/
class Testimonial extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('testimonial_model');
		$this->load->helper('array');
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 *
	 */
	public function index()
	{
		if ( ! file_exists('app/SCTT/views/admin/testimonial.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Testimonial'; // Capitalize the first letter

		$this->data['query'] = object_to_array($this->testimonial_model->get_all_testimonial());

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/testimonial', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function edit($id = 0)
	{
		if ( ! file_exists('app/SCTT/views/admin/testimonial.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Edit Testimonial'; // Capitalize the first letter

		if($this->input->post('source')!='')
		{
			$this->testimonial_model->update_testimonial_by_id($this->input->post('id'));
			redirect(base_url('admin/testimonial'), 'refresh');
		}

		if($id==0)
		{
			show_404();
		}
		
		$this->data['query'] = object_to_array($this->testimonial_model->get_testimonial_by_id($id));

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/testimonial/edit', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	public function insert()
	{
		if ( ! file_exists('app/SCTT/views/admin/testimonial.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		if($this->input->post('source')!= '')
		{
			$this->testimonial_model->insert_testimonial();
		}

		redirect(base_url('admin/testimonial'), 'refresh');
	}

	public function delete($id = 0)
	{
		if ( ! file_exists('app/SCTT/views/admin/testimonial.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->testimonial_model->delete_testimonial_by_id($id);
		redirect(base_url('admin/testimonial'), 'refresh');
	}

}

/* End of file testimonial.php */
/* Location: ./app/SCTT/controllers/admin/testimonial.php */