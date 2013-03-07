<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the testimonial table
*
* @author Infinia
*/
class Testimonial_model extends CI_Model {

    var $source = '';
    var $message = '';

    function __construct()
    {
        parent::__construct();

        $this->source = $this->input->post('source');
        $this->message = $this->input->post('message');

        // Always get from table testimonial ...
        $this->db->from('testimonial');
    }

    function get_all_testimonial()
    {
        // Generates: SELECT * FROM (`testimonial`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_testimonial_by_id($id = 0)
    {
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->result();
    }

    function insert_testimonial()
    {
        $this->db->insert('testimonial', $this);
    }

    function update_testimonial_by_id($id = 0)
    {
        $id == 0 ? 0 : $id = $id;

        $this->db->set('source', $this->source);
        $this->db->set('message', $this->message);

        $this->db->where('id', $id);

        return $this->db->update();
    }

    function delete_testimonial_by_id($id = 0)
    {
        $id == 0 ? 0 : $id = $id;

        $this->db->where('id', $id);

        return $this->db->delete();
    }

}

/* End of file testimonial_model.php */
/* Location: ./app/models/testimonial_model.php */