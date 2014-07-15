<?php

class Pengajar_test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('mapel_model', 'kelas_model', 'pengajar_model'));
    }

    function index()
    {
        //create pengajar
        $pengajar_id = $this->pengajar_model->create(
            $nip       = '123',
            $nama      = 'Almazari',
            $alamat    = 'Depokan Yogyakarta',
            $foto      = 'foto.jpg',
            $status_id = 0
        );

        if (!empty($pengajar_id)) {
            echo 'create pengajar berhasil, id = '.$pengajar_id.'<hr>';
        } else {
            echo 'create pengajar gagal<hr>';
            exit();
        }

        //test retrieve
        $pengajar = $this->pengajar_model->retrieve($pengajar_id);

        if (!empty($pengajar)) {
            echo 'retrieve pengajar berhasil, data : <br>';
            echo '<pre>';
            print_r($pengajar).'</pre><hr>';
        } else {
            echo 'retrieve pengajar gagal<hr>';
            exit();
        }

        //update
        $update = $this->pengajar_model->update(
            $pengajar_id,
            $nip       = '123456',
            $nama      = 'Almazari',
            $alamat    = 'Depokan Yogyakarta',
            $foto      = 'foto.jpg',
            $status_id = 0
        );

        if ($update) {
            echo 'update pengajar berhasil<hr>';
        } else {
            echo 'update pengajar gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->pengajar_model->retrieve_all();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all pengajar berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all pengajar gagal<hr>';
            exit();
        }

        /*-----------------mapel ajar--------------------*/

        //create kelas
        $kelas_id = $this->kelas_model->create(
            'KELAS 9',
            null
        );

        //create mapel
        $mapel_id = $this->mapel_model->create('Bahasa Indonesi', 'Ini adalah mapel bahasa indonesia');

        $mapel_kelas_id = $this->mapel_model->create_kelas($kelas_id, $mapel_id);

        $mapel_ajar_id = $this->pengajar_model->create_ma(
            $hari_id = 1,
            $jam_mulai = '08:00',
            $jam_selesai = '10:00',
            $pengajar_id,
            $mapel_kelas_id
        );

        if (!empty($mapel_ajar_id)) {
            echo 'create mapel ajar berhasil, id = '.$mapel_ajar_id.'<hr>';
        } else {
            echo 'create mapel ajar gagal<hr>';
            exit();
        }

        //retrieve
        $mapel_ajar = $this->pengajar_model->retrieve_ma($mapel_ajar_id);

        if (!empty($mapel_ajar)) {
            echo 'retrieve mapel ajar berhasil, data : <br>';
            echo '<pre>';
            print_r($mapel_ajar).'</pre><hr>';
        } else {
            echo 'retrieve mapel ajar gagal<hr>';
            exit();
        }

        $update = $this->pengajar_model->update_ma(
            $mapel_ajar_id,
            $hari_id = 1,
            $jam_mulai = '08:30',
            $jam_selesai = '10:00',
            $pengajar_id,
            $mapel_kelas_id
        );

        if ($update) {
            echo 'update mapel ajar berhasil<hr>';
        } else {
            echo 'update mapel ajar gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->pengajar_model->retrieve_all_ma();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all mapel ajar berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all mapel ajar gagal<hr>';
            exit();
        }

        //hapus
        $this->mapel_model->delete_kelas($mapel_kelas_id);
        
        $this->mapel_model->delete($mapel_id);

        $this->kelas_model->delete($kelas_id);

        $hapus = $this->pengajar_model->delete($pengajar_id);
        if ($hapus) {
            echo 'delete pengajar berhasil<hr>';
        } else {
            echo 'delete pengajar gagal<hr>';
            exit();
        }
    }

}