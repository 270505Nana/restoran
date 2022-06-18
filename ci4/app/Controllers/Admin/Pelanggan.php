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

    public function delete($id = null)
    {
        $model_nana = new Pelanggan_M();
        $model_nana->delete($id);
        return redirect()->to(base_url("/admin/pelanggan")); 
    }

    public function update($id = null, $isi=1)
    {
      
        $model_nana = new Pelanggan_M();

        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }
        
        $data = 
        [
            'aktif'  => $isi
        ];

        $model_nana->update($id, $data);
        return redirect()->to(base_url("/admin/pelanggan")); 
    }
}
