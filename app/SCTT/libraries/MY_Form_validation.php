<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct($rules = array())
    {
        parent::__construct($rules);
    }

    /**
     * Match one field to another
     *
     * @access  public
     * @param   string
     * @param   field
     * @return  bool
     */
    public function is_not_unique($str, $field)
    {
        list($table, $field)=explode('.', $field);
        $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
        
        return $query->num_rows() > 0;
    }
}

/* End of file MY_Form_validation.php */
/* Location: ./app/SCTT/libraries/MY_Form_validation.php */
