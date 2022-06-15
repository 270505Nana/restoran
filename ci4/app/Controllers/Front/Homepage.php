<?php namespace App\Controllers\Front;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
