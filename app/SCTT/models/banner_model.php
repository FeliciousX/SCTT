<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the banner table.
*
* @author FeliciousX
*/
class Banner_model extends CI_Model {

    var $id = 0;
    var $img = '';
    var $caption = 0;
    var $title = '';
    var $description = '';
    var $button = '';
    var $link = '';

    /**
    * The constructor automatically populate the variables from the post input.
    */
    function __construct()
    {
        parent::__construct();

        $this->id = $this->input->post('id');
        $this->img = $this->input->post('img');
        $this->caption = $this->input->post('caption');
        $this->title = $this->input->post('title');
        $this->description = $this->input->post('description');
        $this->button = $this->input->post('button');
        $this->link = $this->input->post('link');
    }

    /**
    * Query for all banner accounts
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_all_banner()
    {
        $this->db->from('banner');

        // Generates: SELECT * FROM (`banner`)
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
    * Query for banner by ID
    *
    * @access   public
    * @return   object or FALSE
    */
    function get_banner($id = 0)
    {
        $this->db->from('banner');

        // Generates: SELECT * FROM (`banner`) WHERE id = {$id}
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
    * Insert a new banner to the database
    *
    * @access   public
    * @param    $img string
    * @param    $caption integer
    * @param    $title string
    * @param    $description string
    * @param    $button string
    * @param    $link string
    * @return   boolean
    */
    function insert_banner($id = 0, $img = '', $caption = '', $title = '', $description = '', $button = '', $link = '')
    {
        $id != 0 ? $this->id = $id : 0;
        $img != '' ? $this->img = $img : '';
        $caption != 0 ? $this->caption = $caption : 0;
        $title != '' ? $this->title = $title : '';
        $description != '' ? $this->description = $description : '';
        $button != '' ? $this->button = $button : '';
        $link != '' ? $this->link = $link : '';

        // Generates: INSERT INTO `banner`
        // VALUES ({$id}, {$img}, {$caption}, {$title}, {$description}, {$button}, {$link})
        $query = $this->db->insert('banner', $this);

        return $query;
    }

    /**
    * Update a banner's caption
    *
    * @access   public
    * @param    $id integer
    * @param    $img string
    * @param    $title string
    * @param    $description string
    * @param    $button string
    * @param    $link string
    * @return   boolean
    */
    function update_banner($id = 0, $img = '', $caption = 1, $title = '', $description = '', $button = '', $link = '')
    {
        $id == 0 ? $id = $this->id : 0;
        $img == '' ? $img = $this->img : '';
        $title == '' ? $title = $this->title : '';
        $description == '' ? $description = $this->description : '';
        $button == '' ? $button = $this->button : '';
        $link == '' ? $link = $this->link : '';

        $this->db->from('banner');

        $this->db->set('img', $img);
        $this->db->set('title', $title);
        $this->db->set('description', $description);
        $this->db->set('button', $button);
        $this->db->set('link', $link);

        $this->db->where('id', $id);

        // Generates: UPDATE banner
        // SET title = '{$title}', description = '{$description}', button = {$button}
        // WHERE id = '{$id}'
        return $this->db->update();
    }

    /**
    * Update a banner's img link
    *
    * @access   public
    * @param    $id integer
    * @param    $img string
    * @return   boolean
    */
    function update_banner_img($id = 0, $img = '')
    {
        $id == 0 ? $id = $this->id : 0;
        $img == '' ? $img = $this->img : '';

        $this->db->from('banner');

        $this->db->set('img', $img);

        $this->db->where('id', $id);

        // Generates: UPDATE banner
        // SET img = '{$img}'
        // WHERE id = '{$id}'
        return $this->db->update();
    }

    /**
    * Update a banner's caption
    *
    * @access   public
    * @param    $id integer
    * @param    $title string
    * @param    $description string
    * @param    $button string
    * @param    $link string
    * @return   boolean
    */
    function update_banner_name($id = 0, $title = '', $description = '', $button = '', $link = '')
    {
        $id == 0 ? $id = $this->id : 0;
        $title == '' ? $title = $this->title : '';
        $description == '' ? $description = $this->description : '';
        $button == '' ? $button = $this->button : '';
        $link == '' ? $link = $this->link : '';

        $this->db->from('banner');

        $this->db->set('title', $title);
        $this->db->set('description', $description);
        $this->db->set('button', $button);
        $this->db->set('link', $link);

        $this->db->where('id', $id);

        // Generates: UPDATE banner
        // SET title = '{$title}', description = '{$description}', button = {$button}
        // WHERE id = '{$id}'
        return $this->db->update();
    }

    /**
    * Update banner's captain availability
    *
    * @access   public
    * @param    $id integer
    * @param    $caption integer
    * @return   boolean
    */
    function update_banner_caption($id = 0, $caption = -1)
    {
        $id == 0 ? $id = $this->id : 0;
        $caption < 0 ? $caption = $this->caption : 0;

        $this->db->from('banner');

        $this->db->set('caption', $caption);

        $this->db->where('id', $id);

        // Generates: UPDATE banner
        // SET caption = '{$caption}'
        // WHERE id = '{$id}'
        return $this->db->update();
    }

    /**
    * Deletes a banner from the database with the matching id
    *
    * @access   public
    * @param    $id integer
    * @return   boolean
    */
    function delete_banner($id = 0)
    {
        $id == 0 ? $id = $this->id : 0;

        $this->db->from('banner');
        $this->db->where('id', $id);

        // Generates: DELETE FROM banner
        // WHERE id = {$id}
        return $this->db->delete();
    }
}

/* End of file banner_model.php */
/* Location: ./app/models/banner_model.php */