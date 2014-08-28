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
    ),
    'admin/kelas' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama Kelas',
            'rules' => 'required|trim|xss_clean'
        ),
    ),
    'admin/kelas/edit' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama Kelas',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'trim|xss_clean|numeric'
        ),
    ),
    'admin/mapel/add' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama Matapelajaran',
            'rules' => 'required|trim|xss_clean|min_length[2]'
        ),
        array(
            'field' => 'info',
            'label' => 'Info Matapelajaran',
            'rules' => 'trim'
        )
    ),
    'admin/mapel/edit' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama Matapelajaran',
            'rules' => 'required|trim|xss_clean|min_length[2]'
        ),
        array(
            'field' => 'info',
            'label' => 'Info Matapelajaran',
            'rules' => 'trim'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'trim|xss_clean|numeric'
        ),
    ),
    'admin/mapel_kelas/add' => array(
        array(
            'field' => 'mapel[]',
            'label' => 'Mapel',
            'rules' => 'trim|xss_clean|numeric'
        ),
    ),
    'admin/ch_pass' => array(
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
    'admin/ch_profil' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|xss_clean|valid_email|check_update_username'
        ),
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required|trim|xss_clean'
        ),
    ),
    'admin/siswa/add' => array(
        array(
            'field' => 'nis',
            'label' => 'NIS',
            'rules' => 'required|trim|xss_clean|is_unique[siswa.nis]'
        ),
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'tahun_masuk',
            'label' => 'Tahun Masuk',
            'rules' => 'required|trim|xss_clean|numeric|min_length[4]|max_length[5]'
        ),
        array(
            'field' => 'kelas_id',
            'label' => 'Kelas',
            'rules' => 'required|trim|xss_clean|numeric'
        ),
        array(
            'field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'tgl_lahir',
            'label' => 'Tgl Lahir',
            'rules' => 'trim|xss_clean|numeric'
        ),
        array(
            'field' => 'bln_lahir',
            'label' => 'Bulan Lahir',
            'rules' => 'trim|xss_clean|numeric'
        ),
        array(
            'field' => 'thn_lahir',
            'label' => 'Tahun Lahir',
            'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[5]'
        ),
        array(
            'field' => 'agama',
            'label' => 'Agama',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|xss_clean|valid_email|is_unique[login.username]'
        ),
        array(
            'field' => 'default_username',
            'label' => 'Default Username',
            'rules' => 'trim|xss_clean|numeric'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|xss_clean|alpha_numeric'
        ),
        array(
            'field' => 'password2',
            'label' => 'Ulangi Password',
            'rules' => 'required|matches[password]'
        ),
    ),
    'admin/siswa/moved_class' => array(
        array(
            'field' => 'kelas_id',
            'label' => 'Kelas',
            'rules' => 'required|trim|numeric|xss_clean'
        )
    )
);