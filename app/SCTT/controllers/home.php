<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('package_model');
		// $this->load->model('banner');
		$this->load->helper('array');
	}

	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/pages/home.php'))
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

	private function _populate_banner()
	{
		$this->data['item']['img'] = array(
			img('img/category/1.jpg'),
			img('img/category/2.jpg'),
			img('img/category/3.jpg'),
			img('img/category/4.jpg')
			);

		$this->data['item']['caption'] = array(
			'<div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>',
          '<div class="container">
            <div class="carousel-caption">
              <h1>Anotheraa example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>',
          '<div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>',
          '<div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>');
	}

}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/home.php */