<?php

/**
 * Class Model untuk resource Materi
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Materi_model extends CI_Model
{
    /**
     * Method untuk menghitung data tertentu
     * @param  string $by
     */
    public function count($by)
    {
        switch ($by) {
            case 'unread-laporan':
                $field_id       = 'laporkan-komentar';
                $retrieve_field = retrieve_field($field_id);
                if (isset($retrieve_field['value'])) {
                    $field_value = json_decode($retrieve_field['value'], 1);
                } else {
                    $field_value = array();
                }

                $unread = 0;
                foreach ($field_value as $val) {
                    if (empty($val['view_admin'])) {
                        $unread++;
                    }
                }

                return $unread;
            break;
        }
    }

    /**
     * Method untuk menambah views materi
     *
     * @param  integer $materi_id
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function plus_views($materi_id)
    {
        $retrieve = $this->retrieve($materi_id);
        if (!empty($retrieve)) {
            $this->db->update('materi', array('views' => $retrieve['views'] + 1), array('id' => $retrieve['id']));
        }

        return true;
    }

    /**
     * Method untuk menghapus kelas materi
     *
     * @param  integer $id
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_kelas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('materi_kelas');
        return true;
    }

    /**
     * Method untuk mendapatkan satu record kelas materi
     *
     * @param  integer|null $id
     * @param  integer|null $materi_id
     * @param  integer|null $kelas_id
     * @return array
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_kelas(
        $id        = null,
        $materi_id = null,
        $kelas_id  = null
    ) {
        if ($id == null && $materi_id == null && $kelas_id == null) {
            return array();
        }

        if (!is_null($id)) {
            $this->db->where('id', $id);
        }
        if (!is_null($materi_id)) {
            $this->db->where('materi_id', $materi_id);
        }
        if (!is_null($kelas_id)) {
            $this->db->where('kelas_id', $kelas_id);
        }
        $result = $this->db->get('materi_kelas', 1);
        return $result->row_array();
    }

    /**
     * Method untuk mendapatkan semua kelas materi
     *
     * @param  integer $materi_id
     * @return array
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_kelas($materi_id)
    {
        $this->db->where('materi_id', $materi_id);
        $result = $this->db->get('materi_kelas');
        return $result->result_array();
    }

    /**
     * Method untuk menambah materi kelas
     *
     * @param  integer $materi_id
     * @param  integer $kelas_id
     * @return integer
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function create_kelas(
        $materi_id,
        $kelas_id
    ) {
        $materi_id = (int)$materi_id;
        $kelas_id  = (int)$kelas_id;

        $this->db->insert('materi_kelas', array(
            'materi_id' => $materi_id,
            'kelas_id'  => $kelas_id
        ));
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus data materi
     *
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('materi');
        return true;
    }

    /**
     * Method untuk mendapatkan banyak data materi
     *
     * @param  integer       $no_of_records
     * @param  integer       $page_no
     * @param  array|null    $pengajar_id
     * @param  array|null    $siswa_id
     * @param  array|null    $mapel_id
     * @param  string|null   $judul
     * @param  string|null   $konten
     * @param  string|null   $tgl_posting      2014-07-16
     * @param  integer|null  $publish          0 | 1
     * @param  array         $kelas_id
     * @param  array         $type
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10,
        $page_no       = 1,
        $pengajar_id   = array(),
        $siswa_id      = array(),
        $mapel_id      = array(),
        $judul         = null,
        $konten        = null,
        $tgl_posting   = null,
        $publish       = null,
        $kelas_id      = array(),
        $type          = array(),
        $pagination    = true
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where    = array();
        $group_by = array();
        if (!empty($pengajar_id)) {
            $where['materi.pengajar_id'] = array($pengajar_id, 'where_in');
        }
        if (!empty($siswa_id)) {
            if (!empty($pengajar_id)) {
                $operation = 'or_where_in';
            } else {
                $operation = 'where_in';
            }
            $where['materi.siswa_id'] = array($siswa_id, $operation);
        }
        if (!empty($mapel_id)) {
            $where['materi.mapel_id'] = array($mapel_id, 'where_in');
        }
        $like = 0;
        if (!empty($judul)) {
            $where['materi.judul'] = array($judul, 'like');
            $like = 1;
        }
        if (!empty($konten)) {
            if ($like) {
                $value = array($like, 'or_like');
            } else {
                $value = array($like, 'like');
            }
            $where['materi.konten'] = array($like, 'like');
        }
        if (!empty($tgl_posting)) {
            $where['DATE(tgl_posting)'] = array($tgl_posting, 'where');
        }
        if (!empty($publish)) {
            $where['materi.publish'] = array($publish, 'where_in');
        }
        if (!empty($kelas_id)) {
            $where['materi_kelas']          = array('materi.id = materi_kelas.materi_id', 'join', 'inner');
            $where['materi_kelas.kelas_id'] = array($kelas_id, 'where_in');
            $group_by[] = 'materi.id';
        }
        if (!empty($type)) {
            if (count($type) == 1) {
                if ($type[0] == 'tertulis') {
                    $where['materi.konten !='] = array("", 'where');
                } elseif ($type[0] == 'file') {
                    $where['materi.file !='] = array("", 'where');
                }
            }
        }

        # cari yang mapelnya berstatus aktif yang ditampilkan
        $where['mapel'] = array('materi.mapel_id = mapel.id', 'join', 'inner');
        $where['mapel.aktif'] = array(1, 'where');

        $orderby = array(
            'materi.id' => 'DESC'
        );

        if ($pagination) {
            $data = $this->pager->set('materi', $no_of_records, $page_no, $where, $orderby, 'materi.*', $group_by);
        } else {
            # cari jumlah semua pengajar
            $no_of_records = $this->db->count_all('materi');
            $search_all    = $this->pager->set('materi', $no_of_records, $page_no, $where, $orderby, 'materi.*', $group_by);
            $data          = $search_all['results'];
        }

        return $data;
    }

    /**
     * Method untuk mengambil satu data materi
     *
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('materi', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui data materi
     *
     * @param  integer  $id
     * @param  integer  $pengajar_id
     * @param  integer  $siswa_id
     * @param  integer  $mapel_id
     * @param  string   $judul
     * @param  string   $konten
     * @param  string   $file
     * @param  integer  $publish
     * @return boolean  true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update(
        $id,
        $pengajar_id = null,
        $siswa_id    = null,
        $mapel_id,
        $judul,
        $konten  = null,
        $file    = null,
        $publish = 1
    ) {
        $id             = (int)$id;
        $mapel_id = (int)$mapel_id;
        $publish        = (int)$publish;

        $data = array(
            'pengajar_id' => $pengajar_id,
            'siswa_id'    => $siswa_id,
            'mapel_id'    => $mapel_id,
            'judul'       => $judul,
            'konten'      => $konten,
            'file'        => $file,
            'tgl_posting' => date('Y-m-d H:i:s'),
            'publish'     => $publish
        );
        $this->db->where('id', $id);
        $this->db->update('materi', $data);
        return true;
    }

    /**
     * Method untuk menambah data materi
     *
     * @param  integer  $pengajar_id
     * @param  integer  $siswa_id
     * @param  integer  $mapel_id
     * @param  string   $judul
     * @param  string   $konten
     * @param  string   $file
     * @param  integer  $publish
     * @return integer  last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create(
        $pengajar_id = null,
        $siswa_id    = null,
        $mapel_id,
        $judul,
        $konten  = null,
        $file    = null,
        $publish = 1
    ) {
        $mapel_id = (int)$mapel_id;
        $publish        = (int)$publish;

        $data = array(
            'pengajar_id' => $pengajar_id,
            'siswa_id'    => $siswa_id,
            'mapel_id'    => $mapel_id,
            'judul'       => $judul,
            'konten'      => $konten,
            'file'        => $file,
            'tgl_posting' => date('Y-m-d H:i:s'),
            'publish'     => $publish
        );
        $this->db->insert('materi', $data);
        return $this->db->insert_id();
    }

}
