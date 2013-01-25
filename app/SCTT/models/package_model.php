<?php

class Package_model extends CI_Model {

    var $p_code = 0;
	var $c_prefix = '';
	var $c_code = 0;
	var $p_name = '';
	var $price = 0.0;
    var $description = '';
    var $p_link_to = '';

    function __construct()
    {
        parent::__construct();

        $this->p_code = $this->input->post('p_code');
        $this->c_prefix = $this->input->post('c_prefix');
    	$this->c_code = $this->input->post('c_code');
    	$this->p_name = $this->input->post('p_name');
        $this->price = $this->input->post('price');
        $this->description = $this->input->post('description');
    	$this->p_link_to = $this->input->post('p_link_to');

        // Always get from table package ...
        $this->db->from('package');
    }

    function get_all_package()
    {
        // Generates: SELECT * FROM (`package`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_package_by_category()
    {
        $this->db->where('c_prefix', $this->c_prefix);
        $this->db->where('c_code', $this->c_code);

        // Generates: SELECT * FROM (`package`) WHERE `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
        $query = $this->db->get();

        return $query->result();
    }

    function get_package_by_code()
    {
        $this->db->where('p_code', $this->p_code);
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: SELECT * FROM (`package`)
        // WHERE `p_code` = {$this->p_code} AND `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
    	$query = $this->db->get();

    	return $query->result();
    }

    function insert_package()
    {
        // Generates: INSERT INTO `package` (p_code, c_prefix, c_code, p_name, p_link_to)
        // VALUES ({$this->p_code}, {$this->c_prefix}, {$this->c_code}, {$this->p_name}, {$this->p_link_to})
    	return $this->db->insert('package', $this);
    }

    function update_package_by_code()
    {
        $this->db->set('p_name', $this->p_name);
        $this->db->set('p_link_to', $this->p_link_to);

        $this->db->where('p_code', $this->p_code);
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: UPDATE package
        // SET p_name = '{$this->p_name}', p_link_to = '{$this->p_link_to}'
        // WHERE p_code = '{$this->p_code}' AND c_prefix = '{$this->c_prefix}' AND c_code = '{$this->c_code}'
    	return $this->db->update();
    }

    function update_package_by_name()
    {
        $this->db->set('p_code', $this->p_code);
        $this->db->set('c_prefix', $this->c_prefix);
        $this->db->set('c_code', $this->c_code);
        $this->db->set('p_link_to', $this->p_link_to);

    	$this->db->where('p_name', $this->p_name);

        // Generates: UPDATE package
        // SET p_code = '{$this->p_code}' , c_prefix = '{$this->c_prefix}' ,
        //      c_code = '{$this->c_code}' , p_link_to = '{$this->p_link_to}'
        // WHERE p_name = '{$this->p_name}'
    	return $this->db->update();
    }

    function update_package_by_link()
    {
        $this->db->set('p_code', $this->p_code);
        $this->db->set('c_prefix', $this->c_prefix);
        $this->db->set('c_code', $this->c_code);
        $this->db->set('p_name', $this->p_name);

    	$this->db->where('p_link_to', $this->p_link_to);

        // Generates: UPDATE package
        // SET p_code = '{$this->p_code}' , c_prefix = '{$this->c_prefix}' ,
        //      c_code = '{$this->c_code}' , p_name = '{$this->p_name}'
        // WHERE p_link_to = '{$this->p_link_to}'
    	return $this->db->update();
    }

    function delete_package()
    {
        $this->db->where('p_code', $this->p_code);
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);
    	$this->db->where('p_name', $this->p_name);
    	$this->db->where('p_link_to', $this->p_link_to);

        // Generates: DELETE FROM package
        // WHERE p_code = {$this->p_code} AND c_prefix = {$this->c_prefix} AND c_code = {$this->c_code}
        //      AND p_name = {$this->p_name} AND p_link_to = {$this->p_link_to}
    	return $this->db->delete();
    }

    function delete_package_by_code()
    {
        $this->db->where('p_code', $this->p_code);
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: DELETE FROM package
        // WHERE p_code = {$this->p_code} AND c_prefix = {$this->c_prefix} AND c_code = {$this->c_code}
    	return $this->db->delete();
    }

    function delete_package_by_name()
    {
    	$this->db->where('p_name', $this->p_name);

        // Generates: DELETE FROM package
        // WHERE p_name = {$this->p_name}
    	return $this->db->delete();
    }

    function delete_package_by_link()
    {
    	$this->db->where('p_link_to', $this->p_link_to);

        // Generates: DELETE FROM package
        // WHERE p_link_to = {$this->p_link_to}
    	return $this->db->delete();
    }
}

/* End of file package_model.php */
/* Location: ./app/models/package_model.php */