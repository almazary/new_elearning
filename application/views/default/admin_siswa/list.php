
<div class="row-fluid">
<div class="span8">
    <a href="{site_url}/admin/siswa/add/<?php echo $status_id; ?>" class="btn btn-primary">Tambah Siswa</a>
</div>

<div class="span4">
    <div class="btn-group">
        <?php echo anchor('admin/siswa/list/1', 'Aktif', array('class' => ($status_id == 1) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/0', 'Pending', array('class' => ($status_id == 0) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/2', 'Blocking', array('class' => ($status_id == 2) ? 'btn btn-info' : 'btn')); ?>
        <?php echo anchor('admin/siswa/list/3', 'Alumni', array('class' => ($status_id == 3) ? 'btn btn-info' : 'btn')); ?>
    </div>
</div>

<br><br>
<?php if (in_array($status_id, array(1, 3))): ?>
<p class="text-warning"><b>NB: </b> Siswa tidak dapat dihapus namun dapat di ubah menjadi blocking.</p>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="8%">No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswas as $no => $v): ?>
        <tr>
            <td><?php echo $no; ?>.</td>
            <td>
                <?php echo $v['nis']; ?>
            </td>
            <td>
                <?php echo $v['nama']; ?>
            </td>
            <td>
                <?php 
                $kelas_aktif = $this->kelas_model->retrieve_siswa(null, array('siswa_id' => $v['id'], 'aktif' => '1'));
                $kelas = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);
                echo $kelas['nama'];
                ?>
            </td>
            <td>
                <div class="btn-group">
                  <a class="btn" href="{site_url}/admin/siswa/detail/<?php echo $status_id; ?>/<?php echo $v['id']; ?>"><i class="icon-zoom-in"></i> Detail</a>
                  <a class="btn" href="{site_url}/admin/siswa/edit/<?php echo $status_id; ?>/<?php echo $v['id']; ?>"><i class="icon-edit"></i> Edit</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<?php echo $pagination; ?>

</div>