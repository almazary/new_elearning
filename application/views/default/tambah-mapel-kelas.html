{% extends "layout-private.html" %}

{% block title %}
Matapelajaran Kelas - {{ parent() }}
{% endblock %}

{% block content %}
<div class="module">
    <div class="module-head">
        <h3>{{ anchor(uri_back, 'Matapelajaran Kelas')|raw }} / Atur Matapelajaran</h3>
    </div>
    <div class="module-body">
        {{ get_flashdata('mapel')|raw }}

        {% if is_demo_app() %}
            {{ get_alert('warning', get_demo_msg())|raw }}
        {% endif %}

        <div class="bs-callout bs-callout-info">
            <b><a class="as-link pull-right" data-toggle="collapse" data-target="#form-add-mapel">Tambah Matapelajaran</a></b>
            Pilih Matapelajaran yang ingin dimasukkan pada <b>{{ kelas['nama'] }}</b>

            <div id="form-add-mapel" {% if post_mapel == 0 %} class="collapse" {% endif %}>
                {% if is_demo_app() == false %}
                {{ form_open('kelas/mapel_kelas/add/' ~ parent['id'] ~ '/' ~ kelas['id'] ~ '/' ~ enurl_redirect(uri_back), {'class' : 'form-horizontal row-fluid', 'style' : 'margin-top:20px;'})|raw }}
                {% endif %}
                    <input type="hidden" name="add-mapel" value="1">
                    <div class="control-group">
                        <label class="control-label">Nama <span class="text-error">*</span></label>
                        <div class="controls">
                            <input type="text" name="nama" class="span8" value="{{ set_value('nama') }}">
                            <br>{{ form_error('nama')|raw }}
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Deskripsi</label>
                        <div class="controls">
                            <textarea name="info" class="span12" rows="5">{{ set_value('info')|raw }}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            {% if is_demo_app() == false %}
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            {% endif %}
                        </div>
                    </div>
                {% if is_demo_app() == false %}
                {{ form_close()|raw }}
                {% endif %}
            </div>
        </div>
        <br>

        {% if is_demo_app() == false %}
        {{ form_open('kelas/mapel_kelas/add/' ~ parent['id'] ~ '/' ~ kelas['id'] ~ '/' ~ enurl_redirect(uri_back)) | raw }}
        {% endif %}
        <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                    <label><input type="checkbox" class="checkAll" style="margin-top:-3px;margin-right:5px;"/> Pilih semua</label>
                </td>
            </tr>
            {% for m in mapels %}
            {% set checked = get_row_data('mapel_model', 'retrieve_kelas', [null, kelas['id'], m.id]) %}
            <tr>
                <td>
                    <label><input class="checkbox-mapel" type="checkbox" name="mapel[]" value="{{ m.id }}" style="margin-top:-2px;margin-right:5px;" {{ (m.aktif != 1) ? 'disabled' : '' }} {{ (checked is empty or checked.aktif == 0) ? '' : 'checked' }}> <b>{{ m.nama }}</b></label>
                    <small>{{ m.info|nl2br }}</small>
                </td>
            </tr>
            {% endfor %}
            <tr>
                <td>
                    <label><input type="checkbox" class="checkAll" style="margin-top:-3px;margin-right:5px;"/> Pilih semua</label>
                </td>
            </tr>
        </tbody>
        </table>
        <br>
        {% if is_demo_app() == false %}
        <button type="submit" class="btn btn-primary">Simpan</button>
        {% endif %}
        <a href="{{ uri_back }}" class="btn btn-default">Kembali</a>

        {% if is_demo_app() == false %}
        {{ form_close()|raw }}
        {% endif %}
    </div>
</div>
{% endblock %}
