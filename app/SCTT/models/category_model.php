<?php

class Category_model extends CI_Model {

	var $c_prefix = '';
	var $c_code = 0;
    var $description = '';
	var $c_name = '';
	var $c_link_to = '';

    /**
    * By default, in any initiation of the model. It will just take all the input by using post method
    * and store it in the variables.
    */
    function __construct()
    {
        parent::__construct();

        $this->c_prefix = $this->input->post('c_prefix');
    	$this->c_code = $this->input->post('c_code');
        $this->description = $this->input->post('description');
    	$this->c_name = $this->input->post('c_name');
    	$this->c_link_to = $this->input->post('c_link_to');
    	// Always from table category
    	$this->db->from('category');
    }

    function get_all_category()
    {
        // Generates: SELECT * FROM (`category`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_category_by_code($c_prefix = '', $c_code = 0)
    {
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;

    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);
    	$query = $this->db->get();

        // Generates: SELECT * FROM (`category`) WHERE `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
    	return $query->result();
    }

    function insert_category($c_prefix = '', $c_code = 0, $description = '', $c_name = '', $c_link_to = '')
    {
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;
        $description == '' ? '' : $this->description = $description;
        $c_name == '' ? '' : $this->c_name = $c_name;
        $c_link_to == '' ? '' : $this->c_link_to = $c_link_to;

        // Generates: INSERT INTO `category` (c_prefix, c_code, c_name, c_link_to)
        // VALUES ({$this->c_prefix}, {$this->c_code}, {$this->c_name}, {$this->c_link_to})
    	return $this->db->insert('category', $this);
    }

    function update_category($c_prefix = '', $c_code = 0, $description = '', $c_name = '', $c_link_to = '')
    {
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;
        $description == '' ? '' : $this->description = $description;
        $c_name == '' ? '' : $this->c_name = $c_name;
        $c_link_to == '' ? '' : $this->c_link_to = $c_link_to;

        $this->db->set('description', $this->description);
        $this->db->set('c_name', $this->c_name);
        $this->db->set('c_link_to', $this->c_link_to);

    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: UPDATE category
        // SET description = '{$this->description}', c_name = '{$this->c_name}', c_link_to = '{$this->c_link_to}'
        // WHERE c_prefix = '{$this->c_prefix}' AND c_code = '{$this->c_code}'
    	return $this->db->update('category', $this);
    }

    function update_category_by_name($c_prefix = '', $c_code = 0, $description = '', $c_name = '', $c_link_to = '')
    {
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;
        $description == '' ? '' : $this->description = $description;
        $c_name == '' ? '' : $this->c_name = $c_name;
        $c_link_to == '' ? '' : $this->c_link_to = $c_link_to;

        $this->db->set('c_prefix', $this->c_prefix);
        $this->db->set('c_code', $this->c_code);
        $this->db->set('description', $this->description);
        $this->db->set('c_link_to', $this->c_link_to);

    	$this->db->where('c_name', $this->c_name);

        // Generates: UPDATE category
        // SET c_prefix = '{$this->c_prefix}' , c_code = '{$this->c_code}' , description = '{$this->description}', c_link_to = '{$this->c_link_to}'
        // WHERE c_name = '{$this->c_name}'
    	return $this->db->update('category', $this);
    }

    function update_category_by_link()
    {
    	$this->db->where('c_link_to', $this->c_link_to);

        // Generates: UPDATE category
        // SET c_prefix = '{$this->c_prefix}' , c_code = '{$this->c_code}' , c_name = '{$this->c_name}'
        // WHERE c_link_to = '{$this->c_link_to}'
    	return $this->db->update('category', $this);
    }

    function delete_category()
    {
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);
    	$this->db->where('c_name', $this->c_name);
    	$this->db->where('c_link_to', $this->c_link_to);

        // Generates: DELETE FROM category
        // WHERE c_prefix = {$c_prefix} AND c_code = $c_code
        //      AND c_name = $c_name AND p_link_to = $p_link_to
    	return $this->db->delete('category');
    }

    function delete_category_by_code()
    {
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: DELETE FROM category
        // WHERE c_prefix = {$c_prefix} AND c_code = $c_code
    	return $this->db->delete('category');
    }

    function delete_category_by_name()
    {
    	$this->db->where('c_name', $this->c_name);

        // Generates: DELETE FROM category
        // WHERE c_name = {$c_name}
    	return $this->db->delete('category');
    }

    function delete_category_by_link()
    {
    	$this->db->where('c_link_to', $this->c_link_to);

        // Generates: DELETE FROM category
        // WHERE c_link_to = {$c_link_to}
    	return $this->db->delete('category');
    }
}

/* End of file category_model.php */
/* Location: ./app/models/category_model.php */
