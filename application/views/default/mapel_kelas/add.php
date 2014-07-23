
<div class="bs-callout bs-callout-info">
<p>
    Pilih matapelajaran yang ingin di masukkan pada <b><?php echo $kelas['nama']; ?></b>
</p>
</div>
<br>

<?php echo form_open('admin/mapel_kelas/add/'.$parent['id'].'/'.$kelas['id']); ?>
<table class="table table-striped">
<tbody>
    <?php foreach ($mapels as $m): ?>
    <?php 
    //ini untuk ngecek apakah sudah ada mapel ini pada kelas ini
    $check = $this->mapel_model->retrieve_kelas(null, $kelas['id'], $m['id']);
    ?>
    <tr>
        <td>
            <?php if ($m['aktif'] != 1): ?>
            <span class="badge pull-right">Matapelajaran Tidak Aktif</span>
            <?php endif; ?>
            <label><input type="checkbox" name="mapel[]" value="<?php echo $m['id']; ?>" style="margin-top:-2px;margin-right:5px;" <?php if($m['aktif'] != 1){ echo 'disabled'; } ?> <?php if (!empty($check)){ echo 'checked'; } ?>> <?php echo $m['nama']; ?></label>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
<br>
<button type="submit" class="btn btn-primary">Simpan</button> 
<a href="{site_url}/admin/mapel_kelas/#parent-<?php echo $parent['id']; ?>" class="btn">Kembali</a>
</form>
