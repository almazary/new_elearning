
<div class="row-fluid">
<div class="span4">
    <a href="{site_url}/admin/mapel/add" class="btn btn-primary">Tambah Mapel</a>
</div>

<div class="span8">
    
</div>

<br><br>
<p class="text-warning"><b>NB: </b> Matapelajaran tidak dapat dihapus namun dapat di ubah menjadi tidak aktif.</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="8%">No</th>
            <th>Matapelajaran</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mapels as $no => $v): ?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td>
                <span <?php if ($v['aktif'] != 1) { echo 'class="text-muted"'; } ?>>
                <?php echo $v['nama']; ?>
                </span>
            </td>
            <td>
                <div class="btn-group">
                  <a class="btn" href="{site_url}/admin/mapel/detail/<?php echo $v['id']; ?>"><i class="icon-zoom-in"></i> Detail</a>
                  <a class="btn" href="{site_url}/admin/mapel/edit/<?php echo $v['id']; ?>"><i class="icon-edit"></i> Edit</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<?php echo $pagination; ?>

</div>