<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the photo_link table.
*
* @author FeliciousX
*/
class Photo_link_model extends CI_Model {

    var $p_code = 0; // 0 means no package. Just the category
    var $c_prefix = '';
    var $c_code = 0;
    var $photo_link = '';
    var $file_list = '';

    /**
    * The constructor automatically populate the variables from the post input.
    */
    function __construct()
    {
        parent::__construct();

        $this->p_code = $this->input->post('p_code');
        $this->c_prefix = $this->input->post('c_prefix');
        $this->c_code = $this->input->post('c_code');
        $this->photo_link = $this->input->post('photo_link');
        $this->file_list = $this->input->post('file_list');
    }

    /**
    * Query for all photo_links
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_all_photo_link()
    {
        $this->db->from('photo_link');

        // Generates: SELECT * FROM (`photo_link`)
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
    * Query for all photo_links without packages
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_all_photo_link_category()
    {
        $this->db->from('photo_link');
        $this->db->where('p_code', 0);

        // Generates: SELECT * FROM (`photo_link`) WHERE `p_code` = 0
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
    * Query for all photo_link with packages
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_all_photo_link_packages()
    {
        $this->db->from('photo_link');
        $this->db->where('p_code !=', 0);

        // Generates: SELECT * FROM (`photo_link`) WHERE `photo_link` != 0
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
    * Query for specific photo_link category
    *
    * @access   public
    * @param    $c_prefix string
    * @param    $c_code integer
    * @return   object or FALSE
    */
    function get_photo_link_category($c_prefix = '', $c_code = 0)
    {
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;

        $this->db->from('photo_link');
        $this->db->limit(1);
        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);

        $qeury = $this->db->get();

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
    * Query for specific photo_link package
    *
    * @access   public
    * @param    $c_prefix string
    * @param    $c_code integer
    * @param    $p_code integer
    * @return   object or FALSE
    */
    function get_photo_link_package($c_prefix = '', $c_code = 0, $p_code = 0)
    {
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;
        $p_code == 0 ? $p_code = $this->p_code : 0;

        $this->db->from('photo_link');
        $this->db->limit(1);
        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);
        $this->db->where('p_code', $p_code);

        $qeury = $this->db->get();

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
    * Insert a new photo_link to the database
    *
    * @access   public
    * @param    $p_code integer
    * @param    $c_prefix string
    * @param    $c_code integer
    * @param    $photo_link string
    * @param    $file_list string
    * @return   boolean
    */
    function insert_photo_link($p_code = 0, $c_prefix = '', $c_code = 0, $photo_link = '', $file_list = '')
    {
        $p_code != 0 ? $this->p_code = $p_code : 0;
        $c_prefix != '' ? $this->c_prefix = $c_prefix : '';
        $c_code != 0 ? $this->c_code = $c_code : 0;
        $photo_link != '' ? $this->photo_link = $photo_link : '';
        $file_list != '' ? $this->file_list = $file_list : '';

        // Generates: INSERT INTO `photo_link` (p_code, c_prefix, c_code, photo_link, file_list)
        // VALUES ({$p_code}, {$c_prefix}, {$c_code}, {$photo_link}, {$file_list})
        $query = $this->db->insert('photo_link', $this);

        return $query;
    }

    /**
    * Update a photo_link's photo link based on the code
    *
    * @access   public
    * @param    $p_code integer
    * @param    $c_prefix string
    * @param    $c_code integer
    * @param    $photo_link string
    * @return   boolean
    */
    function update_photo_link_photo_link($p_code = 0, $c_prefix = '', $c_code = 0, $photo_link = '')
    {
        $p_code == 0 ? $p_code = $this->p_code : '';
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;
        $photo_link == '' ? $photo_link = $this->photo_link : '';

        $this->db->from('photo_link');

        $this->db->set('photo_link', $photo_link);

        $this->db->where('p_code', $p_code);
        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);

        // Generates: UPDATE photo_link
        // SET photo_link = '{$photo_link}'
        // WHERE p_code = '{$p_code}' AND c_prefix = '{$c_prefix}' AND c_code = '{$c_code}'
        return $this->db->update();
    }

     /**
    * Update a photo_link's photo link based on the code
    *
    * @access   public
    * @param    $p_code integer
    * @param    $c_prefix string
    * @param    $c_code integer
    * @param    $photo_link string
    * @return   boolean
    */
    function update_photo_link_file_list($p_code = 0, $c_prefix = '', $c_code = 0, $file_list = '')
    {
        $p_code == 0 ? $p_code = $this->p_code : '';
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;
        $file_list == '' ? $file_list = $this->file_list : '';

        $this->db->from('photo_link');

        $this->db->set('file_list', $file_list);

        $this->db->where('p_code', $p_code);
        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);

        // Generates: UPDATE photo_link
        // SET file_list = '{$file_list}'
        // WHERE p_code = '{$p_code}' AND c_prefix = '{$c_prefix}' AND c_code = '{$c_code}'
        return $this->db->update();
    }

    /**
    * Deletes a photo_link from the database with the matching package code
    *
    * @access   public
    * @param    $p_code integer
    * @param    $c_prefix string
    * @param    $c_code integer
    * @return   boolean
    */
    function delete_photo_link($p_code = 0, $c_prefix = '', $c_code = 0)
    {
        $p_code == 0 ? $p_code = $this->p_code : '';
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;

        $this->db->where('p_code', $p_code);
        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);

        // Generates: DELETE FROM photo_link
        // WHERE p_code = '{$p_code}' AND c_prefix = '{$c_prefix}' AND c_code = '{$c_code}'
        return $this->db->delete();
    }

    /**
    * Deletes all photo_link from the database with the matching category code
    *
    * @access   public
    * @param    $c_prefix string
    * @param    $c_code integer
    * @return   boolean
    */
    function delete_photo_link_category($c_prefix = '', $c_code = 0)
    {
        $c_prefix == '' ? $c_prefix = $this->c_prefix : '';
        $c_code == 0 ? $c_code = $this->c_code : 0;

        $this->db->where('c_prefix', $c_prefix);
        $this->db->where('c_code', $c_code);

        // Generates: DELETE FROM photo_link
        // WHERE c_prefix = '{$c_prefix}' AND c_code = '{$c_code}'
        return $this->db->delete();
    }

}

/* End of file photo_link_model.php */
/* Location: ./app/models/photo_link_model.php */