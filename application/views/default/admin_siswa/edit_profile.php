
<?php echo $this->session->flashdata('edit'); ?>

<strong>Edit Profil</strong>

<?php echo form_open('admin/siswa/edit_profile/'.$status_id.'/'.$siswa_id); ?>
<input type="hidden" name="siswa_id" value="<?php echo $siswa_id; ?>">
<table class="table table-striped">
    <tbody>
        <tr>
            <th width="30%">NIS <span class="text-error">*</span></th>
            <td>
                <input type="text" id="nis" name="nis" style="width:40%;" value="<?php echo set_value('nis', $siswa['nis']); ?>">
                <br><?php echo form_error('nis'); ?>
            </td>
        <tr>
        <tr>
            <th>Nama <span class="text-error">*</span></th>
            <td>
                <input type="text" name="nama" style="width:90%;" value="<?php echo set_value('nama', $siswa['nama']); ?>">
                <br><?php echo form_error('nama'); ?>
            </td>
        <tr>
        <tr>
            <th>Jenis Kelamin <span class="text-error">*</span></th>
            <td>
                <label class="radio inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki', ($siswa['jenis_kelamin'] == 'Laki-laki') ? TRUE : FALSE); ?>> Laki-laki</label>
                <label class="radio inline"><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan', ($siswa['jenis_kelamin'] == 'Perempuan') ? TRUE : FALSE); ?>> Perempuan</label>
                <br><?php echo form_error('jenis_kelamin'); ?>
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk <span class="text-error">*</span></th>
            <td>
                <input type="text" name="tahun_masuk" maxlength="4" style="width:15%;" value="<?php echo set_value('tahun_masuk', $siswa['tahun_masuk']); ?>">
                <br><?php echo form_error('tahun_masuk'); ?>
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type="text" name="tempat_lahir" value="<?php echo set_value('tempat_lahir', $siswa['tempat_lahir']); ?>">
                <br><?php echo form_error('tempat_lahir'); ?>
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <?php
                if (empty($siswa['tgl_lahir'])) {
                    $tgl = ''; $bln = ''; $thn = '';
                } else {
                    $tgl = date('d', strtotime($siswa['tgl_lahir']));
                    $bln = date('m', strtotime($siswa['tgl_lahir']));
                    $thn = date('Y', strtotime($siswa['tgl_lahir']));
                }
                ?>
                <select class="span2" style="width: 20%;float:left;margin-right:5px;" name="tgl_lahir">
                    <option value="">--Tgl--</option>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('tgl_lahir', $i, ($i == $tgl) ? TRUE : FALSE); ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="span2" style="width: 35%;float:left;margin-right:5px;" name="bln_lahir">
                    <option value="">--Bulan--</option>
                    <?php $label_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo set_select('bln_lahir', $i, ($i == $bln) ? TRUE : FALSE); ?>><?php echo $label_bulan[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <input type="text" name="thn_lahir" style="width:15%;float:left;" maxlength="4" value="<?php echo set_value('thn_lahir', $thn); ?>" placeholder="Tahun">
                <br><?php echo form_error('thn_lahir'); ?>
            </td>
        <tr>
        <tr>
            <th>Agama</th>
            <td>
                <select name="agama" style="width:30%;">
                    <option value="">--pilih--</option>
                    <option value="ISLAM" <?php echo set_select('agama', 'ISLAM', ($siswa['agama'] == 'ISLAM') ? TRUE : FALSE); ?>>ISLAM</option>
                    <option value="KRISTEN" <?php echo set_select('agama', 'KRISTEN', ($siswa['agama'] == 'KRISTEN') ? TRUE : FALSE); ?>>KRISTEN</option>
                    <option value="KATOLIK" <?php echo set_select('agama', 'KATOLIK', ($siswa['agama'] == 'KATOLIK') ? TRUE : FALSE); ?>>KATOLIK</option>
                    <option value="HINDU" <?php echo set_select('agama', 'HINDU', ($siswa['agama'] == 'HINDU') ? TRUE : FALSE); ?>>HINDU</option>
                    <option value="BUDHA" <?php echo set_select('agama', 'BUDHA', ($siswa['agama'] == 'BUDHA') ? TRUE : FALSE); ?>>BUDHA</option>
                </select>
                <br><?php echo form_error('agama'); ?>
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <textarea name="alamat" style="width:90%;"><?php echo set_value('alamat', $siswa['alamat']); ?></textarea>
                <br><?php echo form_error('alamat'); ?>
            </td>
        <tr>
        <?php if ($siswa['status_id'] != 3): ?>
        <tr>
            <th>Status <span class="text-error">*</span></th>
            <td>
                <label class="radio inline"><input type="radio" name="status_id" value="0" <?php echo set_radio('status_id', '0', ($siswa['status_id'] == '0') ? TRUE : FALSE); ?>> Pending</label>
                <label class="radio inline"><input type="radio" name="status_id" value="1" <?php echo set_radio('status_id', '1', ($siswa['status_id'] == '1') ? TRUE : FALSE); ?>> Aktif</label>
                <label class="radio inline"><input type="radio" name="status_id" value="2" <?php echo set_radio('status_id', '2', ($siswa['status_id'] == '2') ? TRUE : FALSE); ?>> Blocking</label>
                <label class="radio inline"><input type="radio" name="status_id" value="3" <?php echo set_radio('status_id', '3', ($siswa['status_id'] == '3') ? TRUE : FALSE); ?>> Alumni</label>
                <br><?php echo form_error('status_id'); ?>
            </td>
        <tr>
        <?php else: ?>
            <input type="hidden" name="status_id" value="3">
        <?php endif; ?>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </tbody>
</table>
<?php echo form_close(); ?>
