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

}