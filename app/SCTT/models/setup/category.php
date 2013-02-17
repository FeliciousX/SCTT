<?php

class Category extends CI_Model {

	private $table_category = "category";
	private $col_c_prefix = "c_prefix";		  // CHAR
	private $col_c_code = "c_code";			  // INT
    private $col_description = "c_description"; // TEXT
	private $col_c_name = "c_name";			  // VARCHAR
	private $col_c_link_to = "c_link_to";	  // VARCHAR
    private $col_featured = "featured";       // INT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the Category table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_category} (
    		{$this->col_c_prefix} CHAR(1) NOT NULL,
    		{$this->col_c_code} INT(2) NOT NULL,
    		{$this->col_c_name} VARCHAR(255) NOT NULL,
            {$this->col_description} TEXT ,
    		{$this->col_c_link_to} VARCHAR(255) ,
            {$this->col_featured} INT(1) ,
    		PRIMARY KEY ({$this->col_c_prefix}, {$this->col_c_code})
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the Category table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_category}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table Category
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_category);

        return $query;
    }

}

/* End of file category.php */
/* Location: ./app/models/setup/category.php */