<?php

class Admin extends CI_Model {

	private $table_admin = "admin";
    private $col_username = "username";     // VARCHAR
    private $col_password = "password";     // VARCHAR   
    private $col_name = "name";             // VARCHAR
    private $col_email = "email";           // VARCHAR
    private $col_superuser = "superuser";   // INT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the admin table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_admin} (
            {$this->col_username} VARCHAR(30) PRIMARY KEY,
            {$this->col_password} VARCHAR(255) NOT NULL,
            {$this->col_email} VARCHAR(80) UNIQUE NOT NULL,
            {$this->col_name} VARCHAR(255) NOT NULL,
            {$this->col_superuser} INT(1) NOT NULL
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the admin table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_admin}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table admin
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_admin);

        return $query;
    }
}

/* End of file admin.php */
/* Location: ./app/models/setup/admin.php */