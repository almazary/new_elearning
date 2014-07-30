<form class="form-horizontal row-fluid" method="post" action="{site_url}/admin/ch_pass">
    <div class="control-group">
        <label class="control-label">Password Baru <span class="text-error">*</span></label>
        <div class="controls">
            <input type="password" name="password" class="span5">
            <br><?php echo form_error('password'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Confirm Password <span class="text-error">*</span></label>
        <div class="controls">
            <input type="password" name="password2" class="span5">
            <br><?php echo form_error('password2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>