{% extends "layout-private.html" %}

{% block title %}
{{ siswa.nama }} - {{ parent() }}
{% endblock %}

{% block content %}
<div class="module">
    <div class="module-head">
        {% if is_admin() %}
        <h3>{{ anchor('siswa/index/' ~ status_id, 'Data Siswa')|raw }} / Detail Siswa</h3>
        {% else %}
        <h3>{{ anchor('siswa/filter', 'Filter Siswa')|raw }} / Detail Siswa</h3>
        {% endif %}
    </div>
    <div class="module-body">
        {{ get_flashdata('siswa')|raw }}

        {% if siswa_login.id != get_sess_data('login', 'id') %}
        <div class="row-fluid">
            <div class="span4">
                <div class="btn-group">
                    <a class="btn btn-default btn-sm" href="{{ site_url('message/to/siswa/' ~ siswa.id) }}"><i class="icon-comments"></i> Kirim Pesan</a>
                </div>
            </div>
        </div>
        <br>
        {% endif %}

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Profil Siswa</strong>
                {% if is_admin() %}
                <div class="btn-group pull-right" style="margin-top:-4px;">
                    {{ anchor('siswa/edit_profile/' ~ status_id ~ '/' ~ siswa.id, 'Edit Profil', {'class' : 'siswa-iframe-4 btn btn-small btn-primary', 'title' : 'Edit Profil Siswa'})|raw }}
                    {{ anchor('siswa/edit_picture/' ~ status_id ~ '/' ~ siswa.id, 'Edit Foto', {'class' : 'siswa-iframe-5 btn btn-small btn-primary', 'title' : 'Edit Foto Siswa'})|raw }}
                    {% if is_admin() %}
                    {{ anchor('login/login_log/' ~ siswa_login.id, 'Login log', {'class' : 'btn btn-small btn-default', 'title' : 'Login log'})|raw }}
                    {% endif %}
                </div>
                {% endif %}
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th bgcolor="#FBFBFB" width="25%" style="border-top: 0px;">NIS</th>
                        <td style="border-top: 0px;">{{ siswa.nis }}</td>
                        <td rowspan="5" width="15%" style="border-top: 0px;">
                            <img style="width:113px;" class="img-polaroid" src="{{ get_url_image_siswa(siswa.foto, 'medium', siswa.jenis_kelamin) }}">
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Nama</th>
                        <td>{{ siswa.nama }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Jenis Kelamin</th>
                        <td>{{ siswa.jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Tahun Masuk</th>
                        <td colspan="2">{{ siswa.tahun_masuk }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Tempat Lahir</th>
                        <td>{{ siswa.tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Tanggal Lahir</th>
                        <td>{{ (siswa.tgl_lahir is not empty) ? tgl_indo(siswa.tgl_lahir) }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Agama</th>
                        <td colspan="2">{{ siswa.agama }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Alamat</th>
                        <td colspan="2">{{ siswa.alamat }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Status</th>
                        <td colspan="2">
                            {% if siswa.status_id == 0 %}
                                Pending
                            {% elseif siswa.status_id == 1 %}
                                Aktif
                            {% elseif siswa.status_id == 2 %}
                                Blocking
                            {% elseif siswa.status_id == 3 %}
                                Alumni
                            {% endif %}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <div class="panel panel-default" id="riwayat-kelas">
                    <div class="panel-heading">
                        <strong>Riwayat Kelas</strong>
                        {% if is_admin() and status_id != 3 %}
                        <div class="btn-group pull-right" style="margin-top:-4px;">
                            {{ anchor('siswa/moved_class/' ~ status_id ~ '/' ~ siswa.id, 'Pindah Kelas', {'class' : 'siswa-iframe btn btn-small btn-primary', 'title' : 'Pindah siswa ke Kelas lain'})|raw }}
                        </div>
                        {% endif %}
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Kelas</th>
                                {% if status_id != 3 %}
                                    <th>Aktif</th>
                                {% endif %}
                            </tr>
                        </thead>
                        <tbody>
                            {% for no, v in siswa_kelas.results %}
                            <tr>
                                <td>{{ no }}.</td>
                                <td>
                                    {{ get_row_data('kelas_model', 'retrieve', [v.kelas_id, true], 'nama') }}
                                </td>
                                {% if status_id != 3 %}
                                <td>
                                    {% if v.aktif == 1 %}
                                        <i class="icon icon-ok"></i>
                                    {% endif %}
                                </td>
                                {% endif %}
                            </tr>
                            {% endfor %}
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {% if is_admin() %}
            <div class="span6">
                <div class="panel panel-default" id="akun">
                    <div class="panel-heading">
                        <strong>Akun Login</strong>
                        <div class="btn-group pull-right" style="margin-top:-4px;">
                            {{ anchor('siswa/edit_username/' ~ status_id ~ '/' ~ siswa.id, 'Edit Username', {'class' : 'siswa-iframe-2 btn btn-small btn-primary', 'title' : 'Edit Username Siswa'})|raw }}
                            {{ anchor('siswa/edit_password/' ~ status_id ~ '/' ~ siswa.id, 'Edit Password', {'class' : 'siswa-iframe-3 btn btn-small btn-primary', 'title' : 'Edit Password Siswa'})|raw }}
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="30%" bgcolor="#FBFBFB" style="border-top: 0px;">Username</th>
                                    <td style="border-top: 0px;">
                                        {{ siswa_login.username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th bgcolor="#FBFBFB">Password</th>
                                    <td>
                                        *********
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {% endif %}
        </div>

    </div>
</div>
{% endblock %}
