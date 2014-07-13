<?php

/**
 * Class Model untuk resource kelas
 * 
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Kelas_model extends CI_Model
{
    /**
     * Method untuk mengambi semua data kelas 
     * 
     * @param  integer      $no_of_records 
     * @param  integer      $page_no       
     * @param  null|integer $parent_id     
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10, 
        $page_no       = 1,
        $parent_id     = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($parent_id)) {
            $where['parent_id'] = array($parent_id, 'where');
        }

        $data = $this->pager->set('kelas', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk mengambil satu record data kelas
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('kelas', '1');
        return $result->row_array();
    }

    /**
     * Method untuk menambah data kelas
     * 
     * @param  string       $nama
     * @param  integer|null $parent_id
     * @return integer      last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create(
        $nama,
        $parent_id = null
    ) {
        $retrieve_all = $this->retrieve_all();

        if (!is_null($parent_id)) {
            $parent_id = (int)$parent_id;
        }

        $data = array(
            'nama'      => $nama,
            'parent_id' => $parent_id,
            'urutan'    => ($retrieve_all['total_record'] + 1)
        );
        $this->db->insert('kelas', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk memperbaharui record kelas
     * 
     * @param  integer      $id
     * @param  nama         $nama
     * @param  integer|null $parent_id
     * @param  integer      $urutan
     * @return boolean      true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update(
        $id,
        $nama,
        $parent_id = null,
        $urutan
    ) {
        $id     = (int)$id;
        $urutan = (int)$urutan;

        if (!is_null($parent_id)) {
            $parent_id = (int)$parent_id;
        }

        $data = array(
            'nama'      => $nama,
            'parent_id' => $parent_id,
            'urutan'    => $urutan
        );
        $this->db->where('id', $id);
        $this->db->update('kelas', $data);
        return true;
    }

    /**
     * Method untuk menghapus record kelas
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('kelas');
        return true;
    }

    /**
     * Method untuk menambah data kelas siswa
     * 
     * @param  integer  $kelas_id
     * @param  integer  $siswa_id
     * @param  integer  $aktif   
     * @return integer  last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_siswa(
        $kelas_id,
        $siswa_id,
        $aktif = 0
    ) {
        $kelas_id = (int)$kelas_id;
        $siswa_id = (int)$siswa_id;
        $aktif    = (int)$aktif;

        $data = array(
            'kelas_id' => $kelas_id,
            'siswa_id' => $siswa_id,
            'aktif'    => $aktif
        );

        $this->db->insert('kelas_siswa', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk memperbaharui kelas siswa
     * 
     * @param  integer $id      
     * @param  integer $kelas_id
     * @param  integer $siswa_id
     * @param  integer $aktif   
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_siswa(
        $id,
        $kelas_id,
        $siswa_id,
        $aktif
    ) {
        $id       = (int)$id;
        $kelas_id = (int)$kelas_id;
        $siswa_id = (int)$siswa_id;
        $aktif    = (int)$aktif;

        $data = array(
            'kelas_id' => $kelas_id,
            'siswa_id' => $siswa_id,
            'aktif'    => $aktif
        );
        $this->db->where('id', $id);
        $this->db->update('kelas_siswa', $data);
        return true;
    }

    /**
     * Method untuk mengambil satu data kelas siswa berdasarkan id atau konsisi tertentu
     * 
     * @param  null|integer $id          
     * @param  null|array   $array_where contoh :
     * <code>
     * $array_where = array(
     *     'kelas_id' => 1,
     *     'aktif' => 0
     * );
     * </code>
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_siswa($id = null, $array_where = null)
    {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        } elseif (is_array($array_where)) {
            foreach ($array_where as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        $result = $this->db->get('kelas_siswa', '1');
        return $result->row_array();
    }

    /**
     * Method untuk mengambil semua data kelas siswa
     * 
     * @param  integer      $no_of_records
     * @param  integer      $page_no
     * @param  null|array   $array_where
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_siswa(
        $no_of_records = 10, 
        $page_no       = 1,
        $array_where   = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($array_where) AND is_array($array_where)) {
            foreach ($array_where as $key => $value) {
                $where[$key] = array($value, 'where');
            }
        }

        $data = $this->pager->set('kelas_siswa', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk menghapus kelas siswa
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_siswa($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('kelas_siswa');
        return true;
    }
}