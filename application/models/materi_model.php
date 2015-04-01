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
     * @param  integer|null  $pengajar_id
     * @param  integer|null  $siswa_id
     * @param  integer|null  $mapel_id
     * @param  string|null   $judul
     * @param  string|null   $konten
     * @param  string|null   $tgl_posting      2014-07-16
     * @param  integer|null  $publish          0 | 1
     * @param  array         $kelas_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10,
        $page_no       = 1,
        $pengajar_id   = null,
        $siswa_id      = null,
        $mapel_id      = null,
        $judul         = null,
        $konten        = null,
        $tgl_posting   = null,
        $publish       = null,
        $kelas_id      = array()
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($pengajar_id)) {
            $pengajar_id = (int)$pengajar_id;
            $where['pengajar_id'] = array($pengajar_id, 'where');
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $where['siswa_id'] = array($siswa_id, 'where');
        }
        if (!is_null($mapel_id)) {
            $mapel_id = (int)$mapel_id;
            $where['mapel_id'] = array($mapel_id, 'where');
        }
        $like = 0;
        if (!is_null($judul)) {
            $where['judul'] = array($judul, 'like');
            $like = 1;
        }
        if (!is_null($konten)) {
            if ($like) {
                $value = array($like, 'or_like');
            } else {
                $value = array($like, 'like');
            }
            $where['konten'] = $value;
        }
        if (!is_null($tgl_posting)) {
            $where['DATE(tgl_posting)'] = array($tgl_posting, 'where');
        }
        if (!is_null($publish)) {
            $publish = (int)$publish;
            $where['publish'] = array($publish, 'where');
        }
        if (!empty($kelas_id)) {
            $where['materi_kelas']          = array('materi.id = materi_kelas.materi_id', 'join', 'inner');
            $where['materi_kelas.kelas_id'] = array($kelas_id, 'where_in');
        }

        $orderby = array(
            'id' => 'DESC'
        );

        $data = $this->pager->set('materi', $no_of_records, $page_no, $where, $orderby);

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
