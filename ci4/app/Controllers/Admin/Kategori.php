<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

//pemanggilan controller
use App\Controllers\BaseController;

// pemanggilan model kategori
use App\Models\Kategori_M;

class Kategori extends BaseController
// Biasanya di ci 3
// extends CI_Controller

{
    public function index()
    {
        echo "Belajar CI3";
    }

    public function read(){

        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new Kategori_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA KATEGORI',
            // 'kategori' => $kategori,
            'kategori' => $model_nana->paginate(2, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("Kategori/select",$data);
    }

    // public function selectWhere($id = null){
    //     echo "Menampilkan data yang dipilih";
    // }

    public function create(){
        return view ("kategori/insert");
    }

    public function insert(){

        // membuat object
        $model = new Kategori_M();

        if($model -> insert($_POST) === false){
            $error = $model->errors();
            // membuat session flashdata
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/create")); 
        }else{
            return redirect()->to(base_url("/admin/kategori")); 
        }
        // function insert suadah bawaan dari CI
        // insert -> mengirim data ke database dengan parameter$_POST
        // sesuai dengan method form yang kita pakai = post

       
    }

    public function find($id = null){

        $model = new Kategori_M();
        $kategori = $model->find($id);

        $data = [
            'judul' => 'UPDATE DATA',
            'kategori' => $kategori
        ];
        return view("kategori/update", $data);
    }

    public function update(){

       // membuat objek
       $model = new Kategori_M();
       $id = $_POST['idkategori'];

       //save : function save update data dari CI

       if ($model -> save($_POST) === false) {

            $error = $model->errors();
            // membuat session flashdata
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/find/$id")); 
       }else{
            return redirect()->to(base_url("/admin/kategori")); 
       }
    }

    public function delete($id = null)
    {
        // membuat object
        $model = new Kategori_M();
        $model -> delete($id);

        return redirect()->to(base_url("/admin/kategori")); 
    }
}
