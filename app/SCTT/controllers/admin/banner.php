<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* This controller edits the featured packages that will be shown in the home
* page in the dynamic banner
*
* @author FeliciousX
*/
class Banner extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'directory', 'array'));
		$this->load->model('banner_model');

		$this->data['sidebar'] = array(
			anchor('admin/banner/edit', 'Edit Banner'),
			anchor('admin/banner/add', 'Add Banner'),
			anchor('admin/banner/delete', 'Delete Banner')
			);

		$this->data['sidebar_attributes'] = array(
			'class' => 'sidebar nav nav-tabs nav-stacked',
			'id' => 'sidebar'
			);
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->edit();
	}

	public function edit()
	{
		if ( ! file_exists('../app/SCTT/views/admin/banner/edit.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Edit Banner';

		$this->_populate_edit_banner_form();

		$config['upload_path'] = './img/banner/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '2048';
		$config['max_width']  = '2340';
		$config['max_height']  = '1100';

		$this->load->library('upload', $config);

		$map = directory_map('./img/banner');

		if ($this->input->post('submit'))
		{
			$this->_edit_submit();			
		}

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->_populate_banner();
		$this->load->view('templates/banner', $this->data);
		$this->load->view('admin/banner/edit', $this->data);
		$this->load->view('admin/templates/footer', $this->data);
	}

	private function _edit_submit()
	{
		$id = $this->input->post('page');
		$caption = $this->input->post('caption');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$button = $this->input->post('button');
		$link = $this->input->post('link');

		if (TRUE /*$this->form_validation->run()*/) {
			if ($this->upload->do_upload())
			{
				$file = $this->upload->data();

				$img = 'img/banner/' . $file['file_name'];

				$this->banner_model->update_banner_img($id, $img);
			}
		}	

		$this->banner_model->update_banner_name($id, $title, $description, $button, $link);
		$this->banner_model->update_banner_caption($id, $caption);
	}

	/**
	* Makes a copy of the banner at home page.
	*/
	private function _populate_banner()
	{
		$query = object_to_array($this->banner_model->get_all_banner());

		$this->data['item']['img'][0] = '';
		$this->data['item']['caption'][0] = '';

		$i = 0;

		if ($query)
		{
			foreach ($query as $item)
			{
				$this->data['item']['img'][$i] = '';
				$this->data['item']['caption'][$i] = '';
				$this->data['item']['img'][$i] = img($item['img']);

				$item['link'] = implode(explode(' ', $item['link']), '_');

				if ($item['caption'] == 1)
				{
					$this->data['item']['caption'][$i] = "<div class=\"container\"><div class=\"carousel-caption\"><h1>{$item['title']}</h1>
					<p class=\"lead\">{$item['description']}</p>
					<a class=\"btn btn-large btn-primary\" href=\"" . base_url($item['link']) ."\">{$item['button']}</a>
					</div>
					</div>";
				}

				$i++;
			}
		}
		
	}

	private function _populate_edit_banner_form()
	{
		$this->data['form']['head'] = array(
			'class' => 'form-horizontal',
			'id' => 'edit_banner',
			'onsubmit' => 'return validateAddAdminForm()'
			);		

		$this->data['form']['page'] = array();

		$pages = count($this->banner_model->get_all_banner());

		for ($i=1; $i <= $pages; $i++)
		{
			$this->data['form']['page'][$i] = $i;
		}

		$this->data['form']['selected_page'] = $pages;

		$this->data['form']['image'] = array(
			'name' => 'userfile',
			'id' => 'userfile',
			'accept' => 'image/jpeg'
			);

		$this->data['form']['caption'] = array(
			1 => 'Yes',
			0 => 'No'
			);

		$this->data['form']['title'] = array(
			'name' => 'title',
			'id' => 'title',
			'placeholder' => 'Caption Title'
			);

		$this->data['form']['description'] = array(
			'name' => 'description',
			'id' => 'description',
			'placeholder' => 'Caption Description'
			);

		$this->data['form']['button'] = array(
			'name' => 'button',
			'id' => 'button',
			'placeholder' => 'Caption Button'
			);

		$this->data['form']['link'] = array(
			'name' => 'link',
			'id' => 'link',
			'placeholder' => 'Where the button will link to...'
			);

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Save Changes'
			);

		$this->data['form']['clear'] = array(
			'name' => 'reset',
			'id' => 'clear',
			'class' => 'btn btn-inverse',
			'value' => 'Clear'
			);
	}

	public function add()
	{
		$pages = count($this->banner_model->get_all_banner());

		$this->banner_model->insert_banner(($pages + 1), '', '', '', '', '', '');

		$this->data['form']['selected_page'] = $pages + 1;

		redirect('/admin/banner', 'refresh');
	}

	public function delete()
	{
		if ( ! file_exists('../app/SCTT/views/admin/banner/delete.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->input->post('submit')) //  && $this->form_validation->run()
		{
			$this->banner_model->delete_banner($this->input->post('page'));		
		}

		$this->data['title'] = 'Delete Banner';

		$this->_populate_delete_banner_form();		

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->_populate_banner();
		$this->load->view('templates/banner', $this->data);
		$this->load->view('admin/banner/delete', $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}

	private function _populate_delete_banner_form()
	{
		$this->data['form']['head'] = array(
				'class' => 'form-horizontal',
				'id' => 'delete_banner',
				'onsubmit' => 'return validateAddAdminForm()'
				);		

		$this->data['form']['page'] = array();

		$pages = count($this->banner_model->get_all_banner());

		for ($i=1; $i <= $pages; $i++)
		{
			$this->data['form']['page'][$i] = $i;
		}

		$this->data['form']['submit'] = array(
			'name' => 'submit',
			'id' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Delete Banner'
			);
	}
}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/admin/banner.php */