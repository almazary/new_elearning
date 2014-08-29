
<?php echo $this->session->flashdata('edit'); ?>

<strong>Edit Username <span class="text-error">*</span></strong>

<?php echo form_open('admin/siswa/edit_username/'.$status_id.'/'.$siswa_id); ?>
<input type="hidden" name="login_id" value="<?php echo $login['id']; ?>">
<table class="table table-striped">
    <tbody>
        <tr>
            <td>
                <input type="text" name="username" value="<?php echo set_value('username', $login['username']); ?>">
                <br><?php echo form_error('username'); ?>
            </td>
            <td width="20%">
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </tbody>
</table>
<?php echo form_close(); ?>