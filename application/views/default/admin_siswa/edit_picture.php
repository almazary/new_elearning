
<?php echo $this->session->flashdata('edit'); ?>

<strong>Edit Foto <span class="text-error">*</span></strong>

<?php echo form_open_multipart('admin/siswa/edit_picture/'.$status_id.'/'.$siswa_id); ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <td>
                <img class="img-polaroid" src="<?php echo get_url_image_siswa($siswa['foto'], 'medium', $siswa['jenis_kelamin']); ?>">
            </td>
            <td>
                <input type="file" name="userfile" class="btn btn-small" style="max-width:190px;">
                <?php echo (!empty($error_upload)) ? '<br><br>'.$error_upload : ''; ?>
            </td>
        <tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </tbody>
</table>
<?php echo form_close(); ?>