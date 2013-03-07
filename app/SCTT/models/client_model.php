<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the client table
*
* @author FeliciousX
*/
class Client_model extends CI_Model {

    var $first_name = '';
    var $last_name = '';
    var $email = '';
    var $contact_no = '';
    var $fax_no = '';
    var $address = '';
    var $country = '';

    function __construct()
    {
        parent::__construct();

        $this->first_name = $this->input->post('first_name');
        $this->last_name = $this->input->post('last_name');
        $this->email = $this->input->post('email');
        $this->contact_no = $this->input->post('contact_no');
        $this->fax_no = $this->input->post('fax_no');
        $this->address = $this->input->post('address');
        $this->country = $this->input->post('country');

        // Always get from table client ...
        // $this->db->from('client');
    }

    function get_all_client()
    {
        // Generates: SELECT * FROM (`client`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_client_by_email()
    {
        $this->db->from('client');
        $this->db->where('email', $this->email);

        // Generates: SELECT * FROM (`client`) WHERE `email` = {$this->email}
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_by_email_param($email = '')
    {
        $email == '' ? '' : $this->email = $email;
        $this->db->from('client');
        $this->db->where('email', $this->email);

        // Generates: SELECT * FROM (`client`) WHERE `email` = {$this->email}
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_by_contact_no()
    {
        $this->db->where('contact_no', $this->contact_no);

        // Generates: SELECT * FROM (`client`) WHERE `contact_no` = {$this->contact_no}
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_by_country()
    {
        $this->db->where('country', $this->country);

        // Generates: SELECT * FROM (`client`) WHERE `country` = {$this->country}
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_like_name()
    {
        $this->db->like('first_name', $this->db->first_name, 'both');
        $this->db->like('last_name', $this->db->last_name, 'both');

        // Generates: SELECT * FROM (`client`) WHERE first_name LIKE '%{$this->db->first_name}%'
        //              AND last_name LIKE '%{$this->db->last_name}%'
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_like_first_name()
    {
        $this->db->like('first_name', $this->db->first_name, 'both');

        // Generates: SELECT * FROM (`client`) WHERE first_name LIKE '%{$this->db->first_name}%'
        $query = $this->db->get();

        return $query->result();
    }

    function get_client_like_last_name()
    {
        $this->db->like('last_name', $this->db->last_name, 'both');

        // Generates: SELECT * FROM (`client`) WHERE last_name LIKE '%{$this->db->last_name}%'
        $query = $this->db->get();

        return $query->result();
    }

    function insert_client()
    {
        // Generates: INSERT INTO `client` (first_name, last_name, email, contact_no, fax_no, address, country)
        // VALUES ({$this->first_name}, {$this->last_name}, {$this->email},
        //      {$this->contact_no}, {$this->fax_no}, {$this->address}, >country})
        $this->db->insert('client', $this);
    }

    function update_client_by_email()
    {
        $this->db->from('client');
        
        $this->db->set('first_name', $this->first_name);
        $this->db->set('last_name', $this->last_name);
        $this->db->set('contact_no', $this->contact_no);
        $this->db->set('fax_no', $this->fax_no);
        $this->db->set('address', $this->address);
        $this->db->set('country', $this->country);

        $this->db->where('email', $this->email);

        // Generates: UPDATE client
        // SET first_name = '{$this->first_name}', last_name = '{$this->last_name}', contact_no = '{$this->contact_no}'
        //      fax_no = '{$this->fax_no}', address = '{$this->address}', country = '{$this->country}'
        // WHERE email = '{$this->email}'
        return $this->db->update();
    }

    function update_client_by_contact_no()
    {
        $this->db->set('first_name', $this->first_name);
        $this->db->set('last_name', $this->last_name);
        $this->db->set('email', $this->email);
        $this->db->set('fax_no', $this->fax_no);
        $this->db->set('address', $this->address);
        $this->db->set('country', $this->country);

        $this->db->where('contact_no', $this->contact_no);

        // Generates: UPDATE client
        // SET first_name = '{$this->first_name}', last_name = '{$this->last_name}',  = '{$this->email}'
        //      fax_no = '{$this->fax_no}', address = '{$this->address}', country = '{$this->country}'
        // WHERE contact_no = '{$this->contact_no}'
        return $this->db->update();
    }

    function delete_client_by_email()
    {
        $this->db->where('email', $this->email);

        // Generates: DELETE FROM client
        // WHERE email = {$this->email}
        return $this->db->delete();
    }

    function delete_client_by_contact_no()
    {
        $this->db->where('contact_no', $this->contact_no);

        // Generates: DELETE FROM client
        // WHERE contact_no = {$this->contact_no}
        return $this->db->delete();
    }

}

/* End of file client_model.php */
/* Location: ./app/models/client_model.php */