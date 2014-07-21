
<div class="panel panel-default">
    <div class="panel-body">
    <span class="pull-right">
        <?php if ($mapel['aktif'] != 1): ?>
            <span class="badge">Mapel Tidak Aktif</span>
        <?php endif; ?>
    </span>
    <h3 style="margin-top:0px; margin-bottom:0px;">
        <?php echo $mapel['nama']; ?> 
    </h3>
    <hr style="margin-top:5px;">
    <?php echo $mapel['info']; ?>
    </div>
</div>