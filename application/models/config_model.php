<?php

/**
 * Class Model untuk Config
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Config_model extends CI_Model
{

    /**
     * Method untuk menghapus field tambahan
     *
     * @param  integer $id
     * @return boolean
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_field($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('field_tambahan');
    }

    /**
     * Method untuk mendapatkan informasi pengaturan
     *
     * @param  string $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('pengaturan', 1);
        return $result->row_array();
    }

    /**
     * Method untuk mendapatkan informasi field tambahan
     *
     * @param  string $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_field($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('field_tambahan', 1);
        return $result->row_array();
    }

    /**
     * Method untuk nambah pengaturan
     *
     * @param  string $id
     * @param  string $nama
     * @param  string $value
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function create($id, $nama = null, $value = null)
    {
        $this->db->insert('pengaturan', array(
            'id'    => $id,
            'nama'  => $nama,
            'value' => $value
        ));

        return true;
    }

    /**
     * Method untuk nambah field
     *
     * @param  string $id
     * @param  string $nama
     * @param  string $value
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function create_field($id, $nama = null, $value = null)
    {
        $this->db->insert('field_tambahan', array(
            'id'    => $id,
            'nama'  => $nama,
            '`value`' => $value
        ));

        return true;
    }

    /**
     * Method untuk update pengaturan
     *
     * @param  string $id
     * @param  string $nama
     * @param  string $value
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function update($id, $nama = null, $value = null)
    {
        $this->db->update('pengaturan', array('nama' => $nama, 'value' => $value), array('id' => $id));
        return true;
    }

    /**
     * Method untuk update field tambahan
     *
     * @param  string $id
     * @param  string $nama
     * @param  string $value
     * @return boolean
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function update_field($id, $nama = null, $value = null)
    {
        $this->db->update('field_tambahan', array('nama' => $nama, 'value' => $value), array('id' => $id));
        return true;
    }

}
