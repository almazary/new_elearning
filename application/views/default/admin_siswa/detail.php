<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Profil Siswa</strong>
        <div class="btn-group pull-right" style="margin-top:-4px;">
            <?php echo anchor('admin/siswa/edit_profile/'.$status_id.'/'.$siswa['id'], 'Edit Profil', array('class' => 'iframe-4 btn btn-small btn-primary', 'title' => 'Edit Profil Siswa')); ?>
            <?php echo anchor('admin/siswa/edit_picture/'.$status_id.'/'.$siswa['id'], 'Edit Foto', array('class' => 'iframe-5 btn btn-small btn-primary', 'title' => 'Edit Foto Siswa')); ?>
        </div>
    </div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <th bgcolor="#FBFBFB" width="25%">NIS</th>
                <td><?php echo $siswa['nis']; ?></td>
                <td rowspan="5" width="15%">
                    <img style="width:113px;" class="img-polaroid" src="<?php echo get_url_image_siswa($siswa['foto'], 'medium', $siswa['jenis_kelamin']); ?>">
                </td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Nama</th>
                <td><?php echo $siswa['nama']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Jenis Kelamin</th>
                <td><?php echo $siswa['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Tahun Masuk</th>
                <td colspan="2"><?php echo $siswa['tahun_masuk']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Tempat Lahir</th>
                <td><?php echo $siswa['tempat_lahir']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Tanggal Lahir</th>
                <td><?php echo (!empty($siswa['tgl_lahir'])) ? date('d F Y', strtotime($siswa['tgl_lahir'])) : ''; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Agama</th>
                <td colspan="2"><?php echo $siswa['agama']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Alamat</th>
                <td colspan="2"><?php echo $siswa['alamat']; ?></td>
            </tr>
            <tr>
                <th bgcolor="#FBFBFB">Status</th>
                <td colspan="2">
                    <?php
                    if ($siswa['status_id'] == 0) {
                        echo 'Pending';
                    } elseif ($siswa['status_id'] == 1) {
                        echo 'Aktif';
                    } elseif ($siswa['status_id'] == 2) {
                        echo 'Blocking';
                    } elseif ($siswa['status_id'] == 3) {
                        echo 'Alumni';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row-fluid">
    <div class="span6">
        <div class="panel panel-default" id="riwayat-kelas">
            <div class="panel-heading">
                <strong>Riwayat Kelas</strong>
                <?php if ($status_id != 3): ?>
                <div class="btn-group pull-right" style="margin-top:-4px;">
                    <?php echo anchor('admin/siswa/moved_class/'.$status_id.'/'.$siswa['id'], 'Pindah Kelas', array('class' => 'iframe btn btn-small btn-primary', 'title' => 'Pindah siswa ke Kelas lain')); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kelas</th>
                        <?php if ($status_id != 3): ?>
                        <th>Aktif</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa_kelas['results'] as $no => $v) :?>
                    <tr>
                        <td><?php echo $no; ?>.</td>
                        <td>
                            <?php
                            $kelas = $this->kelas_model->retrieve($v['kelas_id']);
                            echo $kelas['nama'];
                            ?>
                        </td>
                        <?php if ($status_id != 3): ?>
                        <td>
                            <?php
                            if ($v['aktif'] == 1) {
                                echo '<i class="icon icon-ok"></i>';
                            }
                            ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="panel panel-default" id="akun">
            <div class="panel-heading">
                <strong>Akun Login</strong>
                <div class="btn-group pull-right" style="margin-top:-4px;">
                    <?php echo anchor('admin/siswa/edit_username/'.$status_id.'/'.$siswa['id'], 'Edit Username', array('class' => 'iframe-2 btn btn-small btn-primary', 'title' => 'Edit Username Siswa')); ?>
                    <?php echo anchor('admin/siswa/edit_password/'.$status_id.'/'.$siswa['id'], 'Edit Password', array('class' => 'iframe-3 btn btn-small btn-primary', 'title' => 'Edit Password Siswa')); ?>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th width="30%" bgcolor="#FBFBFB">Username</th>
                            <td>
                                <?php echo $siswa_login['username']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th bgcolor="#FBFBFB">Password</th>
                            <td>
                                *********
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
