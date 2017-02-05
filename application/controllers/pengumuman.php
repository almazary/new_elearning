<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource Pengumuman
 *
 * @package   e-Learning Dokumenary Net
 * @author    Almazari <almazary@gmail.com>
 * @copyright Copyright (c) 2013 - 2016, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

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
            if ($pengumuman['pengajar_id'] == get_sess_data('user', 'id')) {
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
                'tgl_tutup >='  => date('Y-m-d'),
                'tampil_siswa'  => 1
            );
        }

        # jika admin / pengajar
        elseif (is_admin() OR is_pengajar()) {
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

    function add()
    {
        # yang bisa buat pengumuman adalah pengajar / admin
        if (!is_pengajar() AND !is_admin()) {
            redirect('pengumuman/index');
        }

        if ($this->form_validation->run('pengumuman') == true) {
            $judul           = $this->input->post('judul', true);
            $split           = explode(" s/d ", $this->input->post('tgl_tampil', true));
            $tgl_tampil      = $split[0];
            $tgl_tutup       = $split[1];
            $konten          = $this->input->post('konten');
            $tampil_siswa    = $this->input->post('tampil_siswa', true);
            $tampil_pengajar = $this->input->post('tampil_pengajar', true);

            $this->pengumuman_model->create($judul, $konten, $tgl_tampil, $tgl_tutup, $tampil_siswa, $tampil_pengajar, get_sess_data('user', 'id'));

            $this->session->set_flashdata('pengumuman', get_alert('success', 'Pengumuman berhasil dibuat.'));
            redirect('pengumuman/index/1');
        }

        # load komponen
        $html_js = get_texteditor();
        $html_js .= load_comp_js(array(
            base_url('assets/comp/jquery/moment.min.js'),
            base_url('assets/comp/daterangepicker/jquery.daterangepicker.js'),
        ));

        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/daterangepicker/daterangepicker.css')));

        $this->twig->display('tambah-pengumuman.html', $data);
    }

    function edit($segment_3 = '')
    {
        # yang bisa edit pengumuman adalah pengajar / admin
        if (!is_pengajar() AND !is_admin()) {
            redirect('pengumuman/index');
        }

        $id = (int)$segment_3;
        $pengumuman = $this->pengumuman_model->retrieve(array('id' => $id));
        if (empty($pengumuman)) {
            $this->session->set_flashdata('pengumuman', get_alert('warning', 'Pengumuman tidak ditemukan.'));
            redirect('pengumuman/index/1');
        }

        $allow_action = $this->get_allow_action($pengumuman);
        if (!in_array('edit', $allow_action)) {
            $this->session->set_flashdata('pengumuman', get_alert('warning', 'Akses ditolak.'));
            redirect('pengumuman/index/1');
        }

        $data['p'] = $pengumuman;

        if ($this->form_validation->run('pengumuman') == true) {
            $judul           = $this->input->post('judul', true);
            $split           = explode(" s/d ", $this->input->post('tgl_tampil', true));
            $tgl_tampil      = $split[0];
            $tgl_tutup       = $split[1];
            $konten          = $this->input->post('konten');
            $tampil_siswa    = $this->input->post('tampil_siswa', true);
            $tampil_pengajar = $this->input->post('tampil_pengajar', true);

            $this->pengumuman_model->update($pengumuman['id'], $judul, $konten, $tgl_tampil, $tgl_tutup, $tampil_siswa, $tampil_pengajar, $pengumuman['pengajar_id']);

            $this->session->set_flashdata('pengumuman', get_alert('success', 'Pengumuman berhasil diperbaharui.'));
            redirect('pengumuman/edit/' . $pengumuman['id']);
        }

        # load komponen
        $html_js = get_texteditor();
        $html_js .= load_comp_js(array(
            base_url('assets/comp/jquery/moment.min.js'),
            base_url('assets/comp/daterangepicker/jquery.daterangepicker.js'),
        ));

        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/daterangepicker/daterangepicker.css')));

        $this->twig->display('edit-pengumuman.html', $data);
    }

    function delete($segment_3 = '')
    {
        # yang bisa edit pengumuman adalah pengajar / admin
        if (!is_pengajar() AND !is_admin()) {
            redirect('pengumuman/index');
        }

        $id = (int)$segment_3;
        $pengumuman = $this->pengumuman_model->retrieve(array('id' => $id));
        if (empty($pengumuman)) {
            $this->session->set_flashdata('pengumuman', get_alert('warning', 'Pengumuman tidak ditemukan.'));
            redirect('pengumuman/index/1');
        }

        $allow_action = $this->get_allow_action($pengumuman);
        if (!in_array('delete', $allow_action)) {
            $this->session->set_flashdata('pengumuman', get_alert('warning', 'Akses ditolak.'));
            redirect('pengumuman/index/1');
        }

        $this->pengumuman_model->delete($pengumuman['id']);

        $this->session->set_flashdata('pengumuman', get_alert('success', 'Pengumuman berhasil dihapus.'));
        redirect('pengumuman/index/1');
    }

    function detail($segment_3 = '')
    {
        $id = (int)$segment_3;
        $pengumuman = $this->pengumuman_model->retrieve(array('id' => $id));
        if (empty($pengumuman)) {
            $this->session->set_flashdata('pengumuman', get_alert('warning', 'Pengumuman tidak ditemukan.'));
            redirect('pengumuman/index/1');
        }

        # cari pengajar
        $pengajar = $this->pengajar_model->retrieve($pengumuman['pengajar_id']);
        if (is_admin()) {
            $pengajar['link_profil'] = site_url('pengajar/detail/' . $pengajar['status_id'] . '/' . $pengajar['id']);
        } else {
            $pengajar['link_profil'] = site_url('pengajar/detail/' . $pengajar['id']);
        }
        $pengumuman['pengajar']     = $pengajar;
        $pengumuman['allow_action'] = $this->get_allow_action($pengumuman);
        $data['p']                  = $pengumuman;

        $this->twig->display('detail-pengumuman.html', $data);
    }
}
