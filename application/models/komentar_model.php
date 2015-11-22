<?php

/**
 * Class Model untuk resource komentar materi
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 * @since   1.5
 * @author  Almazari
 */
class Komentar_model extends CI_Model
{
    private $table = 'komentar';

    function __construct()
    {
        if (!$this->db->table_exists($this->table)) {
            $this->create_table();
        }
    }

    /**
     * Method untuk mendapatkan jumlah komentar
     *
     * @param  string  $entitas
     * @param  integer $entitas_id
     * @return integer
     */
    public function count_by($entitas, $entitas_id)
    {
        $this->db->where('tampil', 1);
        switch ($entitas) {
            case 'materi':
                $this->db->where('materi_id', $entitas_id);
            break;
        }
        $result = $this->db->get($this->table);
        return $result->num_rows();
    }

    /**
     * Method untuk menghapus komentar berdasarkan materi_id
     *
     * @param  integer $materi_id
     * @return boolean
     */
    public function delete_by_materi($materi_id)
    {
        $this->db->where('materi_id', $materi_id);
        $this->db->delete($this->table);
        return true;
    }

    /**
     * Method untuk menghapus komentar
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
     * Method untuk mengambil banyak data komentar
     *
     * @param  string        $no_of_records   all/integer (dengan pagination)
     * @param  integer       $page_no
     * @param  integer|null  $login_id
     * @param  integer|null  $materi_id
     * @param  integer|null  $tampil
     * @return array
     */
    public function retrieve_all(
        $no_of_records = "10",
        $page_no       = 1,
        $login_id      = null,
        $materi_id     = null,
        $tampil        = null
    ) {
        $show_record = $no_of_records;
        if ($no_of_records == "all") {
            $show_record = $this->db->count_all($this->table);
        }

        $where = array();
        if (!is_null($login_id)) {
            $where['login_id'] = array($login_id, 'where');
        }
        if (!is_null($materi_id)) {
            $where['materi_id'] = array($materi_id, 'where');
        }
        if (!is_null($tampil)) {
            $where['tampil'] = array($tampil, 'where');
        }

        $orderby = array('id' => 'DESC');
        $data = $this->pager->set($this->table, $show_record, $page_no, $where, $orderby);

        if ($no_of_records == "all") {
            return $data['results'];
        } else {
            return $data;
        }
    }

    /**
     * Method untuk mendapatkan satu data komentar
     *
     * @param  integer $id
     * @return array
     */
    public function retrieve($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->table, 1);
        return $result->row_array();
    }

    /**
     * Method untuk membuat komentar jadi tidak tampil
     *
     * @param  integer $id
     * @return boolean
     */
    public function hidden($id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('tampil' => 0));
        return true;
    }

    /**
     * Method untuk nambah komentar
     *
     * @param  integer  $login_id
     * @param  integer  $materi_id
     * @param  integer  $tampil
     * @param  string   $konten
     * @return integer  last insert id
     */
    public function create(
        $login_id,
        $materi_id,
        $tampil = 1,
        $konten = ''
    ) {
        $this->db->insert($this->table, array(
            'login_id'    => $login_id,
            'materi_id'   => $materi_id,
            'tampil'      => $tampil,
            'konten'      => $konten,
            'tgl_posting' => date('Y-m-d H:i:s')
        ));

        return $this->db->insert_id();
    }


    /**
     * Method untuk create table komentar
     * @return boolen true
     */
    public function create_table()
    {
        include APPPATH . 'config/database.php';
        $prefix = $db['default']['dbprefix'];

        $this->db->query("CREATE TABLE IF NOT EXISTS `{$prefix}komentar` (
          `id` int(11) NOT NULL,
          `login_id` int(11) NOT NULL,
          `materi_id` int(11) NOT NULL,
          `tampil` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=tidak,1=tampil',
          `konten` text,
          `tgl_posting` datetime DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $this->db->query("ALTER TABLE `{$prefix}komentar`
          ADD PRIMARY KEY (`id`),
          ADD KEY `fk_komentar_login1_idx` (`login_id`),
          ADD KEY `fk_komentar_materi1_idx` (`materi_id`);");

        $this->db->query("ALTER TABLE `{$prefix}komentar`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `{$prefix}komentar`
          ADD CONSTRAINT `fk_komentar_login1` FOREIGN KEY (`login_id`) REFERENCES `{$prefix}login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
          ADD CONSTRAINT `fk_komentar_materi1` FOREIGN KEY (`materi_id`) REFERENCES `{$prefix}materi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");

        return true;
    }
}