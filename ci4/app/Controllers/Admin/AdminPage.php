<?php namespace App\Controllers\Admin;

//pemanggilan controller
use App\Controllers\BaseController;

class AdminPage extends BaseController
{
    public function index()
    {
        return view('template/admin');
    }
}
