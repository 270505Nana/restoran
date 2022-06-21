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

    protected $validationRules = [
        'user'  => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
        'email'  => 'is_unique[tbluser.email]'

        // isi aturan
        // alpha_numeric_space : hanya boleh alfabet
        // min_length : minimal 3 karakter
        // numeric : hanya angka
        
    ];

    protected $validationMessages = [
        'user'  => ['alpha_numeric_space' => 'Tidak boleh menggunakan simbol',
                        'min_length' => 'Minimal 3 huruf',
                        'is_unique' => 'Ada User yang sama'
                    ],

        'email'  => [
                     'is_unique' => 'Ada Email yang sama'
                    ]
        
    ];
}