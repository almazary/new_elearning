<?php

/**
 * Class Model untuk resource pengajar
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 */
class Pengajar_model extends CI_Model
{
    /**
     * Method untuk mengahpus foto
     *
     * @param  integer $id
     * @return boolean
     * @author Almazari <almazary@gmail.com>
     * @since  1.8
     */
    public function delete_foto($id)
    {
        $this->db->where('id', $id);
        $this->db->update('pengajar', array('foto' => null));
        return true;
    }

    /**
     * Method untuk menghitung data jumlah berdasarkan parameter tertentu
     *
     * @param  string $by
     * @param  array  $param
     * @return integer
     * @author Almazari <almazary@gmail.com>
     */
    public function count($by, $param = array())
    {
        switch ($by) {
            case 'total':
                $this->db->select("COUNT(*) as jml");
                $this->db->where('status_id !=', '0');
                $result = $this->db->get('pengajar');
                $result = $result->row_array();
                return $result['jml'];
            break;

            case 'pending':
                $this->db->select("COUNT(*) as jml");
                $this->db->where('status_id', '0');
                $result = $this->db->get('pengajar');
                $result = $result->row_array();
                return $result['jml'];
            break;

            default:
                return 0;
            break;
        }
    }

    /**
     * Method untuk mendapatkan semua pengajar berhasarkan nama
     *
     * @param  string $nama
     * @return array
     *
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_by_name($nama)
    {
        $search_result = $this->retrieve_all_filter(
            $nip           = '',
            $nama,
            $jenis_kelamin = array(),
            $tempat_lahir  = '',
            $tgl_lahir     = '',
            $bln_lahir     = '',
            $thn_lahir     = '',
            $alamat        = '',
            $status_id     = array(),
            $username      = '',
            $is_admin      = '',
            $page_no       = 1,
            $pagination    = false
        );
        return $search_result;
    }

    /**
     * Method untuk filter pengajar
     *
     * @param  string  $nip
     * @param  string  $nama
     * @param  array   $jenis_kelamin
     * @param  string  $tempat_lahir
     * @param  string  $tgl_lahir
     * @param  string  $bln_lahir
     * @param  string  $thn_lahir
     * @param  string  $alamat
     * @param  array   $status_id
     * @param  string  $username
     * @param  integer $page_no
     * @param  boolean $pagination
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_filter(
        $nip           = '',
        $nama          = '',
        $jenis_kelamin = array(),
        $tempat_lahir  = '',
        $tgl_lahir     = '',
        $bln_lahir     = '',
        $thn_lahir     = '',
        $alamat        = '',
        $status_id     = array(),
        $username      = '',
        $is_admin      = '',
        $page_no       = 1,
        $pagination    = true
    ) {
        $where = array();
        $orderby['pengajar.id'] = 'DESC';

        if (!empty($nip)) {
            $nip = (int)$nip;
            $where['pengajar.nip'] = array($nip, 'like', 'after');
        }

        if (!empty($nama)) {
            $nama = (string)$nama;
            $where['pengajar.nama'] = array($nama, 'like');
        }

        if (!empty($jenis_kelamin) AND is_array($jenis_kelamin)) {
            $where['pengajar.jenis_kelamin'] = array($jenis_kelamin, 'where_in');
        }

        if (!empty($tempat_lahir)) {
            $tempat_lahir = (string)$tempat_lahir;
            $where['pengajar.tempat_lahir'] = array($tempat_lahir, 'like');
        }

        if (!empty($tgl_lahir)) {
            $tgl_lahir = (int)$tgl_lahir;
            $where['DAY(tgl_lahir)'] = array($tgl_lahir, 'where');
        }

        if (!empty($bln_lahir)) {
            $bln_lahir = (int)$bln_lahir;
            $where['MONTH(tgl_lahir)'] = array($bln_lahir, 'where');
        }

        if (!empty($thn_lahir)) {
            $thn_lahir = (int)$thn_lahir;
            $where['YEAR(tgl_lahir)'] = array($thn_lahir, 'where');
        }

        if (!empty($alamat)) {
            $alamat = (string)$alamat;
            $where['pengajar.alamat'] = array($alamat, 'like');
        }

        if (!empty($status_id) AND is_array($status_id)) {
            $where['pengajar.status_id'] = array($status_id, 'where_in');
        }

        if (!empty($username)) {
            $username                = (string)$username;
            $where['login']          = array('pengajar.id = login.pengajar_id', 'join', 'inner');
            $where['login.username'] = array($username, 'like');
        }

        if (!empty($is_admin)) {
            if (empty($username)) {
                $where['login'] = array('pengajar.id = login.pengajar_id', 'join', 'inner');
            }
            $where['login.is_admin'] = array($is_admin, 'where');
        }

        if ($pagination) {
            $data = $this->pager->set('pengajar', 50, $page_no, $where, $orderby, 'pengajar.*');
        } else {
            # cari jumlah semua pengajar
            $no_of_records = $this->db->count_all('pengajar');
            $search_all    = $this->pager->set('pengajar', $no_of_records, 1, $where, $orderby, 'pengajar.*');
            $data          = $search_all['results'];
        }

        return $data;
    }

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
     * @param  null|integer     $hari_id
     * @param  null|integer     $pengajar_id
     * @param  null|integer     $mapel_kelas_id
     * @return array
     * @author Almazari <almazary@gmail.com>
     */
    public function retrieve_all_ma(
        $hari_id        = null,
        $pengajar_id    = null,
        $mapel_kelas_id = null,
        $aktif          = null,
        $kelas_id       = null
    ) {
        if (!is_null($hari_id)) {
            $hari_id = (int)$hari_id;
            $this->db->where('hari_id', $hari_id);
        }
        if (!is_null($pengajar_id)) {
            $pengajar_id = (int)$pengajar_id;
            $this->db->where('pengajar_id', $pengajar_id);
        }
        if (!is_null($mapel_kelas_id)) {
            $mapel_kelas_id = (int)$mapel_kelas_id;
            $this->db->where('mapel_ajar.mapel_kelas_id', $mapel_kelas_id);
        }
        if (!is_null($aktif)) {
            $this->db->where('mapel_ajar.aktif', $aktif);
        }
        if (!is_null($kelas_id)) {
            $this->db->where('mapel_kelas.kelas_id', $kelas_id);
        }

        $this->db->select('mapel_ajar.*');
        $this->db->join('mapel_kelas', 'mapel_ajar.mapel_kelas_id = mapel_kelas.id', 'join');
        $this->db->where('mapel_kelas.aktif', 1);
        $this->db->order_by('mapel_ajar.jam_mulai', 'ASC');
        $result = $this->db->get('mapel_ajar');
        return $result->result_array();
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
    public function retrieve_ma($id = null, $pengajar_id = null, $mapel_kelas_id = null, $hari_id = null, $jam_mulai = null, $jam_selesai = null)
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

        if (!is_null($hari_id)) {
            $hari_id = (int)$hari_id;
            $this->db->where('hari_id', $hari_id);
        }

        if (!is_null($jam_mulai)) {
            $this->db->where('jam_mulai', $jam_mulai);
        }

        if (!is_null($jam_selesai)) {
            $this->db->where('jam_selesai', $jam_selesai);
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
        $mapel_kelas_id,
        $aktif
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
            'mapel_kelas_id' => $mapel_kelas_id,
            'aktif'          => $aktif
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

        $orderby['pengajar.nama'] = 'ASC';

        $data = $this->pager->set('pengajar', $no_of_records, $page_no, $where, $orderby);

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
        $nip          = null,
        $nama,
        $jenis_kelamin,
        $tempat_lahir = null,
        $tgl_lahir    = null,
        $alamat       = null,
        $foto         = null,
        $status_id    = 0
    ) {
        $id        = (int)$id;
        $status_id = (int)$status_id;

        $data = array(
            'nip'           => $nip,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'foto'          => $foto,
            'status_id'     => $status_id
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
        $nip          = null,
        $nama,
        $jenis_kelamin,
        $tempat_lahir = null,
        $tgl_lahir    = null,
        $alamat       = null,
        $foto         = null,
        $status_id    = 0
    ) {
        $status_id = (int)$status_id;

        $data = array(
            'nip'           => $nip,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'foto'          => $foto,
            'status_id'     => $status_id
        );
        $this->db->insert('pengajar', $data);
        return $this->db->insert_id();
    }
}
