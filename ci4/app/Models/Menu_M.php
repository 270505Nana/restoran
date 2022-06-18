<?php 
namespace App\Models;
use CodeIgniter\Model;

class Menu_M extends Model
// Class = nama file
{
    protected $table = 'tblmenu';
    // nama table yang digunakan   

    // untuk hapus & update data akses primary key
    protected $primaryKey = 'idmenu';
}
?>