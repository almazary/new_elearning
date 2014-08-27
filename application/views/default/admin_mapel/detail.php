
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right">
            <?php if ($mapel['aktif'] != 1): ?>
                <span class="badge">Matapelajaran Tidak Aktif</span> | <a href="{site_url}/admin/mapel/edit/<?php echo $mapel['id']; ?>"><i class="icon-edit"></i> Edit</a>
            <?php endif; ?>
        </span>
        <strong><?php echo $mapel['nama']; ?></strong>
    </div>
    <div class="panel-body">
        <?php echo $mapel['info']; ?>
    </div>
</div>