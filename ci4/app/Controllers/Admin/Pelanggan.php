<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Pelanggan extends BaseController
{
    public function index()
    {
        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new Pelanggan_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA PEELANGGAN',
            // 'kategori' => $kategori,
            'pelanggan' => $model_nana->paginate(3, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("Pelanggan/select",$data);
    }
}
