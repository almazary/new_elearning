<?php

$config['setup/index/2'] = array(
    array(
        'field' => 'jenjang',
        'label' => 'Jenjang Pendidikan',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'nama-sekolah',
        'label' => 'Nama sekolah',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'alamat',
        'label' => 'Alamat',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'telp',
        'label' => 'Telpon',
        'rules' => 'trim|xss_clean'
    ),
);

$config['lupa_password'] = array(
    array(
        'field' => 'email',
        'label' => 'Username (Email)',
        'rules' => 'required|trim|valid_email|xss_clean|callback_check_username_exist'
    ),
);

$config['reset_password'] = array(
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
);

$config['register/siswa'] = array(
    array(
        'field' => 'nis',
        'label' => 'NIS',
        'rules' => 'trim|xss_clean|is_unique[siswa.nis]'
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
        'rules' => 'required|trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean|alpha_numeric'
    ),
    array(
        'field' => 'password2',
        'label' => 'Ulangi Password',
        'rules' => 'required|matches[password]'
    ),
);

$config['register/pengajar'] = array(
    array(
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'trim|xss_clean|is_unique[pengajar.nip]'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean|alpha_numeric'
    ),
    array(
        'field' => 'password2',
        'label' => 'Ulangi Password',
        'rules' => 'required|matches[password]'
    ),
);

$config['pengaturan'] = array(
    array(
        'field' => 'nama-sekolah',
        'label' => 'Nama sekolah',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'alamat',
        'label' => 'Alamat sekolah',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'telp',
        'label' => 'Telpon',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'registrasi-siswa',
        'label' => 'Registrasi siswa',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'registrasi-pengajar',
        'label' => 'Registrasi pengajar',
        'rules' => 'trim|xss_clean'
    ),
);
$config['login'] = array(
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
);
$config['mapel/add'] = array(
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
);

$config['mapel/edit'] = array(
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
);

$config['kelas/index'] = array(
    array(
        'field' => 'nama',
        'label' => 'Nama Kelas',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['kelas/edit'] = array(
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
);


$config['kelas/mapel_kelas/add'] = array(
    array(
        'field' => 'mapel[]',
        'label' => 'Mapel',
        'rules' => 'trim|xss_clean|numeric'
    ),
);

$config['ch_pass'] = array(
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
);
$config['ch_profil'] = array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|valid_email|callback_update_username'
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
);
$config['siswa/add'] = array(
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
        'rules' => 'required|trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
);
$config['siswa/moved_class'] = array(
    array(
        'field' => 'kelas_id',
        'label' => 'Kelas',
        'rules' => 'required|trim|numeric|xss_clean'
    )
);
$config['siswa/edit_username'] = array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|valid_email|callback_update_username'
    )
);
$config['siswa/edit_password'] = array(
    array(
        'field' => 'password',
        'label' => 'Password Baru',
        'rules' => 'required|trim|xss_clean|alpha_numeric'
    ),
    array(
        'field' => 'password2',
        'label' => 'Ulangi Password',
        'rules' => 'required|matches[password]'
    )
);
$config['siswa/edit_profile'] = array(
    array(
        'field' => 'nis',
        'label' => 'NIS',
        'rules' => 'required|trim|xss_clean|callback_update_nis'
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
        'rules' => 'required|trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
        'field' => 'status_id',
        'label' => 'Status',
        'rules' => 'required|trim|xss_clean|numeric'
    )
);
$config['siswa/filter'] = array(
    array(
        'field' => 'nis',
        'label' => 'NIS',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'jenis_kelamin[]',
        'label' => 'Jenis Kelamin',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'tahun_masuk',
        'label' => 'Tahun Masuk',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'tempat_lahir',
        'label' => 'Tempat Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'tgl_lahir',
        'label' => 'Tgl Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'bln_lahir',
        'label' => 'Bulan Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'thn_lahir',
        'label' => 'Tahun Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'alamat',
        'label' => 'Alamat',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'agama[]',
        'label' => 'Agama',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'status_id[]',
        'label' => 'Status',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'trim|xss_clean'
    ),
);

$config['pengajar/add'] = array(
    array(
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'trim|xss_clean|is_unique[pengajar.nip]'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
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
    array(
        'field' => 'is_admin',
        'label' => 'Opsi',
        'rules' => 'numeric'
    ),
);

$config['pengajar/edit_profile'] = array(
    array(
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'trim|xss_clean|callback_update_nip'
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
        'rules' => 'trim|xss_clean|numeric|min_length[4]|max_length[4]'
    ),
    array(
        'field' => 'alamat',
        'label' => 'Alamat',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'status_id',
        'label' => 'Status',
        'rules' => 'trim|xss_clean|numeric'
    ),
    array(
        'field' => 'is_admin',
        'label' => 'Opsi',
        'rules' => 'numeric'
    ),
);

$config['pengajar/edit_username'] = array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|valid_email|callback_update_username'
    )
);

$config['pengajar/edit_password'] = array(
    array(
        'field' => 'password',
        'label' => 'Password Baru',
        'rules' => 'required|trim|xss_clean|alpha_numeric'
    ),
    array(
        'field' => 'password2',
        'label' => 'Ulangi Password',
        'rules' => 'required|matches[password]'
    )
);

$config['pengajar/ampuan'] = array(
    array(
        'field' => 'kelas_id',
        'label' => 'Kelas',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'mapel_kelas_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'jam_mulai',
        'label' => 'Jam Mulai',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'jam_selesai',
        'label' => 'Jam Selesai',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'aktif',
        'label' => 'Aktif',
        'rules' => 'trim|xss_clean|numeric'
    ),
);

$config['pengajar/filter'] = array(
    array(
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'jenis_kelamin[]',
        'label' => 'Jenis Kelamin',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'tempat_lahir',
        'label' => 'Tempat Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'tgl_lahir',
        'label' => 'Tgl Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'bln_lahir',
        'label' => 'Bulan Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'thn_lahir',
        'label' => 'Tahun Lahir',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'alamat',
        'label' => 'Alamat',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'status_id[]',
        'label' => 'Status',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'trim|xss_clean'
    ),
);

$config['materi/add/tertulis'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required'
    ),
);

$config['materi/add/file'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['materi/edit/tertulis'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required'
    ),
    array(
        'field' => 'publish',
        'label' => 'Status',
        'rules' => 'required|numeric'
    ),
);

$config['materi/edit/file'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'publish',
        'label' => 'Status',
        'rules' => 'required|numeric'
    ),
);

$config['tugas/add_ganda_essay'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul Tugas',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'durasi',
        'label' => 'Durasi',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'info',
        'label' => 'Info',
        'rules' => ''
    )
);

$config['tugas/add_upload'] = array(
    array(
        'field' => 'mapel_id',
        'label' => 'Matapelajaran',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul Tugas',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'info',
        'label' => 'Info',
        'rules' => ''
    )
);

$config['tugas/edit'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul Tugas',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'durasi',
        'label' => 'Judul Tugas',
        'rules' => 'numeric|trim|xss_clean'
    ),
);

$config['tugas/pertanyaan'] = array(
    array(
        'field' => 'pertanyaan',
        'label' => 'Pertanyaan',
        'rules' => 'required'
    )
);

$config['tugas/pilihan'] = array(
    array(
        'field' => 'pilihan',
        'label' => 'Pilihan',
        'rules' => 'required|trim|numeric|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required'
    )
);

$config['materi/filter'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'pembuat',
        'label' => 'Pembuat',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'mapel_id[]',
        'label' => 'Matapelajaran',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'type[]',
        'label' => 'Type',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'publish[]',
        'label' => 'Status',
        'rules' => 'xss_clean'
    ),
);

$config['tugas/filter'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'info',
        'label' => 'Info',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'pembuat',
        'label' => 'Pembuat',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'mapel_id[]',
        'label' => 'Matapelajaran',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'kelas_id[]',
        'label' => 'Kelas',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'type[]',
        'label' => 'Type',
        'rules' => 'xss_clean'
    ),
    array(
        'field' => 'status[]',
        'label' => 'Status',
        'rules' => 'xss_clean'
    ),
);

$config['message/create'] = array(
    array(
        'field' => 'penerima',
        'label' => 'Penerima',
        'rules' => 'trim|xss_clean|required|callback_check_penerima_pesan'
    ),
    array(
        'field' => 'content',
        'label' => 'Isi Pesan',
        'rules' => 'required'
    ),
);

$config['pengumuman'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'trim|xss_clean|required'
    ),
    array(
        'field' => 'tgl_tampil',
        'label' => 'Tgl. Tampil',
        'rules' => 'trim|xss_clean|required|callback_check_tgl_tampil'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required'
    ),
    array(
        'field' => 'tampil_siswa',
        'label' => 'Tampil kesiswa',
        'rules' => 'trim|xss_clean|numeric'
    ),
    array(
        'field' => 'tampil_pengajar',
        'label' => 'Tampil kepengajar',
        'rules' => 'trim|xss_clean|numeric'
    ),
);
