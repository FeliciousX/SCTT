<?php

$config = array(
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
   'accounts/delete' => array(
                        array(
                           'field' => 'username',
                           'label' => 'Username',
                           'rules' => 'trim|required|xss_clean|is_not_unique[admin.username]'),
                        array(
                           'field' => 'username_su',
                           'label' => 'Admin Username',
                           'rules' => 'trim|required|xss_clean'),
                        array(
                           'field' => 'password_su',
                           'label' => 'Admin Password',
                           'rules' => 'trim|required'
                           )
                  )
      );