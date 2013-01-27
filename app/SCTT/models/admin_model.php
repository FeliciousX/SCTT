<?php 

class Admin_model extends CI_Model {

    var $username = '';
    var $password = '';
    var $name = '';
    var $email = '';
    var $superuser = 0;

    function __construct()
    {
        parent::__construct();

        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->name = $this->input->post('name');
        $this->email = $this->input->post('email');
    }

    function get_all_admin()
    {
        $this->db->from('admin');
        // Generates: SELECT * FROM (`admin`)
    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function get_admin($username = '', $password = '')
    {
        $username == '' ? $username = $this->username : '';
        $password == '' ? $password = $this->password : '';

        $this->db->from('admin');
        $this->db->limit(1);
        $this->db->where('username', $username);
        $this->db->where('password', crypt($password, CRYPT_BLOWFISH));

        // Generates: SELECT * FROM (`admin`) WHERE `username` = {$username}
        //               AND `password` = {$password}
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        else {
            return false;
        }
    }

    function get_admin_by_username($username = '')
    {
        $username == '' ? $username = $this->username : '';

        $this->db->from('admin');
        $this->db->limit(1);
        $this->db->where('username', $username);

        // Generates: SELECT * FROM (`admin`) WHERE `username` = {$username}
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        else {
            return false;
        }
    }

    function get_admin_by_email($email = '')
    {
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');
        $this->db->limit(1);
        $this->db->where('email', $email);

        // Generates: SELECT * FROM (`admin`) WHERE `email` = {$email}
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        else {
            return false;
        }
    }

    function get_all_admin_like_username($username = '')
    {
        $username == '' ? $username = $this->username : '';

        $this->db->from('admin');
        $this->db->like('username', $username, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE username LIKE '%{$username}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function get_all_admin_like_email($email = '')
    {
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');
        $this->db->like('email', $email, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE email LIKE '%{$email}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function get_all_admin_like_name($name = '')
    {
        $name == '' ? $name = $this->name : '' ;

        $this->db->from('admin');
        $this->db->like('name', $name, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE name LIKE '%{$name}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function insert_admin($username = '', $password = '', $name = '', $email = '', $superuser = 0)
    {
        $username != '' ? $this->username = $username : '';
        $password != '' ? $this->password = $password : '';
        $name != '' ? $this->name = $name : '';
        $email != '' ? $this->email = $email : '';
        $superuser != 0 ? $this->superuser = $superuser : 0;

        $this->password = crypt($this->password, CRYPT_BLOWFISH);
        // Generates: INSERT INTO `admin` (username, password, name, email)
        // VALUES ({$username}, {$password}, {$name}, {$email})
        $query = $this->db->insert('admin', $this);

        return $query;
    }

    function update_admin($username = '', $password = '', $name = '', $email = '', $superuser = 0)
    {
        $username == '' ? $username = $this->username : '';
        $password == '' ? $password = $this->password : '';
        $name == '' ? $name = $this->name : '';
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');
        $this->password = crypt($this->password, CRYPT_BLOWFISH);

        $this->db->set('password', $password);
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('superuser', $superuser);

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET password = '{$password}', name = '{$name}',  email = '{$email}', superuser = '{$superuser}'
        // WHERE username = '{$username}'
        return $this->db->update();
    }

    function update_admin_email($username = '', $email = '')
    {
        $username == '' ? $username = $this->username : '';
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');

        $this->db->set('email', $email);

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET username = '{$username}', password = '{$password}', name = '{$name}'
        // WHERE email = '{$email}'
        return $this->db->update();
    }

    function delete_admin($username = '')
    {
        $username == '' ? $username = $this->username : '';

        $this->db->from('admin');
        $this->db->where('username', $username);

        // Generates: DELETE FROM admin
        // WHERE username = {$username}
        return $this->db->delete();
    }
}

/* End of file admin_model.php */
/* Location: ./app/models/admin_model.php */