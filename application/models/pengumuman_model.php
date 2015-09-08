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
        include APPPATH . 'config/database.php';
        $prefix = $db['default']['dbprefix'];

        $this->db->query("CREATE TABLE IF NOT EXISTS `{$prefix}pengumuman` (
          `id` int(11) NOT NULL,
          `judul` varchar(255) NOT NULL,
          `konten` text NOT NULL,
          `tgl_tampil` date NOT NULL,
          `tgl_tutup` date NOT NULL,
          `tampil_siswa` tinyint(1) NOT NULL DEFAULT '1',
          `tampil_pengajar` tinyint(1) NOT NULL DEFAULT '1',
          `pengajar_id` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $this->db->query("ALTER TABLE `{$prefix}pengumuman`
        ADD PRIMARY KEY (`id`), ADD KEY `fk_pengumuman_pengajar1_idx` (`pengajar_id`);");

        $this->db->query("ALTER TABLE `{$prefix}pengumuman`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `{$prefix}pengumuman`
        ADD CONSTRAINT `fk_pengumuman_pengajar1` FOREIGN KEY (`pengajar_id`) REFERENCES `{$prefix}pengajar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
    }
}
