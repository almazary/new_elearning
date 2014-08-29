<?php echo $this->session->flashdata('edit'); ?>

<strong>Edit Password</strong>

<?php echo form_open('admin/siswa/edit_password/'.$status_id.'/'.$siswa_id); ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <th width="35%">Password Baru <span class="text-error">*</span></th>
            <td>
                <input type="password" name="password">
                <br><?php echo form_error('password'); ?>
            </td>
        <tr>
        <tr>
            <th>Ulangi Password <span class="text-error">*</span></th>
            <td>
                <input type="password" name="password2">
                <br><?php echo form_error('password2'); ?>
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