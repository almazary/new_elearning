<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class ajax, semua aksi yang dieksekusi via ajax tempatnya disini.
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

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        # jika belum login die
        if (!is_login()) {
            exit('403 Forbidden.');
        }

        # jika bukan ajax
        if (!is_ajax()) {
            exit('No direct script access allowed');
        }
    }

    function get_data($page)
    {
        switch ($page) {
            case 'elearning-dokumenary-feed':
                if (!is_admin()) {
                    echo json_encode(array(
                        'feed'        => array(),
                        'urgent_info' => "",
                    ));die;
                }

                # ambil informasi update
                $urgent_info = $this->check_urgent_info();
                if (!empty($urgent_info)) {
                    $urgent_info = $this->twig->render('urgent-info.html', array('info' => $urgent_info));
                }

                $feed = array();
                try {
                    // https://bavotasan.com/2010/display-rss-feed-with-php/
                    $rss = new DOMDocument();
                    $rss->load($this->update_link);
                    foreach ($rss->getElementsByTagName('item') as $node) {
                        $item = array (
                            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                        );

                        array_push($feed, $item);
                    }
                } catch (\Exception $e) {
                }

                echo json_encode(array(
                    'feed'        => $feed,
                    'urgent_info' => $urgent_info,
                ));
            break;

            case 'penerima':
                $query =  !empty($_GET['query']) ? $_GET['query'] : '';

                # jika query tidak kosong
                $results = array();
                if (!empty($query)) {
                    $sql = "(SELECT " . $this->db->dbprefix('login') . ".username, " . $this->db->dbprefix('pengajar') . ".nama FROM " . $this->db->dbprefix('pengajar') . " INNER JOIN " . $this->db->dbprefix('login') . " ON " . $this->db->dbprefix('pengajar') . ".id = " . $this->db->dbprefix('login') . ".pengajar_id
                            WHERE " . $this->db->dbprefix('login') . ".username LIKE '%" . $this->db->escape_like_str($query) . "%' OR " . $this->db->dbprefix('pengajar') . ".nama LIKE '%" . $this->db->escape_like_str($query) . "%' LIMIT 20)
                            UNION
                            (SELECT " . $this->db->dbprefix('login') . ".username, " . $this->db->dbprefix('siswa') . ".nama FROM " . $this->db->dbprefix('siswa') . " INNER JOIN " . $this->db->dbprefix('login') . " ON " . $this->db->dbprefix('siswa') . ".id = " . $this->db->dbprefix('login') . ".siswa_id
                            WHERE " . $this->db->dbprefix('login') . ".username LIKE '%" . $this->db->escape_like_str($query) . "%' OR " . $this->db->dbprefix('siswa') . ".nama LIKE '%" . $this->db->escape_like_str($query) . "%' LIMIT 20)";

                    $result = $this->db->query($sql);

                    foreach ($result->result_array() as $r) {
                        $results[] = addslashes($r['nama']) . ' [' . $r['username'] . ']';
                    }
                }

                echo json_encode($results);
            break;

            case 'count_new_data':
                # pesan baru
                $new_msg = $this->msg_model->count(1, get_sess_data('login', 'id'), 'unread');

                $pending_siswa    = 0;
                $pending_pengajar = 0;
                $unread_laporan   = 0;

                # jika login admin
                if (is_admin()) {
                    # cari jumlah pending siswa
                    $pending_siswa = $this->siswa_model->count('pending');

                    # cari pending pengajar
                    $pending_pengajar = $this->pengajar_model->count('pending');

                    # laporan
                    $unread_laporan = $this->materi_model->count('unread-laporan');
                }

                # ambil data login terahir
                $retrieve_last_log = $this->login_model->retrieve_new_log();
                foreach ($retrieve_last_log as $key => $val) {
                    $retrieve_last_log[$key]['user'] = $this->get_user_data($val['login_id']);

                    if (belum_sehari($val['lasttime'])) {
                        $retrieve_last_log[$key]['timeago'] = iso8601($val['lasttime']);
                    }

                    $retrieve_last_log[$key]['lasttime'] = format_datetime($val['lasttime']);
                }

                $render_last_login = $this->twig->render('last-login-person.html', array('last_login_data' => $retrieve_last_log));

                $result = array(
                    'new_msg'          => $new_msg,
                    // 'new_update'       => $count_update,
                    'pending_siswa'    => $pending_siswa,
                    'pending_pengajar' => $pending_pengajar,
                    'unread_laporan'   => $unread_laporan,
                    'last_login_list'  => $render_last_login,
                );

                echo json_encode($result);
            break;
        }
    }

    function post_data($page)
    {
        switch ($page) {
            case 'hide_show_countdown':
                $tugas_id = $this->input->post('tugas_id', true);
                $hide     = $this->input->post('hide', true);
                sess_hide_countdown('set', $tugas_id, $hide);

                echo "1";
            break;

            case 'check_reset_status':
                $siswa_id = $this->input->post('siswa_id', true);
                $tugas_id = $this->input->post('tugas_id', true);

                $field_id = 'mengerjakan-' . $siswa_id . '-' . $tugas_id;
                $mengerjakan = retrieve_field($field_id);
                if (empty($mengerjakan)) {
                    echo "ok_reset";
                }
            break;

            case 'hirarki_kelas':
                $o = 1;
                foreach ((array)$_POST['list'] as $id => $parent_id){
                    if (!is_numeric($parent_id)) {
                        $parent_id = null;
                    }
                    $retrieve = $this->kelas_model->retrieve($id, true);

                    # update
                    $this->kelas_model->update($id, $retrieve['nama'], $parent_id, $o, $retrieve['aktif']);

                    $o++;
                }
            break;

            case 'get_subkelas':
                $parent_id = $this->input->post('parent_kelas_id', true);
                if (!empty($parent_id)) {
                    echo '<option value="">--pilih--</option>';
                    $subkelas = $this->kelas_model->retrieve_all($parent_id, array('aktif' => 1));
                    foreach ($subkelas as $sub) {
                        echo '<option value="'.$sub['id'].'">'.$sub['nama'].'</option>';
                    }
                }
            break;

            case 'mapel_kelas':
                $kelas_id = $this->input->post('kelas_id', TRUE);
                echo '<option value="">Pilih Matapelajaran</option>';
                $retrieve_all = $this->mapel_model->retrieve_all_kelas(null, $kelas_id, 1);
                foreach ($retrieve_all as $v) {
                    $m = $this->mapel_model->retrieve($v['mapel_id']);
                    if (empty($m)) {
                        continue;
                    }
                    echo '<option value="'.$v['id'].'">'.$m['nama'].'</option>';
                }
            break;

            case 'update_jawaban_ganda':
                if (!is_siswa()) {
                    exit('Akses ditolak');
                }

                $tugas_id      = (int)$this->input->post('tugas_id', true);
                $pertanyaan_id = (int)$this->input->post('pertanyaan_id', true);
                $pilihan_id    = (int)$this->input->post('pilihan_id', true);

                $tugas = $this->tugas_model->retrieve($tugas_id);
                if (empty($tugas)) {
                    exit('Akses ditolak');
                }

                $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
                if (empty($pertanyaan)) {
                    exit('Akses ditolak');
                }

                if ($pertanyaan['tugas_id'] != $tugas['id']) {
                    exit('Akses ditolak');
                }

                $pilihan = $this->tugas_model->retrieve_pilihan($pilihan_id, $pertanyaan['id']);
                if (empty($pilihan)) {
                    exit('Akses ditolak');
                }

                $table_name  = 'field_tambahan';
                $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $field_name  = 'Mengerjakan Tugas';

                $check_field = retrieve_field($field_id);
                if (empty($check_field)) {
                    exit('Akses ditolak');
                }

                # update index jawaban
                $field_value = json_decode($check_field['value'], 1);
                $field_value['jawaban'][$pertanyaan['id']] = $pilihan['id'];

                update_field($field_id, $field_name, json_encode($field_value));
            break;

            case 'update_jawaban_essay':
                if (!is_siswa()) {
                    exit('Akses ditolak');
                }

                $tugas_id      = (int)$this->input->post('tugas_id', true);
                $pertanyaan_id = (int)$this->input->post('pertanyaan_id', true);
                $jawaban       = $this->input->post('jawaban');

                $tugas = $this->tugas_model->retrieve($tugas_id);
                if (empty($tugas)) {
                    exit('Akses ditolak');
                }

                $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
                if (empty($pertanyaan)) {
                    exit('Akses ditolak');
                }

                if ($pertanyaan['tugas_id'] != $tugas['id']) {
                    exit('Akses ditolak');
                }

                $table_name  = 'field_tambahan';
                $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $field_name  = 'Mengerjakan Tugas';

                $check_field = retrieve_field($field_id);
                if (empty($check_field)) {
                    exit('Akses ditolak');
                }

                # update index jawaban
                $field_value = json_decode($check_field['value'], 1);
                $field_value['jawaban'][$pertanyaan['id']] = $jawaban;

                update_field($field_id, $field_name, json_encode($field_value));
            break;

            case 'new_msg':
                $active_msg_id = $this->input->post('active_msg_id', true);
                $active_msg_id = (int)$active_msg_id;
                if (empty($active_msg_id)) {
                    die;
                }

                $msg = $this->msg_model->retrieve(get_sess_data('login', 'id'), $active_msg_id, false, false);
                if (empty($msg)) {
                    die;
                }
                $msg = $msg['retrieve'];

                $this->db->where('owner_id', get_sess_data('login', 'id'));
                $this->db->where('opened', '0');
                $this->db->where_in('sender_receiver_id', array(get_sess_data('login', 'id'), $msg['sender_receiver_id']));
                $this->db->order_by('id', 'ASC');
                $results = $this->db->get('messages');

                foreach ($results->result_array() as $retrieve) {
                    $this->msg_model->update_read($retrieve['id']);

                    # jika inbox yang dicari pengirimnya
                    if ($retrieve['type_id'] == 1) {
                        $get_user = $retrieve['sender_receiver_id'];
                    } elseif ($retrieve['type_id'] == 2) {
                        $get_user = $retrieve['owner_id'];
                    }

                    # cari sender/receiver
                    $login = $this->login_model->retrieve($get_user);
                    if (!empty($login['siswa_id'])) {
                        $user = $this->siswa_model->retrieve($login['siswa_id']);
                        if (is_admin()) {
                            $user['link_profil'] = site_url('siswa/detail/' . $user['status_id'] . '/' . $user['id']);
                        } else {
                            $user['link_profil'] = site_url('siswa/detail/' . $user['id']);
                        }
                        $user['link_image'] = get_url_image_siswa($user['foto'], 'medium', $user['jenis_kelamin']);

                    } elseif (!empty($login['pengajar_id'])) {
                        $user = $this->pengajar_model->retrieve($login['pengajar_id']);
                        if (is_admin()) {
                            $user['link_profil'] = site_url('pengajar/detail/' . $user['status_id'] . '/' . $user['id']);
                        } else {
                            $user['link_profil'] = site_url('pengajar/detail/' . $user['id']);
                        }
                        $user['link_image'] = get_url_image_pengajar($user['foto'], 'medium', $user['jenis_kelamin']);
                    }

                    $retrieve['profil'] = $user;
                    if (belum_sehari($retrieve['date'])) {
                        $retrieve['timeago'] = iso8601($retrieve['date']);
                    }

                    $retrieve['date'] = format_datetime($retrieve['date']);

                    $this->twig->display('detail-pesan-item.html', array(
                        'active_msg_id' => $msg['id'],
                        'item_msg'      => $retrieve,
                        'msg_flag_new'  => 1
                    ));
                }
            break;
        }
    }

}
