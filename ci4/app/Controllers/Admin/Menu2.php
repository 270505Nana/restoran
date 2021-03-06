<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;

use App\Models\Kategori_M;

class Menu extends BaseController
{
    public function index()
    {
        return view('menu/form');
    }

    public function insert(){

        // variable file
        $file = $this->request->getFile('gambar');
        // gambar : name dari form

       $name = $file->getName();

       // CI memberikan fasilitas gaperlu bikin folder cukup pake function move aja
       $file->move('./upload');
       echo $name."Sudah di upload";
    }

    public function option()
    {
        $model = new Kategori_M();
        $kategori = $model->findAll();

        $data = [
            'kategori' => $kategori
        ];

        return view ('template/option', $data);
    }

}
