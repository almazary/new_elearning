<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();

        # cek versi
        $versi = get_pengaturan('versi', 'value');
        if ($versi < '1.2') {
            $this->config_model->update('versi', 'Versi', '1.2');
        }
    }

    private function get_allow_action($pengumuman)
    {
        if (is_siswa()) {
            $allow_action = array('detail');
        } elseif (is_admin()) {
            $allow_action = array('detail', 'edit', 'delete');
        } elseif (is_pengajar()) {
            # kalo dia yang buat
            if ($val['pengajar_id'] == get_sess_data('user', 'id')) {
                $allow_action = array('detail', 'edit', 'delete');
            } else {
                $allow_action = array('detail');
            }
        }

        return $allow_action;
    }

    function index($segment_3 = '')
    {
        $page_no = (int)$segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }
        $data['page_no'] = $page_no;

        # jika siswa
        if (is_siswa()) {
            $where = array(
                'tgl_tampil <=' => date('Y-m-d'),
                'tgl_tutup >='  => date('Y-m-d')
            );
        }

        # jika pengajar
        elseif (is_pengajar()) {
            $where = array(
                'pengajar_id' => get_sess_data('user', 'id')
            );
        }

        # jika admin
        elseif (is_admin()) {
            $where = array();
        }

        if (!empty($_GET['q'])) {
            $keyword = (string)urldecode($_GET['q']);
            $where   = array_merge($where, array(
                'judul'  => $keyword,
                'konten' => $keyword
            ));

            $data['keyword'] = $keyword;
        }

        $retrieve_all = $this->pengumuman_model->retrieve_all(10, $page_no, $where, true);

        # format pengumuman
        foreach ($retrieve_all['results'] as $key => &$val) {
            # cari pengajar
            $val['pengajar'] = $this->pengajar_model->retrieve($val['pengajar_id']);

            # allow action
            $val['allow_action'] = $this->get_allow_action($val);

            $retrieve_all['results'][$key] = $val;
        }

        $data['pengumuman'] = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'pengumuman/index/', empty($keyword) ? array() : array('?q=' . urlencode($keyword)));

        $this->twig->display('list-pengumuman.html', $data);
    }

}
