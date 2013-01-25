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

		$var = $this->photo_link->create_table();

		$this->_assert_true($var);

		$this->message = "TABLE photo link created";

	}

	function test_populate_category()
	{
		$this->load->model('category_model');
		$this->load->model('setup/category');
		$this->message = 'Populating Category Table';

		$truncate = $this->category->clear_table();
		$this->_assert_true($truncate);

		$var = $this->category_model->insert_category('A', 1, '', 'Day Tours From Kuching', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 2, '', 'Overnight Tours From Kuching', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 3, '', 'Overnight Tours From Miri', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 4, '', 'Into The Heart of Borneo From Miri', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 5, '', 'Across Borneo From Kuching', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 6, '', 'Conservation & Special Interest', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 7, '', 'Bird Watching Tour Packages', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 8, '', 'Sabah Highlights', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 9, '', 'Borneo Dive', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 10, '', 'Winter Get-away 2 Borneo', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 11, '', 'Sandakan Day Tour Package', '', '', '');
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 12, '', 'Sandakan Overnight Tour Package', '', '', '');
		$this->_assert_true($var);
	}

}

// End of file example_test.php */
// Location: ./system/application/controllers/test/example_test.php */