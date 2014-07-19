<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{web_title}</title>
    <link type="text/css" href="{base_url_theme}bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="{base_url_theme}bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="{base_url_theme}css/theme.css" rel="stylesheet">
    <link type="text/css" href="{base_url_theme}images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="{favicon_url}">
</head>
<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="{current_url}">
                    <img src="{logo_url_medium}"> {site_name_default} 
                </a>

            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module span5 offset3">
                    {form_open}
                        <div class="module-head">
                            <h3>{web_title}</h3>
                        </div>
                        <div class="module-body">
                            <div class="alert alert-success">
                                {info}
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="nama" type="text" placeholder="Nama Sekolah" value="<?php echo set_value('nama'); ?>">
                                    <?php echo form_error('nama'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <textarea name="alamat" placeholder="Alamat Sekolah" class="span12"><?php echo set_value('alamat'); ?></textarea>
                                    <?php echo form_error('alamat'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="email" type="text" placeholder="Admin Email" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="password" type="password" placeholder="Admin Password">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="password2" type="password" placeholder="Confirm Password">
                                    <?php echo form_error('password2'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-large btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    {form_close}
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="footer">
        <div class="container">
            <b class="copyright">{copyright_setup} </b> All rights reserved.<br>
            {version}
        </div>
    </div>
    <script src="{base_url_theme}scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="{base_url_theme}scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="{base_url_theme}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>