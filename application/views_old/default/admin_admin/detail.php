
<table class="table table-striped">
    <tr>
        <th>Username</th>
        <td><?php echo $login['username']; ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php echo $pengajar['nama']; ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php echo $pengajar['alamat']; ?></td>
    </tr>
    <tr>
        <th>Foto</th>
        <td>
            <?php if (!empty($pengajar['foto']) AND is_file(get_path_image($pengajar['foto']))) : ?>
            <img src="<?php echo get_url_image($pengajar['foto'], 'medium'); ?>">
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo anchor('admin/adm/edit/'.$login['id'], '<i class="icon icon-edit"></i> Edit</a>', array('class' => 'btn btn-small')); ?></td>
    </tr>
</table>