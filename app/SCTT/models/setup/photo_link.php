<?php

class Photo_link extends CI_Model {

	private $table_photo_link = "photo_link";
    private $col_p_code = "p_code";           // INT  
	private $col_c_prefix = "c_prefix";		  // CHAR
	private $col_c_code = "c_code";			  // INT
    private $col_photo_link = "photo_link";   // VARCHAR
    private $col_file_list = "file_list";     // TEXT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the photo_link table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_photo_link} (
            {$this->col_p_code} INT(2) NOT NULL,
    		{$this->col_c_prefix} CHAR(1) NOT NULL,
    		{$this->col_c_code} INT(2) NOT NULL,
            {$this->col_photo_link} VARCHAR(255) ,
            {$this->col_file_list} TEXT ,
    		PRIMARY KEY ({$this->col_p_code}, {$this->col_c_prefix}, {$this->col_c_code})
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the photo_link table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_photo_link}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table photo_link
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_photo_link);

        return $query;
    }

}

/* End of file photo_link.php */
/* Location: ./app/models/setup/photo_link.php */