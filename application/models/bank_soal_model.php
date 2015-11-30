<?php

/**
 * Resource model untuk bank_soal
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 * @author  Almazari <almazary@gmail.com>
 * @since   1.6
 */
class Bank_soal_model extends CI_Model
{
    private $table = 'bank_soal';

    function __construct()
    {
        parent::__construct();

        # buat tabelnya jika belum ada
        if (!$this->db->table_exists($this->table)) {
            $this->create_table();
        }
    }

    /**
     * Method untuk mendapatkan satu record bank soal
     *
     * @param  integer $id
     * @return array
     */
    public function retrieve($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get($this->table);
        return $result->row_array();
    }

    /**
     * Method untuk mengambil semua record bank soal
     * @return array
     */
    function retrieve_all(
        $no_of_records = 20,
        $page_no       = 1,
        $pengajar_id   = array(),
        $keyword       = null
    ){
        $where = array();
        $orderby['id'] = 'DESC';

        if (!empty($pengajar_id)) {
            $where['pengajar_id'] = array($pengajar_id, 'where_in');
        }

        if (!empty($keyword)) {
            $keyword = (string)$keyword;
            $where['pertanyaan'] = array($keyword, 'like');
            $where['pilihan_a']  = array($keyword, 'or_like');
            $where['pilihan_b']  = array($keyword, 'or_like');
            $where['pilihan_c']  = array($keyword, 'or_like');
            $where['pilihan_d']  = array($keyword, 'or_like');
            $where['pilihan_e']  = array($keyword, 'or_like');
        }

        $data = $this->pager->set($this->table, $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk menghapus record bank_soal
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
     * Method untuk update bank soal
     *
     * @param  integer $id
     * @param  integer $pengajar_id
     * @param  string  $pertanyaan
     * @param  string  $pilihan_a
     * @param  string  $pilihan_b
     * @param  string  $pilihan_c
     * @param  string  $pilihan_d
     * @param  string  $pilihan_e
     * @return boolean
     */
    public function update(
        $id,
        $pengajar_id,
        $pertanyaan,
        $pilihan_a = null,
        $pilihan_b = null,
        $pilihan_c = null,
        $pilihan_d = null,
        $pilihan_e = null
    ) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array(
            'pengajar_id' => $pengajar_id,
            'pertanyaan' => $pertanyaan,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'pilihan_e' => $pilihan_e
        ));
        return true;
    }

    /**
     * Method untuk create bank soal
     *
     * @param  integer $pengajar_id
     * @param  string  $pertanyaan
     * @param  string  $pilihan_a
     * @param  string  $pilihan_b
     * @param  string  $pilihan_c
     * @param  string  $pilihan_d
     * @param  string  $pilihan_e
     * @return integer last insert id
     */
    public function create(
        $pengajar_id,
        $pertanyaan,
        $pilihan_a = null,
        $pilihan_b = null,
        $pilihan_c = null,
        $pilihan_d = null,
        $pilihan_e = null
    ) {
        $this->db->insert($this->table, array(
            'pengajar_id' => $pengajar_id,
            'pertanyaan' => $pertanyaan,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'pilihan_e' => $pilihan_e
        ));
        return $this->db->insert_id();
    }

    /**
     * Method untuk create table
     * @return boolean
     */
    public function create_table()
    {
        # cek sudah ada belum
        if (!$this->db->table_exists($this->table)) {
            include APPPATH . 'config/database.php';
            $prefix = $db['default']['dbprefix'];

            $this->db->query("CREATE TABLE IF NOT EXISTS `{$prefix}bank_soal` (
              `id` int(11) NOT NULL,
              `pengajar_id` int(11) NOT NULL,
              `pertanyaan` text NOT NULL,
              `pilihan_a` text,
              `pilihan_b` text,
              `pilihan_c` text,
              `pilihan_d` text,
              `pilihan_e` text
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

            $this->db->query("ALTER TABLE `{$prefix}bank_soal`
            ADD PRIMARY KEY (`id`),
            ADD KEY `fk_bank_soal_pengajar1_idx` (`pengajar_id`);");

            $this->db->query("ALTER TABLE `{$prefix}bank_soal`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

            $this->db->query("ALTER TABLE `{$prefix}bank_soal`
            ADD CONSTRAINT `fk_bank_soal_pengajar1` FOREIGN KEY (`pengajar_id`) REFERENCES `{$prefix}pengajar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
        }

        return true;
    }
}