

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Kelas
    </div>
    <div class="panel-body">
        <form class="form-horizontal row-fluid" method="post" action="{site_url}/admin/kelas">
            <div class="control-group">
                <label class="control-label">Nama Kelas <span class="text-error">*</span></label>
                <div class="controls">
                    <input type="text" name="nama" class="span5" placeholder="Nama Kelas" value="<?php echo set_value('nama'); ?>"> 
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                    <?php echo form_error('nama') ?>
                </div>
            </div>
        </form>
    </div>
</div>