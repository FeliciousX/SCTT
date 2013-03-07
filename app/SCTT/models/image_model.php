<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**

* Only contains functions to handle queries related to 'albums' and 'photos' tables

*

* @author Infinia

*/

class Image_model extends CI_Model {



	function __construct()

    {

        parent::__construct();

    }



    function get_album_by_cp($c_prefix = '', $c_code = 0)

    {

        $this->db->from('albums');



        $this->db->where('c_prefix', $c_prefix);

    	$this->db->where('c_code', $c_code);

    	$this->db->limit(1);



    	$query = $this->db->get();



    	return $query->result();

    }



    function get_album_by_cp_code($c_prefix = '', $c_code = 0, $p_code = 0)

    {

        $this->db->from('albums');



        $this->db->where('c_prefix', $c_prefix);

        $this->db->where('c_code', $c_code);

        $this->db->where('p_code', $p_code);

        $this->db->limit(1);



        $query = $this->db->get();



        return $query->result();

    }



    function get_highlight_photos_by_id($id = 0)

    {

    	$this->db->from('photos');



    	$this->db->where('album', $id);

        $this->db->where('highlight', 1);



    	$this->db->order_by('album', 'asc');



    	$query = $this->db->get();



    	return $query->result();

    }



    function get_all_photos_by_id($id = 0)

    {

    	$this->db->from('photos');



    	$this->db->where('album', $id);



    	$query = $this->db->get();



    	return $query->result();


    }

    function delete_album_by_cp_code($c_prefix = '', $c_code = 0, $p_code = 0)
    {
        $this->db->from('albums');

        $this->db->where('c_prefix', $c_prefix);

        $this->db->where('c_code', $c_code);

        $this->db->where('p_code', $p_code);

        return $this->db->delete();
    }


    function delete_photos_by_album($id = 0)
    {
        $this->db->from('photos');

        $this->db->where('album', $id);

        return $this->db->delete();

    }



}



/* End of file image_model.php */

/* Location: ./app/models/image_model.php */