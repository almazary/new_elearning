
<div class="panel panel-info">
    <div class="panel-heading">
        Edit Kelas
    </div>
    <div class="panel-body">
        <form class="form-horizontal row-fluid" method="post" action="{site_url}/admin/kelas/edit/<?php echo $kelas['id']; ?>">
            <div class="control-group">
                <label class="control-label">Nama Kelas <span class="text-error">*</span></label>
                <div class="controls">
                    <input type="text" name="nama" class="span5" placeholder="Nama Kelas" value="<?php echo set_value('nama', $kelas['nama']); ?>"> 
                    <?php echo form_error('nama') ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                    <label class="checkbox inline">
                        <input type="checkbox" value="1" name="status" <?php echo set_checkbox('status', '1', ($kelas['aktif'] == 1) ? TRUE : FALSE); ?>>
                        Aktif
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                    <a href="{site_url}/admin/kelas" class="btn">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>