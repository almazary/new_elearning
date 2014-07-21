
<div class="bs-callout bs-callout-info">
<p>
    Pilih matapelajaran yang ingin di masukkan pada <b><?php echo $kelas['nama']; ?></b>
</p>
</div>
<br>

<form>
<table class="table table-striped">
<tbody>
    <?php foreach ($mapels as $m): ?>
    <tr>
        <td>
            <?php if ($m['aktif'] != 1): ?>
            <span class="badge pull-right">Matapelajaran Tidak Aktif</span>
            <?php endif; ?>
            <label><input type="checkbox" name="mapel[]" value="<?php echo $m['id']; ?>" style="margin-top:-2px;margin-right:5px;"> <?php echo $m['nama']; ?></label>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
<br>
<button type="submit" class="btn btn-primary">Simpan</button> 
<a href="{site_url}/admin/mapel_kelas/#parent-<?php echo $parent['id']; ?>" class="btn">Batal</a>
</form>
