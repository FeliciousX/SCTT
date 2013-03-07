<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the admin table.
*
* @author FeliciousX
*/
class Admin_model extends CI_Model {

    var $username = '';
    var $password = '';
    var $name = '';
    var $email = '';
    var $superuser = 0; // 0 = Normal Admin, 1 = Super Admin, 2 = Highest Authority

    /**
    * The constructor automatically populate the variables from the post input.
    */
    function __construct()
    {
        parent::__construct();

        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->name = $this->input->post('name');
        $this->email = $this->input->post('email');
        $this->superuser = $this->input->post('superuser');
    }

    /**
    * Query for all admin accounts
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_all_admin()
    {
        $this->db->from('admin');
        $this->db->select('username, name, email, superuser');
        $this->db->order_by('username', 'asc');

        // Generates: SELECT username, name, email FROM (`admin`) ORDER BY name ASC
    	$query = $this->db->get();

    	if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for specific admin with the matching username and password
    *
    * @access   public
    * @param    $username string
    * @param    $password string
    * @return   object or FALSE
    */
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

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for an admin with the matching username
    *
    * @access   public
    * @param    string
    * @return   object or FALSE
    */
    function get_admin_by_username($username = '')
    {
        $username == '' ? $username = $this->username : '';

        $this->db->from('admin');
        $this->db->limit(1);
        $this->db->where('username', $username);

        // Generates: SELECT * FROM (`admin`) WHERE `username` = {$username}
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for an admin with the matching email
    *
    * @access   public
    * @param    string
    * @return   object or FALSE
    */
    function get_admin_by_email($email = '')
    {
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');
        $this->db->limit(1);
        $this->db->where('email', $email);

        // Generates: SELECT * FROM (`admin`) WHERE `email` = {$email}
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for all admin that has username that contains $username
    *
    * @access   public
    * @param    string
    * @return   array of object
    */
    function get_all_admin_like_username($username = '')
    {
        $username == '' ? $username = $this->username : '';

        $this->db->from('admin');
        $this->db->select('username, name, email, superuser');
        $this->db->order_by('username', 'asc');

        $this->db->like('username', $username, 'both');

        // Generates: SELECT username, name, email FROM (`admin`) WHERE username LIKE '%{$username}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for all admin that has email that contains $email
    *
    * @access   public
    * @param    string
    * @return   array of object
    */
    function get_all_admin_like_email($email = '')
    {
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');
        $this->db->select('username, name, email, superuser');
        $this->db->order_by('email', 'asc');

        $this->db->like('email', $email, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE email LIKE '%{$email}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Query for all admin that has name that contains $name
    *
    * @access   public
    * @param    string
    * @return   array of object
    */
    function get_all_admin_like_name($name = '')
    {
        $name == '' ? $name = $this->name : '' ;

        $this->db->from('admin');
        $this->db->select('username, name, email, superuser');
        $this->db->order_by('name', 'asc');

        $this->db->like('name', $name, 'both');

        // Generates: SELECT * FROM (`admin`) WHERE name LIKE '%{$name}%'
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Insert a new admin to the database
    *
    * @access   public
    * @param    $username string
    * @param    $password string
    * @param    $name string
    * @param    $email string
    * @param    $superuser integer
    * @return   boolean
    */
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

    /**
    * Update an admin's password with matching username
    *
    * @access   public
    * @param    $username string
    * @param    $password string
    * @return   boolean
    */
    function update_admin_password($username = '', $password = '')
    {
        $username == '' ? $username = $this->username : '';
        $password == '' ? $password = $this->password : '';

        $this->db->from('admin');

        $this->db->set('password', crypt($password, CRYPT_BLOWFISH));

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET password = '{$password}'
        // WHERE username = '{$username}'
        return $this->db->update();
    }

    /**
    * Update an admin's name with matching username
    *
    * @access   public
    * @param    $username string
    * @param    $name string
    * @return   boolean
    */
    function update_admin_name($username = '', $name = '')
    {
        $username == '' ? $username = $this->username : '';
        $name == '' ? $name = $this->name : '';

        $this->db->from('admin');

        $this->db->set('name', $name);

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET name = '{$name}'
        // WHERE username = '{$username}'
        return $this->db->update();
    }

    /**
    * Update an admin's email with matching username
    *
    * @access   public
    * @param    $username string
    * @param    $email string
    * @return   boolean
    */
    function update_admin_email($username = '', $email = '')
    {
        $username == '' ? $username = $this->username : '';
        $email == '' ? $email = $this->email : '';

        $this->db->from('admin');

        $this->db->set('email', $email);

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET email = '{$email}'
        // WHERE username = '{$username}'
        return $this->db->update();
    }

    /**
    * Update an admin's rank with matching username
    *
    * @access   public
    * @param    $username string
    * @param    $superuser integer
    * @return   boolean
    */
    function update_admin_superuser($username = '', $superuser = 0)
    {
        $username == '' ? $username = $this->username : '';
        $superuser == 0 ? $superuser = $this->superuser : 0;

        $this->db->from('admin');

        $this->db->set('superuser', $superuser);

        $this->db->where('username', $username);

        // Generates: UPDATE admin
        // SET superuser = '{$superuser}'
        // WHERE username = '{$username}'
        return $this->db->update();
    }

    /**
    * Deletes an admin from the database with the matching username
    *
    * @access   public
    * @param    string
    * @return   boolean
    */
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