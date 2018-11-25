<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class menu aplikasi e-learning dokumenary.net
 *
 * @author Almazari <almazary@gmail.com>
 * @since  1.8
 */
class Menu
{
    private $menus = array();

    function __construct()
    {
        $this->default_menu();
    }

    private function default_menu()
    {
        $this->menus['admin'] = array(
            0 => array(
                '<a href="' . site_url() . '"><i class="menu-icon icon-home"></i>' . __('home') . '</a>',
                '<a href="' . site_url('pengumuman') . '"><i class="menu-icon icon-bullhorn"></i>' . __('announcement') . '</a>',
                '<a href="' . site_url('message') . '"><i class="menu-icon icon-comments"></i>' . __('message') .' <span class="menu-count-new-msg"></span></a>'
            ),
            1 => array(
                '<a href="' . site_url('siswa'). '"><i class="menu-icon icon-group"></i>' . __('student') . ' <span class="menu-count-pending-siswa"></span></a>',
                '<a href="' . site_url('pengajar'). '"><i class="menu-icon icon-user"></i>' . __('teacher') . ' <span class="menu-count-pending-pengajar"></span></a>'
            ),
            2 => array(
                '<a href="' . site_url('tugas?clear_filter=true') . '"><i class="menu-icon icon-tasks"></i>' . __('task') . ' </a>',
                '<a href="' . site_url('materi?clear_filter=true') . '"><i class="menu-icon icon-book"></i>' . __('material') . ' </a>',
                '<a href="' . site_url('materi/komentar') . '"><i class="menu-icon icon-comments"></i>' . __('material_comment') . ' <span class="menu-count-unread-laporan"></span></a>'
            ),
            3 => array(
                '<a href="' . site_url('kelas/mapel_kelas') . '"><i class="menu-icon icon-paste"></i>' . __('subject_class') . ' </a>',
                '<a href="' . site_url('kelas') . '"><i class="menu-icon icon-tasks"></i>' . __('class_manage') . ' </a>',
                '<a href="' . site_url('mapel') . '"><i class="menu-icon icon-book"></i>' . __('subject_manage') . ' </a>'
            ),
            4 => array(
                '<a href="' . site_url('welcome/pengaturan') . '"><i class="menu-icon icon-wrench"></i>' . __('setting') . '</a>',
                '<a href="' . site_url('email') . '"><i class="menu-icon icon-envelope"></i>' . __('email_template') . '</a>',
                '<a href="' . site_url('welcome/backup_restore') . '"><i class="menu-icon icon-hdd"></i>' . __('backup_restore') . '</a>',
                '<a href="' . site_url('welcome/hapus_data') . '"><i class="menu-icon icon-trash"></i>' . __('delete_data') . '</a>',
            ),
            5 => array(
                '<a href="' . site_url('login/logout') . '"><i class="menu-icon icon-signout"></i>' . __('logout') . ' </a>'
            )
        );

        $this->menus['pengajar'] = array(
            0 => array(
                '<a href="' . site_url() . '"><i class="menu-icon icon-home"></i>' . __('home') . '</a>',
                '<a href="' . site_url('pengumuman') . '"><i class="menu-icon icon-bullhorn"></i>' . __('announcement') . '</a>',
                '<a href="' . site_url('message') . '"><i class="menu-icon icon-comments"></i>' . __('message') . ' <span class="menu-count-new-msg"></span></a>',
                '<a href="' . site_url('pengajar/jadwal') . '"><i class="menu-icon icon-tasks"></i>' . __('schedule_teach') . ' </a>'
            ),
            1 => array(
                '<a href="' . site_url('tugas?clear_filter=true') . '"><i class="menu-icon icon-tasks"></i>' . __('task') . ' </a>',
                '<a href="' . site_url('materi?clear_filter=true') . '"><i class="menu-icon icon-book"></i>' . __('material') . ' </a>',
                '<a href="' . site_url('materi/komentar') . '"><i class="menu-icon icon-comments"></i>' . __('my_comment') . '</a>'
            ),
            2 => array(
                '<a href="' . site_url('pengajar/filter') . '"><i class="menu-icon icon-search"></i>' . __('filter_teacher') . ' </a>',
                '<a href="' . site_url('siswa/filter') . '"><i class="menu-icon icon-search"></i>' . __('filter_student') . ' </a>'
            ),
            3 => array(
                '<a href="' . site_url('login/logout') . '"><i class="menu-icon icon-signout"></i>' . __('logout') . ' </a>'
            )
        );

        $this->menus['siswa'] = array(
            0 => array(
                '<a href="' . site_url() . '"><i class="menu-icon icon-home"></i>' . __('home') . '</a>',
                '<a href="' . site_url('message') . '"><i class="menu-icon icon-comments"></i>' . __('message') . ' <span class="menu-count-new-msg"></span></a>',
                '<a href="' . site_url('siswa/jadwal_mapel') . '"><i class="menu-icon icon-tasks"></i>' . __('subject_schedule') . '</a>'
            ),
            1 => array(
                '<a href="' . site_url('tugas?clear_filter=true') . '"><i class="menu-icon icon-tasks"></i>' . __('task') . ' </a>',
                '<a href="' . site_url('materi?clear_filter=true') . '"><i class="menu-icon icon-book"></i>' . __('material') . ' </a>',
                '<a href="' . site_url('materi/komentar') . '"><i class="menu-icon icon-comments"></i>' . __('my_comment') . ' </a>'
            ),
            2 => array(
                '<a href="' . site_url('pengajar/filter') . '"><i class="menu-icon icon-search"></i>' . __('filter_teacher') . ' </a>',
                '<a href="' . site_url('siswa/filter') . '"><i class="menu-icon icon-search"></i>' . __('filter_student') . ' </a>'
            ),
            3 => array(
                '<a href="' . site_url('login/logout') . '"><i class="menu-icon icon-signout"></i>' . __('logout') . ' </a>'
            )
        );
    }

    public function add($rule, $index, $link)
    {
        $this->menus[$rule][$index][] = $link;
    }

    public function get()
    {
        if (is_admin()) {
            return $this->menus['admin'];
        } elseif (is_pengajar()) {
            return $this->menus['pengajar'];
        } elseif (is_siswa()) {
            return $this->menus['siswa'];
        }
    }
}
