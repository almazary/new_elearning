<?php

/**
 * Class Model untuk resource siswa
 * 
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Siswa_model extends CI_Model
{

    /**
     * Method untuk menghapus data siswa berdasarkan id
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('siswa');
        return true;
    }

    /**
     * Method untuk mendapatkan semua data siswa
     * 
     * @param  integer      $no_of_records
     * @param  integer      $page_no      
     * @param  null|string  $jenis_kelamin
     * @param  null|integer $tahun_masuk  
     * @param  null|integer $status_id    
     * @return array
     * @author Almazari <almazary@gmail.com>                 
     */
    public function retrieve_all(
        $no_of_records = 10, 
        $page_no       = 1,
        $jenis_kelamin = null,
        $tahun_masuk   = null,
        $status_id     = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($jenis_kelamin)) {
            $where['jenis_kelamin'] = [$jenis_kelamin, 'where'];
        }
        if (!is_null($tahun_masuk)) {
            $tahun_masuk = (int)$tahun_masuk;
            $where['tahun_masuk'] = [$tahun_masuk, 'where'];
        }
        if (!is_null($status_id)) {
            $status_id = (int)$status_id;
            $where['status_id'] = [$status_id, 'where'];
        }

        $orderby = array('id' => 'DESC');
        $data = $this->pager->set('siswa', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan siswa berdasarkan kriteria tertentu
     * 
     * @param  string $nis          
     * @param  string $nama         
     * @param  array  $jenis_kelamin
     * @param  string $tahun_masuk  
     * @param  string $tempat_lahir 
     * @param  string $tgl_lahir    
     * @param  string $alamat       
     * @param  array  $agama        
     * @param  array  $kelas_id     
     * @param  array  $status_id    
     * @param  string $username     
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_filter(
        $nis           = '',
        $nama          = '',
        $jenis_kelamin = array(),
        $tahun_masuk   = '',
        $tempat_lahir  = '',
        $tgl_lahir     = '',
        $alamat        = '',
        $agama         = array(),
        $kelas_id      = array(),
        $status_id     = array(),
        $username      = ''
    ) {
        $this->db->select('siswa.*');

        if (!empty($nis)) {
            $nis = (int)$nis;
            $this->db->like('siswa.nis', $nis, 'after');
        }

        if (!empty($nama)) {
            $nama = (string)$nama;
            $this->db->like('siswa.nama', $nama);
        }

        if (!empty($jenis_kelamin) AND is_array($jenis_kelamin)) {
            $this->db->where_in('siswa.jenis_kelamin', $jenis_kelamin);
        }

        if (!empty($tahun_masuk)) {
            $tahun_masuk = (int)$tahun_masuk;
            $this->db->where('siswa.tahun_masuk', $tahun_masuk);
        }

        if (!empty($tempat_lahir)) {
            $tempat_lahir = (string)$tempat_lahir;
            $this->db->like('siswa.tempat_lahir', $tempat_lahir);
        }

        if (!empty($tgl_lahir)) {
            $tgl_lahir = (string)$tgl_lahir;
            $this->db->where('tgl_lahir', $tgl_lahir);
        }

        if (!empty($alamat)) {
            $alamat = (string)$alamat;
            $this->db->like('siswa.alamat', $alamat);
        }

        if (!empty($agama) AND is_array($agama)) {
            $this->db->where_in('siswa.agama', $agama);
        }

        if (!empty($kelas_id)) {
            $this->db->join('kelas_siswa', 'siswa.id = kelas_siswa.siswa_id', 'inner');
            $this->db->where('kelas_siswa.aktif', 1);
            $this->db->where_in('kelas_siswa.kelas_id', $kelas_id);
        }

        if (!empty($status_id) AND is_array($status_id)) {
            $this->db->where_in('siswa.status_id', $status_id);
        }

        if (!empty($username)) {
            $username = (string)$username;
            $this->db->join('login', 'siswa.id = login.siswa_id', 'inner');
            $this->db->like('login.username', $username);
        }

        $this->db->order_by('siswa.nama', 'ASC');
        $result = $this->db->get('siswa');
        return $result->result_array();
    }

    /**
     * Method untuk memperbaharui data siswa
     * 
     * @param  integer $id            
     * @param  string  $nis           
     * @param  string  $nama          
     * @param  string  $jenis_kelamin 
     * @param  string  $tempat_lahir  
     * @param  string  $tgl_lahir         tahun-bulan-tanggal
     * @param  string  $agama
     * @param  string  $alamat        
     * @param  integer $tahun_masuk   
     * @param  string  $foto          
     * @param  integer $status_id     
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>                
     */
    public function update(
        $id,
        $nis = null,
        $nama,
        $jenis_kelamin,
        $tempat_lahir,
        $tgl_lahir,
        $agama = null,
        $alamat = '',
        $tahun_masuk,
        $foto = null,
        $status_id
    ) {
        $id          = (int)$id;
        $tahun_masuk = (int)$tahun_masuk;
        $status_id   = (int)$status_id;

        $data = array(
            'nis'           => $nis,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'agama'         => $agama,
            'alamat'        => $alamat,
            'tahun_masuk'   => $tahun_masuk,
            'foto'          => $foto,
            'status_id'     => $status_id
        );

        $this->db->where('id', $id);
        $this->db->update('siswa', $data);
        return true;
    }


    /**
     * Method untuk mengambil satu data siswa, berdasarkan id atau nis
     * 
     * @param  integer $id 
     * @param  string  $nis
     * @return array
     * @author Almazari <almazary@gmail.com>       
     */
    public function retrieve($id = null, $nis = null)
    {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        } elseif (!is_null($nis)) {
            $this->db->where('nis', $nis);
        }
        $result = $this->db->get('siswa', 1);
        return $result->row_array();
    }

    /**
     * Method untuk menambah data siswa
     * 
     * @param  string  $nis           
     * @param  string  $nama          
     * @param  string  $jenis_kelamin 
     * @param  string  $tempat_lahir  
     * @param  string  $tgl_lahir       tahun-bulan-tanggal  
     * @param  string  $agama
     * @param  string  $alamat        
     * @param  integer $tahun_masuk   
     * @param  string  $foto          
     * @param  integer $status_id     
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>                  
     */
    public function create(
        $nis = null,
        $nama,
        $jenis_kelamin,
        $tempat_lahir,
        $tgl_lahir,
        $agama = null,
        $alamat = '',
        $tahun_masuk,
        $foto = null,
        $status_id = 0
    ) {
        $tahun_masuk = (int)$tahun_masuk;
        $status_id   = (int)$status_id;

        $data = array(
            'nis'           => $nis,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'agama'         => $agama,
            'alamat'        => $alamat,
            'tahun_masuk'   => $tahun_masuk,
            'foto'          => $foto,
            'status_id'     => $status_id
        );
        $this->db->insert('siswa', $data);
        return $this->db->insert_id();
    }
}