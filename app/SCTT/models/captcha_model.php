<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Represents the captcha table
*
* @author Infinia
*/
class Captcha_model extends CI_Model {
		
	/**
    * By default, in any initiation of the model. It will just take all the input by using post method
    * and store it in the variables.
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
        $this->load->library('image_lib');
    }

    function generate_captcha($captcha_data) 
    {
		$query = $this->db->insert_string('captcha', $captcha_data);
		return $this->db->query($query);
	}

	function verify_captcha()
	{
		// Delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	

		// Queries for existing captcha
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if($row->count == 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


}
