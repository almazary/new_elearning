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
     * Method untuk mendapatkan informasi site config
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve()
    {
        $result = $this->db->get('site_config', 1);
        return $result->row_array();
    }

    /**
     * Method untuk menambah atau memperbaharui informasi site config
     * 
     * @param  string|null $site_name  
     * @param  string|null $address    
     * @param  string|null $telp       
     * @param  string|null $date_format
     * @return boolan      true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function create_update(
        $site_name   = null,
        $address     = null,
        $telp        = null,
        $date_format = null
    ) {
        $count = $this->db->count_all('site_config');

        $data = array(
            'site_name' => $site_name,
            'address' => $address,
            'telp' => $telp,
            'date_format' => (is_null($date_format)) ? 'F j, Y' : $date_format 
        );

        //insert
        if (empty($count)) {
            $this->db->insert('site_config', $data);
        } else {
            $this->db->update('site_config', $data);
        }
        return true;
    }

}