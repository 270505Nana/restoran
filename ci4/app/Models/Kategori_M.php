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

    protected $validationRules = [
        'kategori'  => 'alpha_numeric_space|min_length[3]|is_unique[tblkategori.kategori]'
        // tblkategori : nama tabel
        // kategori : nama column yang ga boleh sama isinya

        // isi aturan
        // alpha_numeric_space : hanya boleh alfabet
        // min_length : minimal 3 karakter
        
    ];

    protected $validationMessages = [
        'kategori'  => ['alpha_numeric_space' => 'Tidak boleh menggunakan simbol',
                        'min_length' => 'Tidak boleh kurang dari 3 huruf',
                        'is_unique' => 'Ada data yang sama'
                        ]
    ];
}
?>