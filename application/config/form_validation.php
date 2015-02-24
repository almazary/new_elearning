<?php

$config['setup/index'] = array(
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
);
$config['admin/login'] = array(
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
$config['admin/kelas'] = array(
    array(
        'field' => 'nama',
        'label' => 'Nama Kelas',
        'rules' => 'required|trim|xss_clean'
    ),
);
$config['admin/kelas/edit'] = array(
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
$config['admin/mapel/add'] = array(
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
$config['admin/mapel/edit'] = array(
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
$config['admin/mapel_kelas/add'] = array(
    array(
        'field' => 'mapel[]',
        'label' => 'Mapel',
        'rules' => 'trim|xss_clean|numeric'
    ),
);
$config['admin/ch_pass'] = array(
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
$config['admin/ch_profil'] = array(
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
$config['admin/siswa/add'] = array(
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
$config['admin/siswa/moved_class'] = array(
    array(
        'field' => 'kelas_id',
        'label' => 'Kelas',
        'rules' => 'required|trim|numeric|xss_clean'
    )
);
$config['admin/siswa/edit_username'] = array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|valid_email|callback_update_username'
    )
);
$config['admin/siswa/edit_password'] = array(
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
$config['admin/siswa/edit_profile'] = array(
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
$config['admin/siswa/filter'] = array(
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

$config['admin/pengajar/add'] = array(
    array(
        'field' => 'nis',
        'label' => 'NIS',
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

$config['admin/pengajar/edit_profile'] = array(
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
        'rules' => 'required|trim|xss_clean|numeric'
    ),
    array(
        'field' => 'is_admin',
        'label' => 'Opsi',
        'rules' => 'numeric'
    ),
);

$config['admin/pengajar/edit_username'] = array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|valid_email|callback_update_username'
    )
);

$config['admin/pengajar/edit_password'] = array(
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

$config['admin/pengajar/ampuan'] = array(
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

$config['admin/pengajar/filter'] = array(
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

$config['admin/materi/add/tertulis'] = array(
    array(
        'field' => 'type',
        'label' => 'Type',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['admin/materi/add/file'] = array(
    array(
        'field' => 'type',
        'label' => 'Type',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['admin/materi/edit/tertulis'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'konten',
        'label' => 'Konten',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['admin/materi/edit/file'] = array(
    array(
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required|trim|xss_clean'
    ),
);

$config['admin/tugas/add'] = array(
    array(
        'field' => 'type_id',
        'label' => 'Tipe Soal',
        'rules' => 'required|trim|xss_clean|numeric'
    ),
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