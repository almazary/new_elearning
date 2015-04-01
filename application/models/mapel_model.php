<?php

/**
 * Class Model untuk resource mapel
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Mapel_model extends CI_Model
{
    /**
     * Method untuk menghapus record mapel kelas
     *
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_kelas($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('mapel_kelas');
        return true;
    }

    /**
     * Method untuk mendapatkan semua data mapel kelas
     *
     * @param  integer $no_of_records
     * @param  integer $page_no
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_kelas(
        $mapel_id      = null,
        $kelas_id      = null
    ) {
        if (!is_null($mapel_id)) {
            $mapel_id = (int)$mapel_id;
            $this->db->where('mapel_id', $mapel_id);
        }
        if (!is_null($kelas_id)) {
            $kelas_id = (int)$kelas_id;
            $this->db->where('kelas_id', $kelas_id);
        }

        $result = $this->db->get('mapel_kelas');
        return $result->result_array();
    }

    /**
     * Method untuk mendapatkan satu record mapel kelas
     *
     * @param  null|integer $id
     * @param  null|integer $kelas_id
     * @param  null|integer $mapel_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_kelas($id = null, $kelas_id = null, $mapel_id = null)
    {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        }
        if (!is_null($kelas_id)) {
            $kelas_id = (int)$kelas_id;
            $this->db->where('kelas_id', $kelas_id);
        }
        if (!is_null($mapel_id)) {
            $mapel_id = (int)$mapel_id;
            $this->db->where('mapel_id', $mapel_id);
        }

        $result = $this->db->get('mapel_kelas', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui record mapel kelas
     *
     * @param  integer $id
     * @param  integer $kelas_id
     * @param  integer $mapel_id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_kelas($id, $kelas_id, $mapel_id)
    {
        $id = (int)$id;
        $kelas_id = (int)$kelas_id;
        $mapel_id = (int)$mapel_id;

        $data = array(
            'kelas_id' => $kelas_id,
            'mapel_id' => $mapel_id
        );
        $this->db->where('id', $id);
        $this->db->update('mapel_kelas', $data);
        return true;
    }

    /**
     * Method untuk menambah data mapel kelas
     *
     * @param  integer $kelas_id
     * @param  integer $mapel_id
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_kelas($kelas_id, $mapel_id)
    {
        $kelas_id = (int)$kelas_id;
        $mapel_id = (int)$mapel_id;

        $data = array(
            'kelas_id' => $kelas_id,
            'mapel_id' => $mapel_id
        );
        $this->db->insert('mapel_kelas', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk mengambi semua data mapel
     *
     * @param  integer      $no_of_records
     * @param  integer      $page_no
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10,
        $page_no       = 1
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();

        $data = $this->pager->set('mapel', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk mendapatkan semua data mapel tanpa pagging
     *
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_mapel()
    {
        $this->db->order_by('id', 'ASC');
        $result = $this->db->get('mapel');
        return $result->result_array();
    }

    /**
     * Method untuk menghapus record mapel
     *
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('mapel');
        return true;
    }

    /**
     * Method untuk memperbaharui record mapel
     *
     * @param  integer      $id
     * @param  string       $nama
     * @param  null|string  $info
     * @return boolean      true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update($id, $nama, $info = null, $aktif = 1)
    {
        $id = (int)$id;
        $aktif = (int)$aktif;

        $data = array(
            'nama' => $nama,
            'info' => $info,
            'aktif' => $aktif
        );
        $this->db->where('id', $id);
        $this->db->update('mapel', $data);
        return true;
    }

    /**
     * Method untuk mengambil satu record mapel
     *
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('mapel', 1);
        return $result->row_array();
    }

    /**
     * Method untuk membuat data mapel
     *
     * @param  string       $nama
     * @param  null|string  $info
     * @return integer      last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create($nama, $info = null)
    {
        $data = array(
            'nama' => $nama,
            'info' => $info
        );
        $this->db->insert('mapel', $data);
        return $this->db->insert_id();
    }
}
