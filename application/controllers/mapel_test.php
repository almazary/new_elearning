<?php

class Mapel_test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('mapel_model', 'kelas_model'));
    }

    function index()
    {
        //create mapel
        $mapel_id = $this->mapel_model->create('Bahasa Indonesi', 'Ini adalah mapel bahasa indonesia');

        if (!empty($mapel_id)) {
            echo 'create mapel berhasil, id = '.$mapel_id.'<hr>';
        } else {
            echo 'create mapel gagal<hr>';
            exit();
        }

        //test ambil satu mapel
        $mapel = $this->mapel_model->retrieve($mapel_id);

        if (!empty($mapel)) {
            echo 'retrieve mapel berhasil, data : <br>';
            echo '<pre>';
            print_r($mapel).'</pre><hr>';
        } else {
            echo 'retrieve mapel gagal<hr>';
            exit();
        }

        //update
        $update = $this->mapel_model->update($mapel_id, 'Bahasa Inggris', 'Ini adalah bahasa inggris');

        if ($update) {
            echo 'update mapel berhasil<hr>';
        } else {
            echo 'update mapel gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->mapel_model->retrieve_all();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all mapel berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all mapel gagal<hr>';
            exit();
        }

        /*-------------------------mapel kelas---------------------*/

        //create kelas
        $kelas_id = $this->kelas_model->create(
            'KELAS 9',
            null
        );

        $mapel_kelas_id = $this->mapel_model->create_kelas($kelas_id, $mapel_id);

        if (!empty($mapel_kelas_id)) {
            echo 'create mapel kelas berhasil, id = '.$mapel_kelas_id.'<hr>';
        } else {
            echo 'create mapel kelas gagal<hr>';
            exit();
        }

        $mapel_kelas = $this->mapel_model->retrieve_kelas($mapel_kelas_id);

        if (!empty($mapel_kelas)) {
            echo 'retrieve mapel kelas berhasil, data : <br>';
            echo '<pre>';
            print_r($mapel_kelas).'</pre><hr>';
        } else {
            echo 'retrieve mapel kelas gagal<hr>';
            exit();
        }

        //update
        $update = $this->mapel_model->update_kelas($mapel_kelas_id, $kelas_id, $mapel_id);

        if ($update) {
            echo 'update mapel kelas berhasil<hr>';
        } else {
            echo 'update mapel kelas gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->mapel_model->retrieve_all_kelas();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all mapel kelas berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all mapel kelas gagal<hr>';
            exit();
        }

        //hapus
        $hapus = $this->mapel_model->delete_kelas($mapel_kelas_id);
        if ($hapus) {
            echo 'delete mapel kelas berhasil<hr>';
        } else {
            echo 'delete mapel kelas gagal<hr>';
            exit();
        }

        $hapus = $this->mapel_model->delete($mapel_id);
        if ($hapus) {
            echo 'delete mapel berhasil<hr>';
        } else {
            echo 'delete mapel gagal<hr>';
            exit();
        }

        //hapus kelas
        $this->kelas_model->delete($kelas_id);
    }

}