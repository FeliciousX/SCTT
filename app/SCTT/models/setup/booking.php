<?php

class Booking extends CI_Model {

	private $table_booking = "booking";
    private $col_booking_id = "booking_id";   // INT  
    private $col_p_code = "p_code";           // INT
	private $col_c_prefix = "c_prefix";		  // CHAR
	private $col_c_code = "c_code";			  // INT
    private $col_email = "email";             // VARCHAR
    private $col_date_booked = "date_booked"; // DATE
    private $col_status = "status";           // ENUM (pending, confirmed, cancelled )
    private $col_date_start = "date_start";   // DATE
    private $col_message = "message";         // TEXT

	function __construct()
    {
        parent::__construct();
    }

    /**
     * Create the booking table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function create_table()
    {
    	$sql = "CREATE TABLE {$this->table_booking} (
            {$this->col_booking_id} INT(4) NOT NULL,
            {$this->col_p_code} INT(3) NOT NULL,
    		{$this->col_c_prefix} CHAR(1) NOT NULL,
    		{$this->col_c_code} INT(2) NOT NULL,
            {$this->col_email} VARCHAR(80) NOT NULL,
            {$this->col_date_booked} DATE NOT NULL,
            {$this->col_status} ENUM('PENDING', 'CONFIRMED', 'CANCELLED') NOT NULL,
            {$this->col_date_start} DATE,
            {$this->col_message} TEXT,
    		PRIMARY KEY ({$this->col_booking_id}, {$this->col_date_booked})
            )";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Drop the booking table in the database
     *
     * @return boolean TRUE if successful, FALSE if otherwise
     */
    function drop_table()
    {
    	$sql = "DROP TABLE IF EXISTS {$this->table_booking}";

    	$query = $this->db->query($sql);

    	return $query;
    }

    /**
     * Clear all data from table booking
     */
    function clear_table()
    {
        $query = $this->db->truncate($this->table_booking);

        return $query;
    }
}

/* End of file booking.php */
/* Location: ./app/models/setup/booking.php */