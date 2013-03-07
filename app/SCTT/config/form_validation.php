<?php

$config = array(
   'contact_us/index' => array(
                     array(
                        'field' => 'f_name',
                        'label' => 'First Name',
                        'rules' => 'trim|required'
                        ),
                     array(
                        'field' => 'l_name',
                        'label' => 'Last Name',
                        'rules' => 'trim|required'
                        ),
                     array(
                        'field' => 'phone_num',
                        'label' => 'Contact Number',
                        'rules' => 'trim|required'
                        ),
                     array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                        ),
                     array(
                        'field' => 'subject',
                        'label' => 'Subject',
                        'rules' => 'required|xss_clean'
                        ),
                     array(
                        'field' => 'message',
                        'label' => 'Message',
                        'rules' => 'required'
                        )
                  ),
   'accounts/login' => array(
                     array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|xss_clean'
                        ),
                     array('field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim'
                        )
                  ),
   'accounts/add' => array(
                     array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|min_length[4]|max_length[12]|is_unique[admin.username]|xss_clean'
                     ),
                     array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[5]|matches[confirm_password]'
                     ),
                     array(
                        'field' => 'confirm_password',
                        'label' => 'Confirm Password',
                        'rules' => 'trim|required'
                     ),
                     array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required'
                     ),
                     array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique[admin.email]'
                     )
                  ),
   'accounts/edit' => array(
                     array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|min_length[5]'
                        ),
                     array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|valid_email|is_unique[admin.email]'
                     )
                  ),
   'accounts/delete' => array(
                        array(
                           'field' => 'username',
                           'label' => 'Username',
                           'rules' => 'trim|required|xss_clean|is_not_unique[admin.username]'),
                        array(
                           'field' => 'password',
                           'label' => 'Password',
                           'rules' => 'trim|required'
                           )
                  ),
   'submit_booking/index' => array(
                        array(
                           'field' => 'first_name',
                           'label' => 'First Name',
                           'rules' => 'trim|required'
                           ),
                        array(
                           'field' => 'last_name',
                           'label' => 'Last Name',
                           'rules' => 'trim|required'
                           ),
                        array(
                           'field' => 'address',
                           'label' => 'Address',
                           'rules' => 'required|xss_clean'
                           ),
                        array(
                           'field' => 'country',
                           'label' => 'Country',
                           'rules' => 'required|xss_clean|trim'
                           ),
                        array(
                           'field' => 'contact_no',
                           'label' => 'Contact Number',
                           'rules' => 'required|xss_clean|trim'
                           ),
                        array(
                           'field' => 'fax_no',
                           'label' => 'Fax Number',
                           'rules' => 'trim'
                           ),
                        array(
                           'field' => 'email',
                           'label' => 'Email',
                           'rules' => 'trim|xss_clean|required|valid_email'
                           ),
                        array(
                           'field' => 'date_start',
                           'label' => 'Date',
                           'rules' => 'xss_clean|required|alpha_dash|trim'
                           ),
                        array(
                           'field' => 'message',
                           'label' => 'Message',
                           'rules' => 'xss_clean|alpha_numeric'
                           )
                        )
      );