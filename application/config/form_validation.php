<?php

$config = array(

    'setup/index' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama Sekolah',
            'rules' => 'required|trim|xss_clean|min_length[3]'
        ),
        array(
            'field' => 'alamat',
            'label' => 'Alamat Sekolah',
            'rules' => 'required|trim|xss_clean|min_length[3]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email Admin',
            'rules' => 'required|trim|xss_clean|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|xss_clean|alpha_numeric'
        ),
        array(
            'field' => 'password2',
            'label' => 'Confirm Password',
            'rules' => 'required|trim|xss_clean|alpha_numeric|matches[password]'
        ),
    ),
    'admin/login' => array(
        array(
            'field' => 'email',
            'label' => 'Username (Email)',
            'rules' => 'required|trim|xss_clean|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|xss_clean|alpha_numeric'
        ),
    )

);