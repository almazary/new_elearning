
<form class="form-horizontal row-fluid" method="post" action="{site_url}/admin/mapel/add">
    <div class="control-group">
        <label class="control-label">Nama <span class="text-error">*</span></label>
        <div class="controls">
            <input type="text" name="nama" class="span8" value="<?php echo set_value('nama'); ?>">
            <br><?php echo form_error('nama'); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Deskripsi</label>
        <div class="controls">
            <textarea name="info" id="info" style="height:400px;"><?php echo set_value('info'); ?></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <a href="{site_url}/admin/mapel" class="btn">Batal</a>
        </div>
    </div>
</form>