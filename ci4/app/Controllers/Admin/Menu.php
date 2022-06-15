<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;
class Menu extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function select(){
        echo "Untuk menampilkan data";
    }

    public function update($id=null,$nama=null){
        echo "Untul update data dengan id".$id;
    }
}
