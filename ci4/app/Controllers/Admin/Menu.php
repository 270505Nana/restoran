<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

// Milih models yang mau dipake
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Menu extends BaseController
{
    public function index()
    {
        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new Menu_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA MENU',
            // 'kategori' => $kategori,
            'menu' => $model_nana->paginate(2, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("menu/select",$data);
    }

    public function read()
    {
        echo "read";
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
