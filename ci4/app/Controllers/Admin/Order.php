<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Order extends BaseController
{
    public function index()
    {
        // paging
        $pager = \Config\Services::pager();

        // Koneksi kedatabase
        $db      = \Config\Database::connect();

        // Membuat perintah sql untuk database
        $sql = "SELECT * FROM vorder";
        $result = $db->query($sql);

        // Untuk menampilkan query
        $row = $result->getResult('array');

        // Membuat var total & tampil
        $total  = count($row);
        $tampil = 4;

        if (isset($_GET['page'])){
            $page = $_GET['page'];
            
            $mulai = ($tampil * $page) - $tampil;
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
        }else{
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
        }

        $result = $db->query($sql);
        $row = $result->getResult('array');

        $data =
        [
            'judul'   => "DATA ORDER PELANGGAN",
            'order'   => $row,
            'pager'   => $pager,
            'perPage' => $tampil,
            'total'   => $total
        ];

        // order : nama var
        // judul : nama var
        
        return view ('order/select', $data);

        // Ciri ciri array -> []
        // echo $row[0]['idorder'];

    }

    public function find($id = null)
    {
        $db      = \Config\Database::connect();

        // Membuat perintah sql untuk database
        $sql = "SELECT * FROM vorder WHERE idorder = $id";
        $result = $db->query($sql);
        // Untuk menampilkan query
        $row = $result->getResult('array');

        $sql = "SELECT * FROM vorderdetail WHERE idorder = $id";
        $result = $db->query($sql);
        // Untuk menampilkan query
        $detail = $result->getResult('array');

        $data =
        [
            'judul'   => "PEMBAYARAN PELANGGAN",
            'order'   => $row,
            'detail'  => $detail
        ];

        return view('order/update',$data);
    }

    public function update()
    {
        // dalam [] sesuai dengan name di form update. update.php
        $idorder = $_POST['idorder'];
        $total   = $_POST['total'];
        $bayar   = $_POST['bayar'];

        if($bayar < $total){
           
            session()->setFlashdata('info', "Pembayaran Kurang!");
            return redirect()->to(base_url("/admin/order/find/$idorder")); 
        }else{
           $kembali = $bayar - $total;
           $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$idorder";
           $db      = \Config\Database::connect();
           $db->query($sql);
           session()->setFlashdata('info', "Pembayaran Berhasil!");
           return redirect()->to(base_url("/admin/order")); 
           
           
        }

     
       
    }
}
