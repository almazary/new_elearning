
<div class="panel panel-default">
    <div class="panel-body">
    <span class="pull-right">
        <?php if ($mapel['aktif'] != 1): ?>
            <span class="badge">Matapelajaran Tidak Aktif</span> | <a href="{site_url}/admin/mapel/edit/<?php echo $mapel['id']; ?>"><i class="icon-edit"></i> Edit</a>
        <?php endif; ?>
    </span>
    <h3 style="margin-top:0px; margin-bottom:0px;">
        <?php echo $mapel['nama']; ?> 
    </h3>
    <hr style="margin-top:5px;">
    <?php echo $mapel['info']; ?>
    </div>
</div>