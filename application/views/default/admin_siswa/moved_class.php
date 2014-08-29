
<?php echo $this->session->flashdata('class'); ?>

<strong>Pilih Kelas Tujuan <span class="text-error">*</span></strong>

<?php echo form_open('admin/siswa/moved_class/'.$status_id.'/'.$siswa_id, array('class' => 'form-horizontal row-fluid')); ?>
<table class="table table-striped">
    <tr>
        <td>
            <select class="span2" name="kelas_id">
                <option value="">--pilih--</option>
                <?php foreach ($kelas as $k): ?>
                    <option value="<?php echo $k['id'] ?>"><?php echo $k['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <br><?php echo form_error('kelas_id'); ?>
        </td>
        <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>