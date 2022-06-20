<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;
// pemanggilan model kategori
use App\Models\User_M;

class User extends BaseController
{

    public function index()
    {
        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new User_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA USER',
            // 'kategori' => $kategori,
            'user' => $model_nana->paginate(2, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("user/select",$data);
    }

    public function create()
    {
       $data = 
       [
        'level' => ['Admin','Koki','Kasir']
       ];

       return view ("user/insert",$data);
    }

    public function insert()
    {
        // membuat object
        $model = new User_M();

        $model -> insert($_POST);

        // if($model -> insert($_POST) === false){
        //     $error = $model->errors();
        //     // membuat session flashdata
        //     session()->setFlashdata('info', $error['kategori']);
        //     return redirect()->to(base_url("/admin/kategori/create")); 
        // }else{
            return redirect()->to(base_url("/admin/user")); 
        // }
        // function insert suadah bawaan dari CI
        // insert -> mengirim data ke database dengan parameter$_POST
        // sesuai dengan method form yang kita pakai = post
    }
}
