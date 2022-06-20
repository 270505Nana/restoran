<?php 
namespace App\Models;
use CodeIgniter\Model;

class User_M extends Model
// Class = nama file
{
    protected $table = 'tbluser';
    // nama table yang digunakan
    
    protected $allowedFields = ['user','email','password','level','aktif'];

    // untuk hapus data akses primary key
    protected $primaryKey = 'iduser';


}
