<?php

class Banner extends CI_Model {

	private $table_banner = "banner";
    private $col_id = "id";     // INT
    private $col_img = "img";     // VARCHAR
    private $col_caption = "caption";     // INT   
    private $col_title = "title"; // VARCHAR
    private $col_description = "description";  // TEXT
    private $col_button = "button";   // VARCHAR
    private $col_link = "link";   // VARCHAR

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the banner table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_banner} (
            {$this->col_id} INT(2) PRIMARY KEY,
            {$this->col_img} VARCHAR(255) NOT NULL,
            {$this->col_caption} INT(1) NOT NULL,
            {$this->col_title} VARCHAR(255),
            {$this->col_description} VARCHAR(255),
            {$this->col_button} VARCHAR(255),
            {$this->col_link} VARCHAR(255)
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the banner table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_banner}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table banner
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_banner);

        return $query;
    }
}

/* End of file banner.php */
/* Location: ./app/models/setup/banner.php */