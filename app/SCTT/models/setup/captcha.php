<?php

class Captcha extends CI_Model {

	private $table_captcha = "captcha";
	private $col_captcha_id = "captcha_id";		// BIGINT
	private $col_captcha_time = "captcha_time";	// INT
	private $col_ip_address = "ip_address";		// VARCHAR
	private $col_word = "word";					// VARCHAR

	function __construct()
    {
        parent::__construct();
    }

	function create_table()
	{
		$sql = "CREATE TABLE {$this->table_captcha} (
			{$this->col_captcha_id} bigint(13) unsigned NOT NULL auto_increment,
			{$this->col_captcha_time} int(10) unsigned NOT NULL,
			{$this->col_ip_address} varchar(16) default '0' NOT NULL,
			{$this->col_word} varchar(20) NOT NULL,
			PRIMARY KEY ({$this->col_captcha_id}),
			KEY ({$this->col_word})
			);";

		$query = $this->db->query($sql);

		return $query;
	}	

	/**
     * Drop the Captcha table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_captcha}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table Captcha
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_captcha);

        return $query;
    }
}

/* End of file captcha.php */
/* Location: ./app/models/setup/captcha.php */