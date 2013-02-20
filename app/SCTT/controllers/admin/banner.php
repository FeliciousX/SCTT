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
	}

	/**
	 * Index Page for this controller. Shows error 404 if page not found.
	 */
	public function index()
	{
		if ( ! file_exists('../app/SCTT/views/admin/banner.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->data['title'] = 'Banner';

		$this->data['item']['img'] = array(
			echo img('img/category/1.jpg'),
			echo img('img/category/2.jpg')
			);

		$this->data['caption'] = array(
			'<div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>');

		$this->load->view('admin/templates/head', $this->data);
		$this->load->view('admin/templates/navbar', $this->data);
		$this->load->view('admin/banner', $this->data);
		$this->load->view('admin/templates/footer', $this->data);

	}
}

/* End of file home.php */
/* Location: ./app/SCTT/controllers/admin/banner.php */