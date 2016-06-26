<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class untuk resource Matapelajaran
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

class Mapel extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();

        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
        }
    }

    function index($segment_3 = '')
    {
        $page_no = (int)$segment_3;
        $page_no = empty($page_no) ? 1 : $page_no;

        # ambil semua data mepel
        $retrieve_all = $this->mapel_model->retrieve_all(10, $page_no);

        $data['mapels']     = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'mapel/index/');

        $this->twig->display('list-mapel.html', $data);
    }

    function add()
    {
        if ($this->form_validation->run('mapel/add') == TRUE AND !is_demo_app()) {
            $nama = $this->input->post('nama', TRUE);
            $info = $this->input->post('info', TRUE);
            $this->mapel_model->create($nama, $info);

            $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran baru berhasil disimpan.'));
            redirect('mapel/index');
        }

        $this->twig->display('tambah-mapel.html');
    }

    function edit($segment_3 = '', $segment_4 = '')
    {
        $id       = (int)$segment_3;
        $uri_back = (string)$segment_4;

        # ambil satu
        $retrieve = $this->mapel_model->retrieve($id);
        if (empty($retrieve)) {
            redirect('mapel');
        }

        if (!empty($uri_back)) {
            $uri_back = deurl_redirect($uri_back);
        } else {
            $uri_back = site_url('mapel');
        }

        $data['uri_back'] = $uri_back;
        $data['mapel']    = $retrieve;

        if ($this->form_validation->run('mapel/edit') == TRUE AND !is_demo_app()) {
            $nama = $this->input->post('nama', TRUE);
            $info = $this->input->post('info', TRUE);
            $aktif = $this->input->post('status', TRUE);
            if (empty($aktif)) {
                $aktif = 0;
            }

            $this->mapel_model->update($id, $nama, $info, $aktif);

            $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran berhasil di perbaharui.'));
            redirect($uri_back);
        }

        $this->twig->display('edit-mapel.html', $data);
    }
}
