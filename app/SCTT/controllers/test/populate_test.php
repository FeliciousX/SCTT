<?php
require_once(APPPATH . '/controllers/test/Toast.php');

class Populate_test extends Toast
{

	function Populate_test()
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

	function test_populate_category()
	{
		$this->load->model('category_model');
		$this->load->model('setup/category');
		$this->message = 'Populating Category Table';

		$truncate = $this->category->clear_table();
		$this->_assert_true($truncate);

		$var = $this->category_model->insert_category('A', 1, '', 'Day Tours From Kuching', 1);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 2, '', 'Overnight Tours From Kuching', 2);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 3, '', 'Overnight Tours From Miri', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 4, '', 'Into The Heart of Borneo From Miri', 3);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 5, '', 'Across Borneo From Kuching', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 6, '', 'Conservation & Special Interest', 4);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 7, '', 'Bird Watching Tour Packages', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 8, '', 'Sabah Highlights', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 9, '', 'Borneo Dive', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 10, '', 'Winter Get-away 2 Borneo', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 11, '', 'Sandakan Day Tour Package', 0);
		$this->_assert_true($var);

		$var = $this->category_model->insert_category('A', 12, '', 'Sandakan Overnight Tour Package', 0);
		$this->_assert_true($var);
	}

	function test_populate_package()
	{
		$this->load->model('package_model');
		$this->load->model('setup/package');
		$this->message = 'Populating Package Table';

		$truncate = $this->package->clear_table();
		$this->_assert_true($truncate);

		$var = $this->package_model->insert_package('001', 'A', 1, 'Kuching City Tour', 1000.00, 'Kuching City, the state capital of Sarawak is absolutely unique with its charm and easy grace. The Sarawak river that runs through the city centre divides the city into Kuching City North and Kuching City South. Kuching city is well preserved with old shopping bazaars, ornate chinese temples, the old stste mosque, colonial administrative buildings and the beautiful Kuching Waterfront. This tour takes you to the city tower for the panoramic view of the city and a visit to the famed Sarawak Museum – the finest Museum in Southeast Asia. Drive past the old state mosque and stop at the beautiful Kuching Waterfront to view the palace of the White Rajah and the magnificent Sarawak State Legislative Building across the river.', '1 Hour');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 1, 'Sarawak Cultural Village', 800.00, 'Sample description.', '2 Hours');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 1, 'Bidayuh Longhouse Experience', 0.00, 'Sample description', '3 Hours');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('004', 'A', 1, 'Frogs of Borneo', 2000.00, 'Sample Decription', '7 Hours');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 2, 'Orang Utan Conservation Programme', 2500.00, 'Sample description', '2 Hours');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 2, 'Bako National Park and Wildlife Experience', 300.50, 'Sample description', '3 Hours');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 2, 'Iban Longhouse Safari', 0.50, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('004', 'A', 2, 'Longhouse & Batang Ai Resort', 0.05, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('005', 'A', 2, 'Batang Ai Resort & Iban Longhouse Experience', 1.12, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('006', 'A', 2, 'Batang Ai Rainforest Explorer', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('007', 'A', 2, 'Sarawak Sea Turtle Conservation Program at Talang-Talang Island');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 3, 'Mulu National Park & World Heritage Site', 320.20, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 3, 'Mulu National Park & Pinnacles', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 3, 'Borneo Headhunter Trail', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 4, 'In Search of Borneo Nomads', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 4, 'Long Banga & Borneo Heartland', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 4, 'Long Lellang & Borneo Heartland', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('004', 'A', 4, 'Bario Highland Trek in Borneo Heartland', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 5, 'Borneo Exclusive Package', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 5, 'Heart of Borneo', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 6, 'Frog Tours - Kubah National Park', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 6, 'Turtle Conservation Tours', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 6, 'Sarawak Sea Turtle Conservation Program And Borneo Experience', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('004', 'A', 6, 'Orang Utan Conservation Programme and The Wild Man of Borneo', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 7, 'That\'s the Bird Tour of Borneo', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 8, 'Day Tour - Kinabalu Park & Canopy Walk', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 8, 'Sandakan Turtle & Sukau Wildlife Expedition', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 9, 'Borneo Dive & Pom Pom Island', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 10, 'Winter Get-away 2 Borneo', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 11, 'Half Day Sandakan City Tour', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 11, 'Half Day Sepilok Tour', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('003', 'A', 11, 'Full Day Sepilok & City Tour', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('001', 'A', 12, 'Sukau', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);

		$var = $this->package_model->insert_package('002', 'A', 12, 'Sukau & Ox.Bow Lake', 0.00, 'Sample description.', '2 Days 1 Night');
		$this->_assert_true($var);
	}

	function test_populate_photo_link()
	{
		$this->load->model('photo_link_model');
		$this->load->model('setup/photo_link');
		$this->message = 'Populating photo_link table';

		$truncate = $this->photo_link->clear_table();
		$this->_assert_true($truncate);

		$var = $this->photo_link_model->insert_photo_link(1, 'A', 1, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(2, 'A', 1, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(3, 'A', 1, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(4, 'A', 1, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(5, 'A', 1, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(1, 'A', 2, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(2, 'A', 2, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(3, 'A', 2, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(4, 'A', 2, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(1, 'A', 3, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(2, 'A', 3, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(3, 'A', 3, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(4, 'A', 3, '', '');
		$this->_assert_true($var);

		$var = $this->photo_link_model->insert_photo_link(5, 'A', 3, '', '');
		$this->_assert_true($var);
	}

	function test_populate_admin($username = 'admin')
	{
		$this->load->model('admin_model');

		$var = $this->admin_model->delete_admin($username);
		$this->_assert_true($var);

		$var = $this->admin_model->insert_admin($username, '12345', 'Admin', 'admin@borneo4u.com', 2);
		$this->_assert_true($var);
	}

	function test_populate_banner()
	{
		$this->load->model('banner_model');
		$this->load->model('setup/banner');
		$this->load->helper('html');
		$this->message = 'Populating Banner Table';

		$truncate = $this->banner->clear_table();
		$this->_assert_true($truncate);

		$var = $this->banner_model->insert_banner(1, 'img/category/1.jpg', 1, 'Example headline.', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Sign up today');
		$this->_assert_true($var);

		$var = $this->banner_model->insert_banner(2, 'img/category/2.jpg', 1, 'Anotheraa example headline.', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Learn more');
		$this->_assert_true($var);

		$var = $this->banner_model->insert_banner(3, 'img/category/3.jpg', 1, 'One more for good measure', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id', 'Browse Gallery');
		$this->_assert_true($var);
	}
}

// End of file example_test.php */
// Location: ./system/application/controllers/test/example_test.php */