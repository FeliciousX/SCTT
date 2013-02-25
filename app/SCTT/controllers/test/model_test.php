<?php
require_once(APPPATH . '/controllers/test/Toast.php');

class Model_test extends Toast
{

	function Model_test()
	{
		parent::Toast(__FILE__);
		// Load any models, libraries etc. you need here
	}

	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {}

	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->My_model->getError();
	 */
	function _post() {}

	function test_model_category()
	{
		$this->load->model('setup/category');

		$drop = $this->category->drop_table();

		$this->_assert_true($drop);

		$var = $this->category->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE category created";

	}

	function test_model_package()
	{
		$this->load->model('setup/package');

		$drop = $this->package->drop_table();

		$this->_assert_true($drop);

		$var = $this->package->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE package created";

	}

	function test_model_client()
	{
		$this->load->model('setup/client');

		$drop = $this->client->drop_table();

		$this->_assert_true($drop);

		$var = $this->client->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE client created";

	}

	function test_model_admin()
	{
		$this->load->model('setup/admin');

		$drop = $this->admin->drop_table();

		$this->_assert_true($drop);

		$var = $this->admin->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE admin created";

	}

	function test_model_booking()
	{
		$this->load->model('setup/booking');

		$drop = $this->booking->drop_table();

		$this->_assert_true($drop);

		$var = $this->booking->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE booking created";

	}

	function test_model_photo_link()
	{
		$this->load->model('setup/photo_link');

		$drop = $this->photo_link->drop_table();

		$this->_assert_true($drop);

		$this->message = "TABLE photo link deleted";

	}

	function test_model_banner()
	{
		$this->load->model('setup/banner');

		$drop = $this->banner->drop_table();

		$this->_assert_true($drop);

		$var = $this->banner->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE banner created";
	}

	function test_model_captcha()
	{
		$this->load->model('setup/captcha');

		$drop = $this->captcha->drop_table();

		$this->_assert_true($drop);

		$var = $this->captcha->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE captcha created";
	}
}

// End of file example_test.php */
// Location: ./system/application/controllers/test/example_test.php */