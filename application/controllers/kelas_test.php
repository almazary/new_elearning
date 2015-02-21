<?php

class Kelas_test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('siswa_model', 'kelas_model'));
    }

    function index()
    {
        //create kelas
        $kelas_id = $this->kelas_model->create(
            'KELAS 9',
            null
        );

        if (!empty($kelas_id)) {
            echo 'create kelas berhasil, id = '.$kelas_id.'<hr>';
        } else {
            echo 'create kelas gagal<hr>';
            exit();
        }

        //test ambil satu kelas
        $kelas = $this->kelas_model->retrieve($kelas_id);

        if (!empty($kelas)) {
            echo 'retrieve kelas berhasil, data : <br>';
            echo '<pre>';
            print_r($kelas).'</pre><hr>';
        } else {
            echo 'retrieve kelas gagal<hr>';
            exit();
        }

        //test update
        $update = $this->kelas_model->update(
            $kelas_id,
            'KELAS 10',
            null,
            $kelas['urutan']
        );

        if ($update) {
            echo 'update kelas berhasil<hr>';
        } else {
            echo 'update kelas gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->kelas_model->retrieve_all();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all kelas berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all kelas gagal<hr>';
            exit();
        }

        /*-------------------kelas siswa--------------------------------*/

        //test create siswa
        $siswa_id = $this->siswa_model->create(
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

        //test create
        $kelas_siswa_id = $this->kelas_model->create_siswa(
            $kelas_id,
            $siswa_id,
            1
        );

        if (!empty($kelas_siswa_id)) {
            echo 'create kelas siswa berhasil, id = '.$kelas_siswa_id.'<hr>';
        } else {
            echo 'create kelas siswa gagal<hr>';
            exit();
        }

        //test ambil satu
        $kelas_siswa = $this->kelas_model->retrieve_siswa($kelas_siswa_id, null);

        if (!empty($kelas_siswa)) {
            echo 'retrieve kelas siswa berhasil, data : <br>';
            echo '<pre>';
            print_r($kelas_siswa).'</pre><hr>';
        } else {
            echo 'retrieve kelas siswa gagal<hr>';
            exit();
        }

        //test update
        $update = $this->kelas_model->update_siswa(
            $kelas_siswa_id,
            $kelas_id,
            $siswa_id,
            $aktif = 0
        );

        if ($update) {
            echo 'update kelas siswa berhasil<hr>';
        } else {
            echo 'update kelas siswa gagal<hr>';
            exit();
        }

        //test retrieve all
        $retrieve_all = $this->kelas_model->retrieve_all_siswa();

        if (!empty($retrieve_all)) {
            echo 'retrieve_all kelas siswa berhasil, data: <br>';
            echo '<pre>';
            print_r($retrieve_all).'</pre><hr>';
        } else {
            echo 'retrieve_all kelas siswa gagal<hr>';
            exit();
        }

        //test hapus
        $hapus = $this->kelas_model->delete_siswa($kelas_siswa_id);
        if ($hapus) {
            echo 'delete kelas siswa berhasil<hr>';
        } else {
            echo 'delete kelas siswa gagal<hr>';
            exit();
        }

        $hapus = $this->kelas_model->delete($kelas_id);
        if ($hapus) {
            echo 'delete kelas berhasil<hr>';
        } else {
            echo 'delete kelas gagal<hr>';
            exit();
        }

        //hapus siswa
        $this->siswa_model->delete($siswa_id);
    }
}
