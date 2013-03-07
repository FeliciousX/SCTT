<?php

class Package extends CI_Model {

	private $table_package = "package";
    private $col_p_code = "p_code";         // INT
	private $col_c_prefix = "c_prefix";		// CHAR
	private $col_c_code = "c_code";			// INT
	private $col_p_name = "p_name";			// VARCHAR
    private $col_price = "price";             // DOUBLE  
    private $col_description = "description"; // TEXT
	private $col_p_link_to = "p_link_to";	// VARCHAR
    private $col_duration = "duration";   // VARCHAR
    private $col_photo_link = "photo_link"; // VARCHAR
    private $col_file_list = "file_list";   // TEXT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the Package table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_package} (
            {$this->col_p_code} INT(3) NOT NULL,
    		{$this->col_c_prefix} CHAR(1) NOT NULL,
    		{$this->col_c_code} INT(2) NOT NULL,
    		{$this->col_p_name} VARCHAR(255) NOT NULL,
            {$this->col_price} DOUBLE(7,2) UNSIGNED NOT NULL,
            {$this->col_description} TEXT,
    		{$this->col_p_link_to} VARCHAR(255) NOT NULL,
            {$this->col_duration} VARCHAR(255),
    		PRIMARY KEY ({$this->col_p_code}, {$this->col_c_prefix}, {$this->col_c_code})
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the Package table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_package}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table Package
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_package);

        return $query;
    }
}

/* End of file package.php */
/* Location: ./app/models/setup/package.php */