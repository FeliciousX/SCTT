<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the booking model
*
* @author FeliciousX
*/
class Booking_model extends CI_Model {

    var $p_code = 0;
	var $c_prefix = '';
	var $c_code = 0;
	var $email = '';
	var $date_booked = '';
    var $status = '';
    var $date_start = '';
    var $message = '';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');

        $this->p_code = $this->input->post('p_code');
        $this->c_prefix = $this->input->post('c_prefix');
    	$this->c_code = $this->input->post('c_code');
    	$this->email = $this->input->post('email');
    	$this->date_booked = $this->input->post('date_booked');
        $this->status = $this->input->post('status');
        $this->date_start = $this->input->post('date_start');
        $this->message = $this->input->post('message');

        // Always get from table booking ...
        // $this->db->from('booking');
    }

    function get_all_booking()
    {
        // Generates: SELECT * FROM (`booking`)
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_booking()
    {
        $this->db->from('booking');

        $this->db->where('email', $this->email);
        $this->db->where('date_booked', $this->date_booked);

        // GENERATES: SELECT * FROM (`booking`) WHERE `email` = {$this->email} AND `date_booked` = {$this->date_booked}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_category($c_prefix = '', $c_code = 0)
    {
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;

        $this->db->from('booking');
        $this->db->where('c_prefix', $this->c_prefix);
        $this->db->where('c_code', $this->c_code);

        // Generates: SELECT * FROM (`booking`) WHERE `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_package($p_code = '', $c_prefix = '', $c_code = '')
    {
        $p_code == 0 ? 0 : $this->p_code = $p_code;
        $c_prefix == '' ? '' : $this->c_prefix = $c_prefix;
        $c_code == 0 ? 0 : $this->c_code = $c_code;

        $this->db->from('booking');
        $this->db->where('p_code', $this->p_code);
    	$this->db->where('c_prefix', $this->c_prefix);
    	$this->db->where('c_code', $this->c_code);

        // Generates: SELECT * FROM (`booking`)
        // WHERE `p_code` = {$this->p_code} AND `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
    	$query = $this->db->get();

    	return $query->result();
    }

    function get_all_booking_code_start()
    {
        $this->db->from('booking');
        $this->db->where('p_code', $this->p_code);
        $this->db->where('c_prefix', $this->c_prefix);
        $this->db->where('c_code', $this->c_code);
        $this->db->where('date_start', $this->date_start);

        // Generates: SELECT * FROM (`booking`)
        // WHERE `p_code` = {$this->p_code} AND `c_prefix` = {$this->c_prefix} AND `c_code` = {$this->c_code}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_email()
    {
        $this->db->where('email', $this->email);

        // GENERATES: SELECT * FROM (`booking`) WHERE `email` = {$this->email}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_date_booked()
    {
        $this->date_booked = substr(standard_date('DATE_ISO8601', $this->date_booked), 0, 10);
        $this->db->where('date_booked', $this->date_booked);

        // GENERATES: SELECT * FROM (`booking`) WHERE `date_booked` = {$this->date_booked}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_today()
    {
        $this->db->from('booking');
        
        $format = 'DATE_ISO8601';
        $time = now();
        $this->date_booked = substr(standard_date($format, $time), 0, 10);
        $this->db->where('date_booked', $this->date_booked);

        // GENERATES: SELECT * FROM (`booking`) WHERE `date_booked` = {$this->date_booked}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_status()
    {
        $this->db->where('status', $this->status);

        // GENERATES: SELECT * FROM (`booking`) WHERE `status` = {$this->status}
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_booking_by_date_start()
    {
        $this->db->from('booking');
        $this->db->where('date_start', $this->date_start);
        $this->db->order_by('c_prefix asc, c_code asc, p_code asc, status asc');

        // GENERATES: SELECT * FROM (`booking`) WHERE `date_start` = {$this->date_start} ORDER BY c_prefix ASC, c_code ASC, p_code ASC, status ASC
        $query = $this->db->get();

        return $query->result();
    }

    function insert_booking()
    {
        $format = 'DATE_ISO8601';
        $time = now();
        $this->date_booked = substr(standard_date($format, $time), 0, 10);
        $this->status = "PENDING"; // Default value

        // Generates: INSERT INTO `booking` (p_code, c_prefix, c_code, email, date_booked, status, date_start)
        // VALUES ({$this->p_code}, {$this->c_prefix}, {$this->c_code}, {$this->email}, {$this->date_booked},
        //         {$this->status}, {$this->date_start}, {$this->message}
    	return $this->db->insert('booking', $this);
    }

    function update_booking()
    {
        $this->db->set('p_code', $this->p_code);
        $this->db->set('c_prefix', $this->c_prefix);
        $this->db->set('c_code', $this->c_code);
        $this->db->set('date_start', $this->date_start);
        $this->db->set('status', $this->status);
        $this->db->set('message', $this->message);

        $this->db->where('email', $this->email);
    	$this->db->where('date_booked', $this->date_booked);

        // Generates: UPDATE booking
        // SET p_code = '{$this->p_code}', c_prefix = '{$this->c_prefix}', c_code = '{$this->c_code}',
        //      date_start = '{$this->date_start}', status = '{$this->status}'
        // WHERE email = '{$this->email}' AND date_booked = '{$this->date_booked}'
    	return $this->db->update();
    }

    function update_booking_status_by_id($status = '', $booking_id = 0)
    {
        $status == '' ? '' : $this->status = $status;
        $booking_id == 0 ? 0 : $booking_id = $booking_id;

        $this->db->from('booking');
        $this->db->set('status', $this->status);
        $this->db->where('booking_id', $booking_id);
        
        return $this->db->update();
    }

    function delete_booking()
    {
        $this->db->where('email', $this->email);
    	$this->db->where('date_booked', $this->date_booked);

        // Generates: DELETE FROM booking
        // WHERE email = {$this->email} AND date_booked = {$this->date_booked}
    	return $this->db->delete();
    }
}

/* End of file booking_model.php */
/* Location: ./app/models/booking_model.php */