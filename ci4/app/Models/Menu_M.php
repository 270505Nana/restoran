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

    // column mana yang mau diisi sama data
    //column yang boleh diisi
    protected $allowedFields = ['idkategori','menu', 'gambar', 'harga'];

    protected $validationRules = [
        'menu'  => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga'  => 'numeric'
        // tblkategori : nama tabel
        // kategori : nama column yang ga boleh sama isinya

        // isi aturan
        // alpha_numeric_space : hanya boleh alfabet
        // min_length : minimal 3 karakter
        // numeric : hanya angka
        
    ];

    protected $validationMessages = [
        'menu'  => ['alpha_numeric_space' => 'Tidak boleh menggunakan simbol',
                        'min_length' => 'Tidak boleh kurang dari 3 huruf',
                        // 'is_unique' => 'Ada Menu yang sama',
                    ],

        'harga'  => ['numeric' => 'Harus Angka']
        
    ];
}
?>