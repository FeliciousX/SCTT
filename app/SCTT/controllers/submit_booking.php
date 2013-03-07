<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit_booking extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->model('booking_model');
		$this->load->model('client_model');
		$this->load->model('captcha_model');
		$this->load->helper('array');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ( ! file_exists('app/SCTT/views/pages/submit_booking.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Submit Booking';

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		if ($this->form_validation->run())
		{
			if ($this->captcha_model->verify_captcha())
			{
				if( ! object_to_array($this->booking_model->get_all_booking_code_start()))
				{
					$this->booking_model->insert_booking();
				}

				$this->data['booking'] = object_to_array($this->booking_model->get_all_booking_code_start());

				if(object_to_array($this->client_model->get_client_by_email()))
				{
					$this->client_model->update_client_by_email();
				}
				else
				{
					$this->client_model->insert_client();
				}
				$this->data['client'] = object_to_array($this->client_model->get_client_by_email());
				$this->session->set_flashdata('success', 'Enquiry was successfully sent!');		
			}
			else
			{
				$this->session->set_flashdata('error', 'Please enter the characters that appears in the image correctly');
				redirect($this->session->flashdata('redirect'), 'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect($this->session->flashdata('redirect'), 'refresh');
		}

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);
		$this->load->view('pages/submit_booking', $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}

/* End of file submit_booking.php */
/* Location: ./app/SCTT/controllers/submit_booking.php */