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
                    <img src="{logo_url_medium}"> {site_name} 
                </a>
                
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Go to
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{site_url}/siswa/login">Login Siswa</a></li>
                                <li><a href="{site_url}/pengajar/login">Login Pengajar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->

            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class="wrapper">
        <div class="container">
    
            <?php include $content_file; ?>

        </div>
    </div><!--/.wrapper-->

    <div class="footer">
        <div class="container">
            <center>
                <b class="copyright">{copyright} </b> All rights reserved.<br>
                {version} | Page loaded in {elapsed_time} seconds.
            </center>
        </div>
    </div>
    <script src="{base_url_theme}scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="{base_url_theme}scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="{base_url_theme}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>