<?php namespace App\Controllers;

// posisinya
//kalo di ci 3 gapake app\controller

class Kategori extends BaseController
// Biasanya di ci 3
// extends CI_Controller

{
    public function index()
    {
        echo "Belajar CI3";
    }

    public function select(){
        echo "Menampilkan semua data";
    }

    public function selectWhere($id = null){
        echo "Menampilkan data yang dipilih";
    }

    public function formInsert(){
        echo "Menampilkan form insert";
    }

    public function formUpdate(){
        echo "Menampilkan form update";
    }

    public function update($id = null){
        echo "proses update data";
    }

    public function delete($id = null){
        echo "Proses delete data";
    }
}
