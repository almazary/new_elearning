<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>{module_title}</h3>
        </div>
        <div class="module-body">
            <?php echo $this->session->flashdata('siswa'); ?>
            
            <?php include $sub_content_file; ?>
        </div>
    </div>
</div>