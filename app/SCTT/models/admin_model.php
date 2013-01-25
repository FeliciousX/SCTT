<?php

class Admin_model extends CI_Model {

    var $usernamme = '';
    var $password = '';
    var $name = '';
    var $email = '';

    function __construct()
    {
        parent::__construct();

        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->name = $this->input->post('name');
        $this->email = $this->input->post('email');

        // Always get from table admin ...
        $this->db->from('admin');
    }

    function get_all_admin()
    {
        // Generates: SELECT * FROM (`admin`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_admin_by_email()
    {
        $this->db->where('email', $this->email);

        // Generates: SELECT * FROM (`admin`) WHERE `email` = {$this->email}
        $query = $this->db->get();

        return $query->result();
    }

    function get_admin_like_name()
    {
        $this->db->like('name', $this->db->name, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE name LIKE '%{$this->db->name}%'
        $query = $this->db->get();

        return $query->result();
    }

    function insert_admin()
    {
        // Generates: INSERT INTO `admin` (username, password, name, email)
        // VALUES ({$this->username}, {$this->password}, {$this->name}, {$this->email})
        $this->db->insert('admin', $this);
    }

    function update_admin_by_username()
    {
        $this->db->set('password', $this->password);
        $this->db->set('name', $this->name);
        $this->db->set('email', $this->email);

        $this->db->where('username', $this->username);

        // Generates: UPDATE admin
        // SET password = '{$this->password}', name = '{$this->name}',  email = '{$this->email}'
        // WHERE username = '{$this->username}'
        return $this->db->update();
    }

    function update_admin_by_email()
    {
        $this->db->set('username', $this->username);
        $this->db->set('password', $this->password);
        $this->db->set('name', $this->name);

        $this->db->where('email', $this->email);

        // Generates: UPDATE admin
        // SET username = '{$this->username}', password = '{$this->password}', name = '{$this->name}'
        // WHERE email = '{$this->email}'
        return $this->db->update();
    }

    function delete_admin_by_username()
    {
        $this->db->where('username', $this->username);

        // Generates: DELETE FROM admin
        // WHERE username = {$this->username}
        return $this->db->delete();
    }

    function delete_admin_by_email()
    {
        $this->db->where('email', $this->email);

        // Generates: DELETE FROM admin
        // WHERE email = {$this->email}
        return $this->db->delete();
    }
}

/* End of file admin_model.php */
/* Location: ./app/models/admin_model.php */