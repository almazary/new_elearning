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
     * Method untuk mendapatkan semua gambar slider
     *
     * @return array
     */
    public function get_all_slider_img()
    {
        $this->db->where('id', 'img-slide-1');
        $this->db->or_where('id', 'img-slide-2');
        $this->db->or_where('id', 'img-slide-3');
        $this->db->or_where('id', 'img-slide-4');
        $this->db->order_by('id');
        $results = $this->db->get('pengaturan');

        $data = array();
        foreach ($results->result_array() as $val) {
            if (empty($val['value'])) {
                continue;
            }

            # cari title nya sekalian
            $title_id = substr($val['id'], -1);

            $retrieve     = $this->retrieve('info-slide-' . $title_id);
            $val['title'] = empty($retrieve['value']) ? '' : $retrieve['value'];
            $data[]       = $val;
        }

        return $data;
    }

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
