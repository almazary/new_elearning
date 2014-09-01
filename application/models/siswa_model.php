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
     * @param  integer $tgl_lahir
     * @param  integer $bln_lahir
     * @param  integer $thn_lahir
     * @param  string $alamat
     * @param  array  $agama
     * @param  array  $kelas_id
     * @param  array  $status_id
     * @param  string $username
     * @param  integer $page_no
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
        $bln_lahir     = '',
        $thn_lahir     = '',
        $alamat        = '',
        $agama         = array(),
        $kelas_id      = array(),
        $status_id     = array(),
        $username      = '',
        $page_no       = 1
    ) {
        $where = array();
        $orderby['siswa.nama'] = 'ASC';

        if (!empty($nis)) {
            $nis = (int)$nis;
            $where['siswa.nis'] = array($nis, 'like', 'after');
        }

        if (!empty($nama)) {
            $nama = (string)$nama;
            $where['siswa.nama'] = array($nama, 'like');
        }

        if (!empty($jenis_kelamin) AND is_array($jenis_kelamin)) {
            $where['siswa.jenis_kelamin'] = array($jenis_kelamin, 'where_in');
        }

        if (!empty($tahun_masuk)) {
            $tahun_masuk = (int)$tahun_masuk;
            $where['siswa.tahun_masuk'] = array($tahun_masuk, 'where');
        }

        if (!empty($tempat_lahir)) {
            $tempat_lahir = (string)$tempat_lahir;
            $where['siswa.tempat_lahir'] = array($tempat_lahir, 'like');
        }

        if (!empty($tgl_lahir)) {
            $tgl_lahir = (int)$tgl_lahir;
            $where['DAY(siswa.tgl_lahir)'] = array($tgl_lahir, 'where');
        }

        if (!empty($bln_lahir)) {
            $bln_lahir = (int)$bln_lahir;
            $where['MONTH(siswa.tgl_lahir)'] = array($bln_lahir, 'where');
        }

        if (!empty($thn_lahir)) {
            $thn_lahir = (int)$thn_lahir;
            $where['YEAR(siswa.tgl_lahir)'] = array($thn_lahir, 'where');
        }

        if (!empty($alamat)) {
            $alamat = (string)$alamat;
            $where['siswa.alamat'] = array($alamat, 'like');
        }

        if (!empty($agama) AND is_array($agama)) {
            $where['siswa.agama'] = array($agama, 'where_in');
        }

        if (!empty($kelas_id)) {
            $where['kelas_siswa']          = array('siswa.id = kelas_siswa.siswa_id', 'join', 'inner');
            $where['kelas_siswa.aktif']    = array(1, 'where');
            $where['kelas_siswa.kelas_id'] = array($kelas_id, 'where_in');
            $orderby['kelas_siswa.kelas_id'] = 'ASC';
        }

        if (!empty($status_id) AND is_array($status_id)) {
            $where['siswa.status_id'] = array($status_id, 'where_in');
        }

        if (!empty($username)) {
            $username                = (string)$username;
            $where['login']          = array('siswa.id = login.siswa_id', 'join', 'inner');
            $where['login.username'] = array($username, 'like');
        }

        $data = $this->pager->set('siswa', 50, $page_no, $where, $orderby, 'siswa.*');

        return $data;
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
