<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        # jika belum login die
        if (!is_login()) {
            exit('Maaf anda harus login.');
        }

        # jika bukan ajax
        if (!is_ajax()) {
            exit('No direct script access allowed');
        }
    }

    function get_data($page)
    {
        switch ($page) {
            case 'penerima':
                $query =  !empty($_GET['query']) ? $_GET['query'] : '';

                $sql = "SELECT " . $this->db->dbprefix('login') . ".username, " . $this->db->dbprefix('pengajar') . ".nama FROM " . $this->db->dbprefix('pengajar') . " INNER JOIN " . $this->db->dbprefix('login') . " ON " . $this->db->dbprefix('pengajar') . ".id = " . $this->db->dbprefix('login') . ".pengajar_id
                        WHERE " . $this->db->dbprefix('login') . ".username LIKE '%" . $this->db->escape_like_str($query) . "%' OR " . $this->db->dbprefix('pengajar') . ".nama LIKE '%" . $this->db->escape_like_str($query) . "%'
                        UNION
                        SELECT " . $this->db->dbprefix('login') . ".username, " . $this->db->dbprefix('siswa') . ".nama FROM " . $this->db->dbprefix('siswa') . " INNER JOIN " . $this->db->dbprefix('login') . " ON " . $this->db->dbprefix('siswa') . ".id = " . $this->db->dbprefix('login') . ".siswa_id
                        WHERE " . $this->db->dbprefix('login') . ".username LIKE '%" . $this->db->escape_like_str($query) . "%' OR " . $this->db->dbprefix('siswa') . ".nama LIKE '%" . $this->db->escape_like_str($query) . "%'";

                $result = $this->db->query($sql);

                $data['suggestions'] = array();
                foreach ($result->result_array() as $r) {
                    $data['suggestions'][] = array('value' => $r['nama'] . ' <' . $r['username'] . '>');
                }

                echo json_encode($data);
            break;

            case 'new_msg':
                echo $this->msg_model->count(1, get_sess_data('login', 'id'), 'unread');
            break;
        }
    }

    function post_data($page)
    {
        switch ($page) {
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
                $jawaban       = $this->input->post('jawaban', true);

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
                    echo '';
                }

                $msg = $this->msg_model->retrieve(get_sess_data('login', 'id'), $active_msg_id, false, false);
                if (empty($msg)) {
                    echo '';
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

                    # format tanggal, jika hari ini
                    if (date('Y-m-d') == date('Y-m-d', strtotime($retrieve['date']))) {
                        $retrieve['date'] = date('H:i', strtotime($retrieve['date']));
                    }
                    # kemarin
                    elseif (date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
                        $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' kemarin';
                    }
                    # lusa
                    elseif (date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
                        $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' lusa';
                    }
                    else {
                        $retrieve['date'] = tgl_jam_indo($retrieve['date']);
                    }

                    ?>
                    <tr id="msg-<?php echo $val['id'] ?>">
                        <td class="user flag-new">
                            <img class="img-user img-polaroid img-circle pull-left" src="<?php echo $user['link_image']; ?>">
                            <a href="{{ n.profil.link_profil }}"><?php echo character_limiter($user['nama'], 23, '...') ?></a>
                            <br><small><?php echo $retrieve['date']; ?></small>
                        </td>
                        <td class="msg-content">
                            <a class="pull-right" style="margin-left:10px;" href="<?php echo site_url('message/del/' . $retrieve['id'] . '/' . $msg['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="icon-trash"></i></a>
                            <?php echo html_entity_decode($retrieve['content']); ?>
                        </td>
                    </tr>
                    <?php
                }
            break;
        }
    }

}
