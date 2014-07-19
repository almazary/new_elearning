<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{web_title}</title>
        <link type="text/css" href="{base_url_theme}bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="{base_url_theme}bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="{base_url_theme}css/theme.css" rel="stylesheet">
        <link type="text/css" href="{base_url_theme}images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i>
                    </a>
                    <a class="brand" href="{site_url}/admin">
                        <img src="{logo_url_medium}"> {site_name} 
                    </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{base_url_theme}images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{site_url}/{uri_segment_1}/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>

        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">

                        <?php include $menu_file; ?>

                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        
                        <?php include $content_file; ?>

                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
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
        <script src="{base_url_theme}scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="{base_url_theme}scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="{base_url_theme}scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="{base_url_theme}scripts/common.js" type="text/javascript"></script>
      
    </body>
