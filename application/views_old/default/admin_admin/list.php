
<table class="table table-striped">
    <thead>
        <tr>
            <th width="8%">No</th>
            <th>Nama</th>
            <th>Username</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $no => $a): ?>
        <?php 
        if (is_null($a['siswa_id'])) {
            //ambil pengajar
            $r = $this->pengajar_model->retrieve($a['pengajar_id']);
        } else {
            $r = $this->siswa_model->retrieve($a['siswa_id']);
        }
        ?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $a['username']; ?></td>
            <td>
                <div class="btn-group">
                  <a class="btn" href="{site_url}/admin/adm/detail/<?php echo $a['id']; ?>"><i class="icon-zoom-in"></i> Detail</a>
                  <a class="btn" href="{site_url}/admin/adm/edit/<?php echo $a['id']; ?>"><i class="icon-edit"></i> Edit</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<?php echo $pagination; ?>