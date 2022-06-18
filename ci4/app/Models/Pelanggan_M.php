<?php 
namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_M extends Model
// Class = nama file
{
    protected $table = 'tblpelanggan';
    // nama table yang digunakan

    protected $allowedFields = ['aktif'];
    // untuk hapus data akses primary key
    protected $primaryKey = 'idpelanggan';
}
?>