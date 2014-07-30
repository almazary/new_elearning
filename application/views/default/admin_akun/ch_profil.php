
<?php echo form_open_multipart('admin/ch_profil', array('class' => 'form-horizontal row-fluid')); ?>
    <div class="control-group">
        <label class="control-label">Username (Email) <span class="text-error">*</span></label>
        <div class="controls">
            <input type="text" name="username" class="span5" value="<?php echo set_value('username', $login['username']); ?>">
            <br><?php echo form_error('username'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Nama <span class="text-error">*</span></label>
        <div class="controls">
            <input type="text" name="nama" class="span5" value="<?php echo set_value('nama', $pengajar['nama']); ?>">
            <br><?php echo form_error('nama'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Alamat <span class="text-error">*</span></label>
        <div class="controls">
            <input type="text" name="alamat" class="span9" value="<?php echo set_value('alamat', $pengajar['alamat']); ?>">
            <br><?php echo form_error('alamat'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Foto</label>
        <div class="controls">
            <?php if (!is_null($pengajar['foto']) AND !empty($pengajar['foto'])): ?>
            <img src="<?php echo get_url_image($pengajar['foto'], 'medium'); ?>"><br><br>
            Ganti Foto 
            <?php endif; ?>
            <input type="file" name="userfile">
            <br><?php echo $error_upload; ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>