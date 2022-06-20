<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
// pemanggilan model kategori
use App\Models\OrderDetail_M;


class OrderDetail extends BaseController
{
    public function index()
    {
        
        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new OrderDetail_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA RINCIAN ORDER',
            // 'kategori' => $kategori,
            'orderdetail' => $model_nana->paginate(2, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("orderdetail/select",$data);
    }

    public function cari()
    {
        if (isset($_POST['awal'])) {
            $awal = $_POST['awal'];
            $sampai = $_POST['sampai'];

            $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$sampai'";
            
             // Koneksi kedatabase
            $db      = \Config\Database::connect();
            $result = $db->query($sql);
            // Untuk menampilkan query
            $row = $result->getResult('array');

            $data = [
                'judul' => 'DATA RINCIAN ORDER',
                // 'kategori' => $kategori,
                'orderdetail' => $row
            
            ];

            return view ("orderdetail/cari",$data);

        } 
    }
}
