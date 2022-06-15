<?php

namespace App\Controllers;

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
