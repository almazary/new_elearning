<div class="row">
    <div class="module span4 offset4">
        {form_open}
            <div class="module-head">
                <h3>{web_title}</h3>
            </div>
            <div class="module-body">
                <?php echo $this->session->flashdata('login'); ?>
                <div class="control-group">
                    <div class="controls row-fluid">
                        <input class="span12" name="email" type="text" placeholder="Username (Email)" value="<?php echo set_value('email'); ?>">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls row-fluid">
                        <input class="span12" name="password" type="password" placeholder="Password">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
            </div>
            <div class="module-foot">
                <div class="control-group">
                    <div class="controls clearfix">
                        <button type="submit" class="btn btn-large btn-primary pull-right">Login</button>
                    </div>
                </div>
            </div>
        {form_close}
    </div>
</div>