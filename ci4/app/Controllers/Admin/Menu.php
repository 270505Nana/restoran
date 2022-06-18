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
        $pager = \Config\Services::pager();

       if(isset($_GET['idkategori'])){
        $id = $_GET['idkategori'];

        // membuat object
        $model = new Menu_M();
        $jumlah = $menu = $model->where('idkategori', $id)->findAll();
        $count = count($jumlah);
        $tampil = 3;
        $mulai = 0;
        // idkategori  : column yang ingin dicari
        //ini mencari sesuai id kategori

        if (isset($_GET['page'])){
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
        }

        $menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);




        $data = [
            'judul' => 'DATA PENCARIAN MENU',
            // 'kategori' => $kategori,
            'menu'  => $menu,
            'pager' => $pager,
            'tampil'=> $tampil,
            'total' => $count
        ];
    
        return view ("menu/cari",$data);
       }
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

    public function delete($id = null)
    {
        // membuat object
        $model = new Menu_M();
        $model -> delete($id);

        return redirect()->to(base_url("/admin/menu")); 
    }
}
