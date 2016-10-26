<?php

/**
 * Class Model untuk resource pengumuman, versi 1.2
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 * @author  Almazari <almazary@gmail.com>
 */
class Pengumuman_model extends CI_Model
{
    private $table = 'pengumuman';

    function __construct()
    {
        if (!$this->db->table_exists($this->table)) {
            $this->create_table();
        }
    }

    /**
     * Method untuk mendapatkan banyak data
     *
     * @param  integer $no_of_records
     * @param  integer $page_no
     * @param  array   $array_where
     * @param  boolean $pagination
     * @return array
     */
    public function retrieve_all(
        $no_of_records = 10,
        $page_no       = 1,
        $array_where   = array(),
        $pagination    = true
    ) {
        $where = array();

        $exist_like = 0;
        foreach ($array_where as $key => $val) {
            if (in_array($key, array('judul', 'konten'))) {
                $exist_like = 1;

                if (!$exist_like) {
                    $where[$key] = array($val, 'like');
                } else {
                    $where[$key] = array($val, 'or_like');
                }
            } else {
                $where[$key] = array($val, 'where');
            }
        }

        $orderby = array('id' => 'DESC');
        if (!$pagination) {
            $no_of_records = $this->db->count_all($this->table);
        }

        $data = $this->pager->set($this->table, $no_of_records, $page_no, $where, $orderby);

        if ($pagination) {
            return $data;
        } else {
            return $data['results'];
        }
    }

    /**
     * Method untuk mendapatkan satu record pengumuman
     *
     * @param  array  $array_where
     * @return array
     */
    public function retrieve($array_where = array())
    {
        foreach ($array_where as $key => $val) {
            $this->db->where($key, $val);
        }
        $result = $this->db->get($this->table);
        return $result->row_array();
    }

    /**
     * Method untuk menghapus pengumuman
     *
     * @param  integer $id
     * @return boolean
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return true;
    }

    /**
     * Method untuk update pengumuman
     *
     * @param  integer $id
     * @param  string  $judul
     * @param  string  $konten
     * @param  date    $tgl_tampil
     * @param  date    $tgl_tutup
     * @param  integer $tampil_siswa
     * @param  integer $tampil_pengajar
     * @param  integer $pengajar_id
     * @return boolean
     */
    public function update(
        $id,
        $judul           = '',
        $konten          = '',
        $tgl_tampil      = '',
        $tgl_tutup       = '',
        $tampil_siswa    = '',
        $tampil_pengajar = '',
        $pengajar_id
    ) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array(
            'judul'           => $judul,
            'konten'          => $konten,
            'tgl_tampil'      => $tgl_tampil,
            'tgl_tutup'       => $tgl_tutup,
            'tampil_siswa'    => $tampil_siswa,
            'tampil_pengajar' => $tampil_pengajar,
            'pengajar_id'     => $pengajar_id
        ));

        return true;
    }

    /**
     * Method untuk nambah pengumuman
     *
     * @param  string  $judul
     * @param  string  $konten
     * @param  date    $tgl_tampil
     * @param  date    $tgl_tutup
     * @param  integer $tampil_siswa
     * @param  integer $tampil_pengajar
     * @param  integer $pengajar_id
     * @return integer last insert id
     */
    public function create($judul = '', $konten = '', $tgl_tampil = '', $tgl_tutup = '', $tampil_siswa = '', $tampil_pengajar = '', $pengajar_id)
    {
        $this->db->insert($this->table, array(
            'judul'           => $judul,
            'konten'          => $konten,
            'tgl_tampil'      => $tgl_tampil,
            'tgl_tutup'       => $tgl_tutup,
            'tampil_siswa'    => $tampil_siswa,
            'tampil_pengajar' => $tampil_pengajar,
            'pengajar_id'     => $pengajar_id
        ));

        return $this->db->insert_id();
    }

    /**
     * Method untuk membuat tabel pengumuman
     */
    public function create_table()
    {
        $CI =& get_instance();
        $CI->load->model('config_model');

        $CI->config_model->create_tb_pengumuman();

        return true;
    }
}
