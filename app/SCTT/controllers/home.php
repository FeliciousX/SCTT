<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		$this->load->model('banner_model');
		$this->load->model('image_model');
		$this->load->helper('array');
	}

	public function index()
	{
		if ( ! file_exists('app/SCTT/views/pages/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->data['title'] = 'Home'; // Capitalize the first letter

		$this->data['page_uri'] = uri_string();
		$this->data['nav_active'] = explode('/', $this->data['page_uri']);

		
		$this->data['query_c'] = $this->category_model->get_all_category();
		$counter = 0;

		foreach( object_to_array($this->data['query_c']) as $category)
		{
			if($category['featured'] != 0)
			{
				$this->data['query_p_by_c'] = $this->package_model->get_package_by_category($category['c_prefix'], $category['c_code']);
				$this->data['str_holder_c'][$counter] = $category;
				$this->data['str_holder_p'][$counter] = object_to_array($this->data['query_p_by_c']);
				for($i=0; $i<4; $i++)
				{
					$album = object_to_array($this->image_model->get_album_by_cp_code($category['c_prefix'], $category['c_code'], $this->data['str_holder_p'][0][$i]['p_code']));
					$this->data['images'][$counter][$i] = object_to_array(@$this->image_model->get_highlight_photos_by_id($album[0]['id']));
				}
				++$counter;
			}
		}

		$this->load->view('templates/head', $this->data);
		$this->load->view('templates/navbar', $this->data);

		$this->_populate_banner();
		$this->load->view('templates/banner', $this->data);
		$this->load->view('pages/home', $this->data);
		$this->load->view('templates/footer', $this->data);
	}


	/**
	* Populates the banner for the home page.
	*
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

}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/home.php */