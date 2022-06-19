<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Order extends BaseController
{
    public function index()
    {
        // Koneksi kedatabase
        $db      = \Config\Database::connect();

        // Membuat perintah sql untuk database
        $sql = "SELECT * FROM vorder ORDER BY status ASC";
        
        $result = $db->query($sql);

        // Untuk menampilkan query
        $row = $result->getResult('array');
        $data =
        [
            'judul' => "DATA ORDER PELANGGAN",
            'order' => $row
        ];

        // order : nama var
        
        return view ('order/select', $data);

        // Ciri ciri array -> []
        // echo $row[0]['idorder'];

    }
}
