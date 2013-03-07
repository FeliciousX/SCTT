<?php

class Client extends CI_Model {

	private $table_client = "client";
    private $col_first_name = "first_name"; // VARCHAR
    private $col_last_name = "last_name";   // VARCHAR
    private $col_email = "email";           // VARCHAR
    private $col_contact_no = "contact_no"; // VARCHAR
    private $col_fax_no = "fax_no";         // VARCHAR
    private $col_address = "address";       // VARCHAR
    private $col_country = "country";       // VARCHAR

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the client table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_client} (
            {$this->col_email} VARCHAR(80) PRIMARY KEY,
            {$this->col_first_name} VARCHAR(55) NOT NULL,
            {$this->col_last_name} VARCHAR(55) NOT NULL,
            {$this->col_contact_no} VARCHAR(18) NOT NULL,
            {$this->col_fax_no} VARCHAR(18),
            {$this->col_address} VARCHAR(255),
            {$this->col_country} VARCHAR(60) NOT NULL
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the client table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_client}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table client
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_client);

        return $query;
    }
}

/* End of file client.php */
/* Location: ./app/models/setup/client.php */