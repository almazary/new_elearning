<?php

/**
 * Class Model untuk resource kelas
 * 
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Pengajar_model extends CI_Model
{

    /**
     * Method untuk menghapus record mapel ajar berhasarkan idnya
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_ma($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('mapel_ajar');
        return true;
    }

    /**
     * Method untuk mendapatkan semua data mapel ajar
     * 
     * @param  integer          $no_of_records  
     * @param  integer          $page_no        
     * @param  null|integer     $pengajar_id    
     * @param  null|integer     $mapel_kelas_id 
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_ma(
        $no_of_records  = 10, 
        $page_no        = 1,
        $pengajar_id    = null,
        $mapel_kelas_id = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($pengajar_id)) {
            $where['pengajar_id'] = array($pengajar_id, 'where');
        }
        if (!is_null($mapel_kelas_id)) {
            $where['mapel_kelas_id'] = array($mapel_kelas_id, 'where');
        }

        $data = $this->pager->set('mapel_ajar', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk ambil satu record mapel ajar berdasarkan id|pengajar_id|mapel_kelas_id
     * 
     * @param  integer|null $id            
     * @param  integer|null $pengajar_id   
     * @param  integer|null $mapel_kelas_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_ma($id = null, $pengajar_id = null, $mapel_kelas_id = null)
    {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        }

        if (!is_null($pengajar_id)) {
            $pengajar_id = (int)$pengajar_id;
            $this->db->where('pengajar_id', $id);
        }

        if (!is_null($mapel_kelas_id)) {
            $mapel_kelas_id = (int)$mapel_kelas_id;
            $this->db->where('mapel_kelas_id', $mapel_kelas_id);
        }

        $result = $this->db->get('mapel_ajar', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui record mapel ajar
     *
     * @param  integer $id
     * @param  integer $hari_id       
     * @param  string  $jam_mulai     
     * @param  string  $jam_selesai   
     * @param  integer $pengajar_id   
     * @param  integer $mapel_kelas_id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_ma(
        $id,
        $hari_id,
        $jam_mulai,
        $jam_selesai,
        $pengajar_id,
        $mapel_kelas_id
    ) {
        $id             = (int)$id;
        $hari_id        = (int)$hari_id;
        $pengajar_id    = (int)$pengajar_id;
        $mapel_kelas_id = (int)$mapel_kelas_id;

        $data = array(
            'hari_id'        => $hari_id,
            'jam_mulai'      => $jam_mulai,
            'jam_selesai'    => $jam_selesai,
            'pengajar_id'    => $pengajar_id,
            'mapel_kelas_id' => $mapel_kelas_id
        );
        $this->db->where('id', $id);
        $this->db->update('mapel_ajar', $data);
        return true;
    }

    /**
     * Method untuk menambah record mapel ajar
     * 
     * @param  integer $hari_id       
     * @param  string  $jam_mulai     
     * @param  string  $jam_selesai   
     * @param  integer $pengajar_id   
     * @param  integer $mapel_kelas_id
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_ma(
        $hari_id,
        $jam_mulai,
        $jam_selesai,
        $pengajar_id,
        $mapel_kelas_id
    ) {
        $hari_id        = (int)$hari_id;
        $pengajar_id    = (int)$pengajar_id;
        $mapel_kelas_id = (int)$mapel_kelas_id;

        $data = array(
            'hari_id'        => $hari_id,
            'jam_mulai'      => $jam_mulai,
            'jam_selesai'    => $jam_selesai,
            'pengajar_id'    => $pengajar_id,
            'mapel_kelas_id' => $mapel_kelas_id
        );
        $this->db->insert('mapel_ajar', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus record pengajar
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('pengajar');
        return true;
    }

    /**
     * Method untuk mendapatkan semua data pengajar
     * 
     * @param  integer          $no_of_records
     * @param  integer          $page_no
     * @param  null|integer     $status_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10, 
        $page_no       = 1,
        $status_id     = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($status_id)) {
            $where['status_id'] = array($status_id, 'where');
        }

        $data = $this->pager->set('pengajar', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu record pengajar berdasarkan id atau nip
     * 
     * @param  null|integer $id 
     * @param  null|integer $nip
     * @param  null|integer $status_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id = null, $nip = null, $status_id = null)
    {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        } else {
            $nip = (int)$nip;
            $this->db->where('nip', $nip);
        }

        if (!is_null($status_id)) {
            $status_id = (int)$status_id;
            $this->db->where('status_id', $status_id);
        }

        $result = $this->db->get('pengajar', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui record data pengajar
     *
     * @param  integer      $id
     * @param  null|string  $nip       
     * @param  string       $nama      
     * @param  string       $alamat    
     * @param  null|string  $foto      
     * @param  integer      $status_id 
     * @return boolean      true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update(
        $id,
        $nip       = null,
        $nama,
        $alamat,
        $foto      = null,
        $status_id = 0
    ) {
        $id        = (int)$id;
        $status_id = (int)$status_id;

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'alamat' => $alamat,
            'foto' => $foto,
            'status_id' => $status_id
        );
        $this->db->where('id', $id);
        $this->db->update('pengajar', $data);
        return true;
    }
    /**
     * Method untuk menambah data pengajar
     * 
     * @param  null|string  $nip       
     * @param  string       $nama      
     * @param  string       $alamat    
     * @param  null|string  $foto      
     * @param  integer      $status_id 
     * @return integer      last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create(
        $nip       = null,
        $nama,
        $alamat,
        $foto      = null,
        $status_id = 0
    ) {
        $status_id = (int)$status_id;

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'alamat' => $alamat,
            'foto' => $foto,
            'status_id' => $status_id
        );
        $this->db->insert('pengajar', $data);
        return $this->db->insert_id();
    }
}