<?php 
namespace App\Models;
use CodeIgniter\Model;

class Kategori_M extends Model
// Class = nama file
{
    protected $table = 'tblkategori';
    // nama table yang digunakan

    protected $allowedFields = ['kategori','keterangan'];

    // untuk hapus data akses primary key
    protected $primaryKey = 'idkategori';
}
?>