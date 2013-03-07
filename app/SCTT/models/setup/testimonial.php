<?php

class Testimonial extends CI_Model {

	private $table_testimonial = "testimonial";
	private $col_id = "id";
	private $col_source = "source";		// VARCHAR
	private $col_message = "message";	// TEXT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the testimonial table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */

    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_testimonial} (
    		{$this->col_id} INT(2) PRIMARY KEY AUTO_INCREMENT,
    		{$this->col_source} VARCHAR(100) NOT NULL,
    		{$this->col_message} TEXT NOT NULL
    		)";
		
		$query = $this->db->query($sql);

		return $query;
	}

	/**
     * Drop the testimonial table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_testimonial}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table testimonial
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_testimonial);

        return $query;
    }

}

/* End of file testimonial.php */
/* Location: ./app/models/setup/testimonial.php */