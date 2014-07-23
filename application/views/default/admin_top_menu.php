
<ul class="nav pull-right">
    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo get_sess_data('pengajar')['nama']; ?> <img src="{base_url_theme}images/user.png" class="nav-avatar" />
        <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{site_url}/admin/ch_pass">Ubah Username</a></li>
            <li><a href="{site_url}/admin/ch_pass">Ubah Password</a></li>
            <li><a href="{site_url}/admin/logout">Logout</a></li>
        </ul>
    </li>
</ul>