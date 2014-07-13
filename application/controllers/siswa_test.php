<?php

class Siswa_test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
    }

    function index()
    {
        //test create
        $id = $this->siswa_model->create(
            '123',
            'almazari',
            'Laki-laki',
            'Rimbo Bujang',
            '1989-10-23',
            'depokan kotagede jogjakarta',
            '2014',
            'foto.jpg',
            '1'
        );

        if (!empty($id)) {
            echo 'create siswa berhasil, id = '.$id.'<hr>';
        } else {
            echo 'create siswa gagal<hr>';
            exit();
        }

        //test ambil satu
        $siswa = $this->siswa_model->retrieve($id);

        if (!empty($siswa)) {
            echo 'retrieve siswa berhasil, data : <br>';
            echo '<pre>';
            print_r($siswa).'</pre><hr>';
        } else {
            echo 'retrieve siswa gagal<hr>';
            exit();
        }

        //test update
        $update = $this->siswa_model->update(
            $id,
            '123343',
            'almazari',
            'Laki-laki',
            'Rimbo Bujang',
            '1989-10-23',
            'depokan kotagede jogjakarta',
            '2014',
            'foto.jpg',
            '1'
        );

        if ($update) {
            echo 'update siswa berhasil<hr>';
        } else {
            echo 'update siswa gagal<hr>';
            exit();
        }


        //test retrieve all
        $retrieve_all = $this->siswa_model->retrieve_all();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all siswa berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all siswa gagal<hr>';
            exit();
        }

        //test hapus
        $result = $this->siswa_model->delete($id);

        if ($result) {
            echo 'delete siswa berhasil<hr>';
        } else {
            echo 'delete siswa gagal<hr>';
            exit();
        }
    }
}