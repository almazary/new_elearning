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

    function post_data($page)
    {
        switch ($page) {
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
                $field_id    = 'mengerjakan-' . $tugas['id'] . '-' . get_sess_data('user', 'id');
                $field_name  = 'Mengerjakan Tugas';

                $check_field = retrieve_field($field_id);
                if (empty($check_field)) {
                    exit('Akses ditolak');
                }

                $session_mengerjakan = $this->session->userdata('mengerjakan_tugas');
                if (empty($session_mengerjakan)) {
                    exit('Akses ditolak');
                }

                # update index jawaban
                $field_value = json_decode($check_field['value'], 1);
                $field_value['jawaban'][$pertanyaan['id']] = $pilihan['id'];

                update_field($field_id, $field_name, json_encode($field_value));
            break;
        }
    }

}
