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
            $( "#form-search" ).toggle('blind');
        }
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
                <input type="text" name="nis" class="span2" style="margin-bottom:0px;" value="<?php echo set_value('nis'); ?>">
            </td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" name="nama" class="span4" style="margin-bottom:0px;" value="<?php echo set_value('nama'); ?>">
            </td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                <label class="checkbox inline">
                    <input type="checkbox" name="jenis_kelamin[]" value="Laki-laki" <?php echo set_checkbox('jenis_kelamin[]', 'Laki-laki'); ?>> Laki-laki
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" name="jenis_kelamin[]" value="Perempuan" <?php echo set_checkbox('jenis_kelamin[]', 'Perempuan'); ?>> Perempuan
                </label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>
                <input type="text" name="tahun_masuk" maxlength="4" style="width:15%;margin-bottom:0px;" value="<?php echo set_value('tahun_masuk'); ?>">
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type="text" name="tempat_lahir" class="span3" style="margin-bottom:0px;" value="<?php echo set_value('tempat_lahir'); ?>">
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <input type="text" name="tgl_lahir" placeholder="Tahun-Bulan-Tanggal" class="span2" style="margin-bottom:0px;" value="<?php echo set_value('tgl_lahir'); ?>">
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type="text" name="alamat" class="span4" style="margin-bottom:0px;" value="<?php echo set_value('alamat'); ?>">
            </td>
        <tr>
        <tr>
            <th>Agama</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="ISLAM" <?php echo set_checkbox('agama[]', 'ISLAM'); ?>>ISLAM</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="KRISTEN" <?php echo set_checkbox('agama[]', 'KRISTEN'); ?>>KRISTEN</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="KATOLIK" <?php echo set_checkbox('agama[]', 'KATOLIK'); ?>>KATOLIK</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="HINDU" <?php echo set_checkbox('agama[]', 'HINDU'); ?>>HINDU</label>
                    <label class="checkbox inline"><input type="checkbox" name="agama[]" value="BUDHA" <?php echo set_checkbox('agama[]', 'BUDHA'); ?>>BUDHA</label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Kelas</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <?php foreach ($kelas as $k): ?>
                        <label class="checkbox inline"><input type="checkbox" name="kelas_id[]" value="<?php echo $k['id'] ?>" <?php echo set_checkbox('kelas_id[]', $k['id']); ?>><?php echo $k['nama']; ?></label>
                    <?php endforeach; ?>
                </p>
            </td>
        <tr>
        <tr>
            <th>Status</th>
            <td>
                <p style="margin-top:0px; margin-bottom:5px;">
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="0" <?php echo set_checkbox('status_id[]', '0'); ?>> Pending</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="1" <?php echo set_checkbox('status_id[]', '1'); ?>> Aktif</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="2" <?php echo set_checkbox('status_id[]', '2'); ?>> Blocking</label>
                    <label class="checkbox inline"><input type="checkbox" name="status_id[]" value="3" <?php echo set_checkbox('status_id[]', '3'); ?>> Alumni</label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Username</th>
            <td>
                <input type="text" name="username" class="span3" style="margin-bottom:0px;" value="<?php echo set_value('username'); ?>">
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

<pre>
<?php print_r($results); ?>
</pre>