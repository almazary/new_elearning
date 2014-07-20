<?php

/**
 * Class Model untuk resource Materi
 * 
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Materi_model extends CI_Model
{

    /**
     * Method untuk menghapus data materi
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com> 
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('materi');
        return true;
    }

    /**
     * Method untuk mendapatkan banyak data materi
     * 
     * @param  integer       $no_of_records 
     * @param  integer       $page_no       
     * @param  integer|null  $pengajar_id   
     * @param  integer|null  $siswa_id      
     * @param  integer|null  $mapel_kelas_id
     * @param  string|null   $judul         
     * @param  string|null   $konten        
     * @param  string|null   $tgl_posting      2014-07-16
     * @param  integer|null  $publish          0 | 1
     * @return array
     * @author Almazari <almazary@gmail.com>                 
     */
    public function retrieve_all(
        $no_of_records  = 10, 
        $page_no        = 1,
        $pengajar_id    = null,
        $siswa_id       = null,
        $mapel_kelas_id = null,
        $judul          = null,
        $konten         = null,
        $tgl_posting    = null,
        $publish        = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($pengajar_id)) {
            $pengajar_id = (int)$pengajar_id;
            $where['pengajar_id'] = array($pengajar_id, 'where');
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $where['siswa_id'] = array($siswa_id, 'where');
        }
        if (!is_null($mapel_kelas_id)) {
            $mapel_kelas_id = (int)$mapel_kelas_id;
            $where['mapel_kelas_id'] = array($mapel_kelas_id, 'where');
        }
        $like = 0;
        if (!is_null($judul)) {
            $where['judul'] = array($judul, 'like');
            $like = 1;
        }
        if (!is_null($konten)) {
            if ($like) {
                $value = array($like, 'or_like');
            } else {
                $value = array($like, 'like');
            }
            $where['konten'] = $value;
        }
        if (!is_null($tgl_posting)) {
            $where['DATE(tgl_posting)'] = array($tgl_posting, 'where');
        }
        if (!is_null($publish)) {
            $publish = (int)$publish;
            $where['publish'] = array($publish, 'where');
        }

        $orderby = array(
            'id' => 'DESC'
        );

        $data = $this->pager->set('materi', $no_of_records, $page_no, $where);

        return $data;
    }

    /**
     * Method untuk mengambil satu data materi
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com> 
     */
    public function retrieve($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('materi', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui data materi
     *
     * @param  integer  $id
     * @param  integer  $pengajar_id    
     * @param  integer  $siswa_id       
     * @param  integer  $mapel_kelas_id 
     * @param  string   $judul          
     * @param  string   $konten         
     * @param  string   $file           
     * @param  integer  $publish        
     * @return boolean  true jika berhasil
     * @author Almazari <almazary@gmail.com> 
     */
    public function update(
        $id,
        $pengajar_id = null,
        $siswa_id    = null,
        $mapel_kelas_id,
        $judul,
        $konten  = null,
        $file    = null,
        $publish = 1
    ) {
        $id             = (int)$id;
        $pengajar_id    = (int)$pengajar_id;
        $siswa_id       = (int)$siswa_id;
        $mapel_kelas_id = (int)$mapel_kelas_id;
        $publish        = (int)$publish;

        $data = array(
            'pengajar_id'    => $pengajar_id,
            'siswa_id'       => $siswa_id,
            'mapel_kelas_id' => $mapel_kelas_id,
            'judul'          => $judul,
            'konten'         => $konten,
            'file'           => $file,
            'tgl_posting'    => date('Y-m-d H:i:s'),
            'publish'        => $publish
        );
        $this->db->where('id', $id);
        $this->db->update('materi', $data);
        return true;
    }

    /**
     * Method untuk menambah data materi
     * 
     * @param  integer  $pengajar_id    
     * @param  integer  $siswa_id       
     * @param  integer  $mapel_kelas_id 
     * @param  string   $judul          
     * @param  string   $konten         
     * @param  string   $file           
     * @param  integer  $publish        
     * @return integer  last insert id
     * @author Almazari <almazary@gmail.com> 
     */
    public function create(
        $pengajar_id = null,
        $siswa_id    = null,
        $mapel_kelas_id,
        $judul,
        $konten  = null,
        $file    = null,
        $publish = 1
    ) {
        $pengajar_id    = (int)$pengajar_id;
        $siswa_id       = (int)$siswa_id;
        $mapel_kelas_id = (int)$mapel_kelas_id;
        $publish        = (int)$publish;

        $data = array(
            'pengajar_id'    => $pengajar_id,
            'siswa_id'       => $siswa_id,
            'mapel_kelas_id' => $mapel_kelas_id,
            'judul'          => $judul,
            'konten'         => $konten,
            'file'           => $file,
            'tgl_posting'    => date('Y-m-d H:i:s'),
            'publish'        => $publish
        );
        $this->db->insert('materi', $data);
        return $this->db->insert_id();
    }

}