<?php

/**
 * Class Model untuk resource Tugas
 * 
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Tugas_model extends CI_Model
{   

    /**
     * Method untuk mendapatkan banyak data nilai
     * 
     * @param  integer      $no_of_records
     * @param  integer      $page_no      
     * @param  null|integer $tugas_id
     * @param  null|integer $siswa_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_nilai(
        $no_of_records = 10, 
        $page_no       = 1,
        $tugas_id      = null,
        $siswa_id      = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($tugas_id)) {
            $tugas_id = (int)$tugas_id;
            $where['tugas_id'] = array($tugas_id, 'where');
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $where['siswa_id'] = array($siswa_id, 'where');
        }

        $orderby = array('id', 'DESC');

        $data = $this->pager->set('nilai_tugas', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu nilai tugas
     * 
     * @param  null|integer $id      
     * @param  null|integer $tugas_id
     * @param  null|integer $siswa_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_nilai(
        $id       = null,
        $tugas_id = null,
        $siswa_id = null
    ) {
        if (!is_null($id)) {
            $id = (int)$id;
            $this->db->where('id', $id);
        }
        if (!is_null($tugas_id)) {
            $tugas_id = (int)$tugas_id;
            $this->db->where('tugas_id', $tugas_id);
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $this->db->where('siswa_id', $siswa_id);
        }
        $result = $this->db->get('nilai_tugas', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui nilai tugas
     * 
     * @param  integer $id      
     * @param  float   $nilai   
     * @param  integer $tugas_id
     * @param  integer $siswa_id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_nilai(
        $id,
        $nilai,
        $tugas_id,
        $siswa_id
    ) {
        $id       = (int)$id;
        $nilai    = (float)$nilai;
        $tugas_id = (int)$tugas_id;
        $siswa_id = (int)$siswa_id;

        $data = array(
            'nilai' => $nilai,
            'tugas_id' => $tugas_id,
            'siswa_id' => $siswa_id
        );
        $this->db->where('id', $id);
        $this->db->update('nilai_tugas', $data);
        return true;
    }

    /**
     * method untuk menambah nilai tugas
     * 
     * @param  float   $nilai   
     * @param  integer $tugas_id
     * @param  integer $siswa_id
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>        
     */
    public function create_nilai(
        $nilai,
        $tugas_id,
        $siswa_id
    ) {
        $nilai    = (float)$nilai;
        $tugas_id = (int)$tugas_id;
        $siswa_id = (int)$siswa_id;

        $data = array(
            'nilai' => $nilai,
            'tugas_id' => $tugas_id,
            'siswa_id' => $siswa_id
        );
        $this->db->insert('nilai_tugas', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk mendapatkan satu jawaban ganda
     * 
     * @param  null|integer $id        
     * @param  null|integer $pilihan_id
     * @param  null|integer $siswa_id  
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_ganda($id = null, $pilihan_id = null, $siswa_id = null)
    {
        if (!is_null($id)) {
            $this->db->where('id', $id);
        }
        if (!is_null($pilihan_id)) {
            $this->db->where('pilihan_id', $pilihan_id);
        }
        if (!is_null($siswa_id)) {
            $this->db->where('siswa_id', $siswa_id);
        }
        $result = $this->db->get('ganda', 1);
        return $result->row_array();
    }

    /**
     * Method untuk menghapus jawaban ganda
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_ganda($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('ganda');
        return true;
    }

    /**
     * Method untuk memperbaharui jawaban ganda
     * 
     * @param  integer $id        
     * @param  integer $pilihan_id
     * @param  integer $siswa_id  
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_ganda(
        $id,
        $pilihan_id,
        $siswa_id
    ) {
        $id         = (int)$id;
        $pilihan_id = (int)$pilihan_id;
        $siswa_id   = (int)$siswa_id;

        $data = array(
            'pilihan_id' => $pilihan_id,
            'siswa_id'   => $siswa_id
        );
        $this->db->where('id', $id);
        $this->db->update('ganda', $data);
        return true;
    }

    /**
     * Method untuk menambah jawaban ganda
     * 
     * @param  integer $pilihan_id
     * @param  integer $siswa_id  
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_ganda(
        $pilihan_id,
        $siswa_id
    ) {
        $pilihan_id = (int)$pilihan_id;
        $siswa_id   = (int)$siswa_id;

        $data = array(
            'pilihan_id' => $pilihan_id,
            'siswa_id'   => $siswa_id
        );
        $this->db->insert('ganda', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus jawaban essay
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_essay($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('essay');
        return true;
    }

    /**
     * Method untuk mendapatkan satu record jawaban essay
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_essay($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('essay', 1);
        return $result->row_array();
    }

    /**
     * Method untuk update jawaban essay
     * 
     * @param  integer $id           
     * @param  string  $jawaban      
     * @param  integer $pertanyaan_id
     * @param  integer $siswa_id     
     * @return boolan  true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_essay(
        $id,
        $jawaban,
        $pertanyaan_id,
        $siswa_id
    ) {
        $id            = (int)$id;
        $pertanyaan_id = (int)$pertanyaan_id;
        $siswa_id      = (int)$siswa_id;

        $data = array(
            'jawaban'       => $jawaban,
            'pertanyaan_id' => $pertanyaan_id,
            'siswa_id'      => $siswa_id
        );
        $this->db->where('id', $id);
        $this->db->update('essay', $data);
        return true;
    }

    /**
     * Method untuk menambah jawaban essay
     * 
     * @param  string  $jawaban       
     * @param  integer $pertanyaan_id 
     * @param  integer $siswa_id      
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_essay(
        $jawaban,
        $pertanyaan_id,
        $siswa_id
    ) {
        $pertanyaan_id = (int)$pertanyaan_id;
        $siswa_id      = (int)$siswa_id;

        $data = array(
            'jawaban'       => $jawaban,
            'pertanyaan_id' => $pertanyaan_id,
            'siswa_id'      => $siswa_id
        );
        $this->db->insert('essay', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus data pilihan
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_pilihan($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('pilihan');
        return true;
    }

    /**
     * Method untuk mengambail banyak data pilihan
     * 
     * @param  integer $no_of_records
     * @param  integer $page_no      
     * @param  integer|null  $pertanyaan_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_pilihan(
        $no_of_records = 10, 
        $page_no       = 1,
        $pertanyaan_id
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($pertanyaan_id)) {
            $pertanyaan_id = (int)$pertanyaan_id;
            $where['pertanyaan_id'] = array($pertanyaan_id, 'where');
        }

        $orderby = array('urutan' => 'ASC');

        $data = $this->pager->set('pilihan', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu data pilihan
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_pilihan($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('pilihan', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui data pilihan
     * 
     * @param  integer $id           
     * @param  integer $pertanyaan_id
     * @param  string  $konten       
     * @param  integer $kunci        
     * @param  integer $urutan       
     * @return boolan true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function update_pilihan(
        $id,
        $pertanyaan_id,
        $konten,
        $kunci,
        $urutan
    ) {
        $id            = (int)$id;
        $pertanyaan_id = (int)$pertanyaan_id;
        $kunci         = (int)$kunci;
        $urutan        = (int)$urutan;

        $data = array(
            'pertanyaan_id' => $pertanyaan_id,
            'konten'        => $konten,
            'kunci'         => $kunci,
            'urutan'        => $urutan
        );
        $this->db->where('id', $id);
        $this->db->update('pilihan', $data);
        return true;
    }

    /**
     * Method untuk manambah pilihan pada petanyaan
     * 
     * @param  integer $pertanyaan_id
     * @param  string  $konten       
     * @param  integer $kunci        
     * @return array   last insert id
     * @author Almazari <almazary@gmail.com>              
     */
    public function create_pilihan(
        $pertanyaan_id,
        $konten,
        $kunci
    ) {
        $pertanyaan_id = (int)$pertanyaan_id;
        $kunci         = (int)$kunci;

        $query = $this->db->query("SELECT MAX(urutan) AS max FROM pilihan WHERE pertanyaan_id = $pertanyaan_id");
        $row = $query->row_array();
        if (!isset($row['max']) OR empty($row['max'])) {
            $row['max'] = 1;
        } else {
            $row['max'] = $row['max'] + 1;
        }

        $data = array(
            'pertanyaan_id' => $pertanyaan_id,
            'konten'        => $konten,
            'kunci'         => $kunci,
            'urutan'        => $row['max']
        );
        $this->db->insert('pilihan', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus data pertanyaan
     * 
     * @param  integer $id
     * @return boolan  true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete_pertanyaan($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('tugas_pertanyaan');
        return true;
    }

    /**
     * Method untuk mendapatkan banyak data pertanyaan
     * 
     * @param  integer      $no_of_records
     * @param  integer      $page_no      
     * @param  integer|null $tugas_id     
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_pertanyaan(
        $no_of_records = 10, 
        $page_no       = 1,
        $tugas_id      = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($tugas_id)) {
            $tugas_id = (int)$tugas_id;
            $where['tugas_id'] = array($tugas_id, 'where');
        }

        $orderby = array('urutan', 'ASC');

        $data = $this->pager->set('tugas_pertanyaan', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu data pertanyaan
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_pertanyaan($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $result = $this->db->get('tugas_pertanyaan', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui pertanyaan
     * 
     * @param  integer $id        
     * @param  string  $pertanyaan
     * @param  integer $urutan    
     * @param  integer $tugas_id  
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>            
     */
    public function update_pertanyaan(
        $id,
        $pertanyaan,
        $urutan,
        $tugas_id
    ) {
        $id       = (int)$id;
        $urutan   = (int)$urutan;
        $tugas_id = (int)$tugas_id;

        $data = array(
            'pertanyaan' => $pertanyaan,
            'urutan'     => $urutan,
            'tugas_id'   => $tugas_id
        );
        $this->db->where('id', $id);
        $this->db->update('tugas_pertanyaan', $data);
        return true;
    }

    /**
     * Method untuk menambah pertanyaan
     * 
     * @param  string  $pertanyaan
     * @param  integer $tugas_id  
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>
     */
    public function create_pertanyaan(
        $pertanyaan,
        $tugas_id
    ) {
        $tugas_id = (int)$tugas_id;

        $query = $this->db->query("SELECT MAX(urutan) AS max FROM tugas_pertanyaan WHERE tugas_id = $tugas_id");
        $row = $query->row_array();
        if (!isset($row['max']) OR empty($row['max'])) {
            $row['max'] = 1;
        } else {
            $row['max'] = $row['max'] + 1;
        }

        $data = array(
            'pertanyaan' => $pertanyaan,
            'urutan'     => $row['max'],
            'tugas_id'   => $tugas_id
        );
        $this->db->insert('tugas_pertanyaan', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk mengambil banyak data jawaban upload 
     * 
     * @param  integer       $no_of_records
     * @param  integer       $page_no      
     * @param  integer|null  $tugas_id     
     * @param  integer|null  $siswa_id     
     * @return array
     * @author Almazari <almazary@gmail.com>               
     */
    public function retrieve_all_upload(
        $no_of_records = 10, 
        $page_no       = 1,
        $tugas_id      = null,
        $siswa_id      = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($tugas_id)) {
            $tugas_id = (int)$tugas_id;
            $where['tugas_id'] = array($tugas_id, 'where');
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $where['siswa_id'] = array($siswa_id, 'where');
        }
        $orderby = array('id' => 'DESC');

        $data = $this->pager->set('upload', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu record jawaban upload
     * 
     * @param  integer $id
     * @return array
     * @author Almazari <almazary@gmail.com> 
     */
    public function retrieve_upload($id, $tugas_id = null, $siswa_id = null)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        if (!is_null($tugas_id)) {
            $tugas_id = (int)$tugas_id;
            $this->db->where('tugas_id', $tugas_id);
        }
        if (!is_null($siswa_id)) {
            $siswa_id = (int)$siswa_id;
            $this->db->where('siswa_id', $siswa_id);
        }
        $result = $this->db->get('upload', 1);
        return $result->row_array();
    }

    /**
     * Method untuk insert data jawaban upload
     * 
     * @param  string  $file    
     * @param  integer $tugas_id
     * @param  integer $siswa_id
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>        
     */
    public function create_upload(
        $file,
        $tugas_id,
        $siswa_id
    ) {
        $tugas_id = (int)$tugas_id;
        $siswa_id = (int)$siswa_id;

        $data = array(
            'file'       => $file,
            'tgl_upload' => date('Y-m-d H:i:s'),
            'tugas_id'   => $tugas_id,
            'siswa_id'   => $siswa_id
        );
        $this->db->insert('upload', $data);
        return $this->db->insert_id();
    }

    /**
     * Method untuk menghapus tugas
     * 
     * @param  integer $id
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>
     */
    public function delete($id)
    {
        $id = (int)$id;

        $this->db->where('id', $id);
        $this->db->delete('tugas');
        return true;
    }

    /**
     * Method untuk mengambil banyak data tugas
     * 
     * @param  integer       $no_of_records
     * @param  integer       $page_no      
     * @param  integer|null  $mapel_ajar_id
     * @param  integer|null  $type_id      
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all(
        $no_of_records = 10, 
        $page_no       = 1,
        $mapel_ajar_id = null,
        $type_id       = null
    ) {
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        $where = array();
        if (!is_null($mapel_ajar_id)) {
            $mapel_ajar_id = (int)$mapel_ajar_id;
            $where['mapel_ajar_id'] = array($mapel_ajar_id, 'where');
        }
        if (!is_null($type_id)) {
            $type_id = (int)$type_id;
            $where['type_id'] = array($type_id, 'where');
        }

        $orderby = array('id' => 'DESC');

        $data = $this->pager->set('tugas', $no_of_records, $page_no, $where, $orderby);

        return $data;
    }

    /**
     * Method untuk mendapatkan satu record tugas
     * 
     * @param  integer $id           
     * @param  integer $mapel_ajar_id
     * @param  integer $type_id      
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve($id, $mapel_ajar_id = null, $type_id = null)
    {
        $id = (int)$id;
        if (!is_null($mapel_ajar_id)) {
            $mapel_ajar_id = (int)$mapel_ajar_id;
            $this->db->where('mapel_ajar_id', $mapel_ajar_id);
        }
        if (!is_null($type_id)) {
            $type_id = (int)$type_id;
            $this->db->where('type_id', $type_id);
        }
        
        $this->db->where('id', $id);
        $result = $this->db->get('tugas', 1);
        return $result->row_array();
    }

    /**
     * Method untuk memperbaharui tugas
     *
     * @param  integer $id
     * @param  integer $mapel_ajar_id
     * @param  integer $type_id      
     * @param  string  $judul        
     * @param  string  $info         
     * @param  string  $tgl_buka     
     * @param  string  $tgl_tutup    
     * @param  integer $durasi       
     * @return boolean true jika berhasil
     * @author Almazari <almazary@gmail.com>  
     */
    public function update(
        $id,
        $mapel_ajar_id,
        $type_id,
        $judul,
        $durasi = null,
        $info   = '',
        $aktif  = 0
    ) {
        $id            = (int)$id;
        $mapel_ajar_id = (int)$mapel_ajar_id;
        $type_id       = (int)$type_id;

        $data = array(
            'mapel_ajar_id' => $mapel_ajar_id,
            'type_id'       => $type_id,
            'judul'         => $judul,
            'info'          => $info,
            'durasi'        => $durasi,
            'aktif'         => $aktif
        );
        $this->db->where('id', $id);
        $this->db->update('tugas', $data);
        return true;
    }

    /** 
     * Method untuk ubah status tugas jadi aktif
     * 
     * @param  integer $id
     * @return boolean true
     * 
     * @author Almazari <almazary@gmail.com>
     */
    public function update_to_active($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tugas', array('aktif' => 1));
        return true;
    }

    /**
     * Method untuk menambah tugas
     * 
     * @param  integer $mapel_ajar_id
     * @param  integer $type_id      
     * @param  string  $judul        
     * @param  string  $info         
     * @param  integer $durasi       
     * @return integer last insert id
     * @author Almazari <almazary@gmail.com>               
     */
    public function create(
        $mapel_ajar_id,
        $type_id,
        $judul,
        $durasi = null,
        $info   = ''
    ) {
        $mapel_ajar_id = (int)$mapel_ajar_id;
        $type_id       = (int)$type_id;

        $data = array(
            'mapel_ajar_id' => $mapel_ajar_id,
            'type_id'       => $type_id,
            'judul'         => $judul,
            'info'          => $info,
            'durasi'        => $durasi,
            'aktif'         => 0
        );
        $this->db->insert('tugas', $data);
        return $this->db->insert_id();
    }

}