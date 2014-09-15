
<div class="row-fluid">
<div class="span7">
    <a href="{site_url}/admin/siswa/add/<?php echo $status_id; ?>" class="btn btn-primary">Tambah Siswa</a>
</div>

<div class="span5">
    <div class="btn-group">
        <?php echo anchor('admin/siswa/list/1', 'Aktif', array('class' => ($status_id == 1) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/0', 'Pending', array('class' => ($status_id == 0) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/2', 'Blocking', array('class' => ($status_id == 2) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/3', 'Alumni', array('class' => ($status_id == 3) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/filter', '<i class="icon-search" style="line-height: 0px;"></i> Filter', array('class' => 'btn')); ?>
    </div>
</div>

<br><br>
<?php if ($status_id == 1): ?>
<p class="text-warning"><b>NB: </b> Siswa tidak dapat dihapus namun dapat di ubah menjadi blocking.</p>
<?php endif; ?>

<script>
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('siswa_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>

<?php echo form_open('admin/siswa/list/'.$status_id); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="7%">
                <?php if ($status_id == 0 OR $status_id == 2): ?>
                    <input type="checkbox" style="margin-top:-2px;" onclick="ch_uch_checkbox(this)">
                <?php endif; ?>
                No
            </th>
            <th colspan="2">Nis</th>
            <th>Nama</th>
            <th width="15%">Kelas</th>
            <th width="22%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswas as $no => $v): ?>
        <tr>
            <td>
                <?php if ($status_id == 0 OR $status_id == 2): ?>
                    <input type="checkbox" name="siswa_id[]" value="<?php echo $v['id']; ?>" style="margin-top:-2px;">
                <?php endif; ?>
                <?php echo $no; ?>.
            </td>
            <td width="5%">
                <img style="height:30px;width:27px;" class="img-polaroid" src="<?php echo get_url_image_siswa($v['foto'], 'small', $v['jenis_kelamin']); ?>">
            </td>
            <td>
                <?php echo $v['nis']; ?>
            </td>
            <td>
                <?php echo $v['nama']; ?>
            </td>
            <td>
                <?php
                $kelas_aktif = get_row_data('kelas_model', 'retrieve_siswa', array(
                    null,
                    array('siswa_id' => $v['id'], 'aktif' => '1')
                ));
                //$this->kelas_model->retrieve_siswa(null, array('siswa_id' => $v['id'], 'aktif' => '1'));
                //$kelas = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);
                echo get_row_data('kelas_model', 'retrieve', array($kelas_aktif['kelas_id']), 'nama');
                ?>
            </td>
            <td>
                <ul class="nav nav-pills" style="margin-bottom:0px;">
                    <li><a class="btn btn-small" href="{site_url}/admin/siswa/detail/<?php echo $status_id; ?>/<?php echo $v['id']; ?>"><i class="icon-zoom-in"></i> Detail</a></li>
                    <li class="dropdown">
                        <a class="btn btn-small" href="#" id="act-<?php echo $v['id']; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-edit"></i> Edit <b class="caret" style="margin-top:5px;"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="act-<?php echo $v['id']; ?>">
                            <li><?php echo anchor('admin/siswa/edit_profile/'.$status_id.'/'.$v['id'], 'Edit Profil', array('class' => 'iframe-4', 'title' => 'Edit Profil Siswa')); ?></li>
                            <li><?php echo anchor('admin/siswa/edit_picture/'.$status_id.'/'.$v['id'], 'Edit Foto', array('class' => 'iframe-5', 'title' => 'Edit Foto Siswa')); ?></li>
                            <?php if ($status_id != 3): ?>
                            <li><?php echo anchor('admin/siswa/moved_class/'.$status_id.'/'.$v['id'], 'Edit Kelas Aktif', array('class' => 'iframe', 'title' => 'Edit Kelas Aktif')); ?></li>
                            <?php endif; ?>
                            <li><?php echo anchor('admin/siswa/edit_username/'.$status_id.'/'.$v['id'], 'Edit Username', array('class' => 'iframe-2', 'title' => 'Edit Username Siswa')); ?></li>
                            <li><?php echo anchor('admin/siswa/edit_password/'.$status_id.'/'.$v['id'], 'Edit Password', array('class' => 'iframe-3', 'title' => 'Edit Password Siswa')); ?></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (!empty($siswas) AND ($status_id == 0 OR $status_id == 2)): ?>
<br>
<div class="row-fluid">
    <div class="span7">
        <table cellpadding="5">
            <tr>
                <th valign="top">Update Status Terpilih</th>
                <td valign="top">
                    <select name="status_id" style="width:100%;">
                        <option>--Pilih Status--</option>
                        <option value="1">Aktif</option>
                        <?php if ($status_id == 0): ?>
                        <option value="2">Blocking</option>
                        <?php endif; ?>
                    </select>
                </td>
                <td valign="top">
                    <button type="submit" class="btn">Update</button>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php endif; ?>
<?php echo form_close(); ?>

<br>
<?php echo $pagination; ?>

</div>
