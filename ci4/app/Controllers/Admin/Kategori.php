<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;

class Kategori extends BaseController
// Biasanya di ci 3
// extends CI_Controller

{
    public function index()
    {
        echo "Belajar CI3";
    }

    public function select(){

        $data = [
            'judul' => 'SELECT DATA',
            'kategori' => ['Makanan', 'Minuman', 'Snack']
        ];
    
        return view ("Kategori/select",$data);
    }

    public function selectWhere($id = null){
        echo "Menampilkan data yang dipilih";
    }

    public function formInsert(){
        return view ("Kategori/forminsert");
    }

    public function formUpdate(){
        return view ("template/header");
        return view ("Kategori/update");
        return view ("template/footer");
    }

    public function update($id = null){
        echo "proses update data";
    }

    public function delete($id = null){
        echo "Proses delete data";
    }
}
