<div class="row-fluid">
<div class="span7">
    <a href="{site_url}/admin/siswa/add/1" class="btn btn-primary">Tambah Siswa</a>
</div>

<div class="span5">
    <div class="btn-group">
        <?php echo anchor('admin/siswa/list/1', 'Aktif', array('class' => 'btn')); ?>
        <?php echo anchor('admin/siswa/list/0', 'Pending', array('class' => 'btn')); ?>
        <?php echo anchor('admin/siswa/list/2', 'Blocking', array('class' => 'btn')); ?>
        <?php echo anchor('admin/siswa/list/3', 'Alumni', array('class' => 'btn')); ?>
        <?php echo anchor('admin/siswa/filter', '<i class="icon-search" style="line-height: 0px;"></i> Filter', array('class' => 'btn btn-info')); ?>
    </div>
</div>
</div>

<br>

<div class="bs-callout bs-callout-info">
    <b><a id="button" href="javascript:void(0)">PARAMETER PENCARIAN</a></b>
    <script type="text/javascript">
    $(function() {
        function view_form_search() {
            $( "#form-search" ).toggle();
        }
        <?php if (isset($filter)) : ?>
        view_form_search();
        <?php endif; ?>
        $( "#button" ).click(function() {
        view_form_search();
        });
    });
    </script>
    <?php echo form_open('admin/siswa/filter'); ?>
    <table class="table table-condensed" id="form-search">
        <tr>
            <th width="20%">NIS</th>
            <td>
                <input type="text" name="nis" class="span2" style="margin-bottom:0px;" value="<?php echo set_value('nis', (isset($filter['nis'])) ? $filter['nis'] : ''); ?>">
            </td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" name="nama" class="span4" style="margin-bottom:0px;" value="<?php echo set_value('nama', (isset($filter['nama'])) ? $filter['nama'] : ''); ?>">
            </td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                <label class="checkbox inline">
                    <input type="checkbox" name="jenis_kelamin[]" value="Laki-laki" <?php echo set_checkbox('jenis_kelamin[]', 'Laki-laki', (isset($filter['jenis_kelamin']) AND in_array('Laki-laki', $filter['jenis_kelamin'])) ? TRUE : FALSE); ?>> Laki-laki
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" name="jenis_kelamin[]" value="Perempuan" <?php echo set_checkbox('jenis_kelamin[]', 'Perempuan', (isset($filter['jenis_kelamin']) AND in_array('Perempuan', $filter['jenis_kelamin'])) ? TRUE : FALSE); ?>> Perempuan
                </label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>
                <input type="text" name="tahun_masuk" maxlength="4" style="width:15%;margin-bottom:0px;" value="<?php echo set_value('tahun_masuk', (isset($filter['tahun_masuk'])) ? $filter['tahun_masuk'] : ''); ?>">
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type="text" name="tempat_lahir" class="span3" style="margin-bottom:0px;" value="<?php echo set_value('tempat_lahir', (isset($filter['tempat_lahir'])) ? $filter['tempat_lahir'] : ''); ?>">
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <select class="span2" style="width: 10%;" name="tgl_lahir">
                    <option value="">Tgl</option>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('tgl_lahir', $i, (isset($filter['tgl_lahir']) AND $i == $filter['tgl_lahir']) ? TRUE : FALSE); ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="span2" style="width: 17%;" name="bln_lahir">
                    <option value="">Bulan</option>
                    <?php $label_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('bln_lahir', $i, (isset($filter['bln_lahir']) AND $i == $filter['bln_lahir']) ? TRUE : FALSE); ?>><?php echo $label_bulan[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <input type="text" name="thn_lahir" class="span1" maxlength="4" value="<?php echo set_value('thn_lahir', (isset($filter['thn_lahir'])) ? $filter['thn_lahir'] : ''); ?>" placeholder="Tahun">
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type="text" name="alamat" class="span4" style="margin-bottom:0px;" value="<?php echo set_value('alamat', (isset($filter['alamat'])) ? $filter['alamat'] : ''); ?>">
            </td>
        <tr>
        <tr>
            <th>Agama</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="ISLAM" <?php echo set_checkbox('agama[]', 'ISLAM', (isset($filter['agama']) AND in_array('ISLAM', $filter['agama'])) ? TRUE : FALSE); ?>>ISLAM</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="KRISTEN" <?php echo set_checkbox('agama[]', 'KRISTEN', (isset($filter['agama']) AND in_array('KRISTEN', $filter['agama'])) ? TRUE : FALSE); ?>>KRISTEN</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="KATOLIK" <?php echo set_checkbox('agama[]', 'KATOLIK', (isset($filter['agama']) AND in_array('KATOLIK', $filter['agama'])) ? TRUE : FALSE); ?>>KATOLIK</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="HINDU" <?php echo set_checkbox('agama[]', 'HINDU', (isset($filter['agama']) AND in_array('HINDU', $filter['agama'])) ? TRUE : FALSE); ?>>HINDU</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="BUDHA" <?php echo set_checkbox('agama[]', 'BUDHA', (isset($filter['agama']) AND in_array('BUDHA', $filter['agama'])) ? TRUE : FALSE); ?>>BUDHA</label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Kelas</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <?php foreach ($kelas as $k): ?>
                        <label class="checkbox inline"><input type="checkbox" name="kelas_id[]" value="<?php echo $k['id'] ?>" <?php echo set_checkbox('kelas_id[]', $k['id'], (isset($filter['kelas_id']) AND in_array($k['id'], $filter['kelas_id'])) ? TRUE : FALSE); ?>><?php echo $k['nama']; ?></label>
                    <?php endforeach; ?>
                </p>
            </td>
        <tr>
        <tr>
            <th>Status</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="0" <?php echo set_checkbox('status_id[]', '0', (isset($filter['status_id']) AND in_array(0, $filter['status_id'])) ? TRUE : FALSE); ?>> Pending</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="1" <?php echo set_checkbox('status_id[]', '1', (isset($filter['status_id']) AND in_array(1, $filter['status_id'])) ? TRUE : FALSE); ?>> Aktif</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="2" <?php echo set_checkbox('status_id[]', '2', (isset($filter['status_id']) AND in_array(2, $filter['status_id'])) ? TRUE : FALSE); ?>> Blocking</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="3" <?php echo set_checkbox('status_id[]', '3', (isset($filter['status_id']) AND in_array(3, $filter['status_id'])) ? TRUE : FALSE); ?>> Alumni</label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Username</th>
            <td>
                <input type="text" name="username" class="span3" style="margin-bottom:0px;" value="<?php echo set_value('username', (isset($filter['username'])) ? $filter['username'] : ''); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Filter</button>
            </td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>

<br>

<script>
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('siswa_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>

<?php echo form_open('admin/siswa/filter_action'); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="7%">
                <input type="checkbox" style="margin-top:-2px;" onclick="ch_uch_checkbox(this)">
                No
            </th>
            <th colspan="2">Nis</th>
            <th>Nama</th>
            <th width="15%">Kelas</th>
            <th width="10%">Status</th>
            <th width="22%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswas as $no => $v): ?>
        <tr>
            <td>
                <input type="checkbox" name="siswa_id[]" value="<?php echo $v['id']; ?>" style="margin-top:-2px;" <?php echo ($v['status_id'] == 3) ? 'disabled' : ''; ?>>
                <?php echo $no; ?>.
            </td>
            <td width="5%">
                <img style="height:30px;width:27px;" class="img-polaroid" src="<?php echo get_url_image_siswa($v['foto'], 'small', $v['jenis_kelamin']); ?>">
            </td>
            <td>
                <?php echo $v['nis']; ?>
            </td>
            <td>
                <?php echo $v['nama']; ?>
            </td>
            <td>
                <?php
                $kelas_aktif = $this->kelas_model->retrieve_siswa(null, array('siswa_id' => $v['id'], 'aktif' => '1'));
                $k = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);
                echo $k['nama'];
                ?>
            </td>
            <td>
                <?php
                if ($v['status_id'] == 0) {
                    echo 'Pending';
                } elseif ($v['status_id'] == 1) {
                    echo 'Aktif';
                } elseif ($v['status_id'] == 2) {
                    echo 'Blocking';
                } elseif ($v['status_id'] == 3) {
                    echo 'Alumni';
                }
                ?>
            </td>
            <td>
                <ul class="nav nav-pills" style="margin-bottom:0px;">
                    <li><a class="btn btn-small" href="{site_url}/admin/siswa/detail/<?php echo $v['status_id']; ?>/<?php echo $v['id']; ?>"><i class="icon-zoom-in"></i> Detail</a></li>
                    <li class="dropdown">
                        <a class="btn btn-small" href="#" id="act-<?php echo $v['id']; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-edit"></i> Edit <b class="caret" style="margin-top:5px;"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="act-<?php echo $v['id']; ?>">
                            <li><?php echo anchor('admin/siswa/edit_profile/'.$v['status_id'].'/'.$v['id'], 'Edit Profil', array('class' => 'iframe-4', 'title' => 'Edit Profil Siswa')); ?></li>
                            <li><?php echo anchor('admin/siswa/edit_picture/'.$v['status_id'].'/'.$v['id'], 'Edit Foto', array('class' => 'iframe-5', 'title' => 'Edit Foto Siswa')); ?></li>
                            <?php if ($v['status_id'] != 3): ?>
                            <li><?php echo anchor('admin/siswa/moved_class/'.$v['status_id'].'/'.$v['id'], 'Edit Kelas Aktif', array('class' => 'iframe', 'title' => 'Edit Kelas Aktif')); ?></li>
                            <?php endif; ?>
                            <li><?php echo anchor('admin/siswa/edit_username/'.$v['status_id'].'/'.$v['id'], 'Edit Username', array('class' => 'iframe-2', 'title' => 'Edit Username Siswa')); ?></li>
                            <li><?php echo anchor('admin/siswa/edit_password/'.$v['status_id'].'/'.$v['id'], 'Edit Password', array('class' => 'iframe-3', 'title' => 'Edit Password Siswa')); ?></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (!empty($siswas)): ?>
<br>
<div class="row-fluid">
    <div class="span8">
        <table cellpadding="5">
            <tr>
                <th valign="top">Aksi Terpilih</th>
                <td valign="top">
                    <select name="status_id" style="width:auto;">
                        <option value="">--Update Status--</option>
                        <option value="1">Aktif</option>
                        <option value="2">Blocking</option>
                        <option value="3">Alumni</option>
                    </select>
                </td>
                <td valign="top">
                    <select name="kelas_id" style="width:auto;">
                        <option value="">--Pindah Kelas--</option>
                        <?php foreach ($kelas as $k): ?>
                            <option value="<?php echo $k['id']; ?>"><?php echo $k['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td valign="top">
                    <button type="submit" class="btn">Update</button>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php endif; ?>
<?php echo form_close(); ?>

<br>
<?php echo $pagination; ?>
