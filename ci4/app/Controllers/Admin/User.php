<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;
// pemanggilan model kategori
use App\Models\User_M;

class User extends BaseController
{
    public function index()
    {
        // Pagination
        $pager = \Config\Services::pager();

        // membuat object
        $model_nana = new User_M();
        // $kategori = $model_nana -> findAll();
        // findAll : fungsi dari CI
        
        $data = [
            'judul' => 'DATA USER',
            // 'kategori' => $kategori,
            'user' => $model_nana->paginate(2, 'page'),
            'pager' => $model_nana->pager,
        
        ];
    
        return view ("user/select",$data);
    }

    public function create()
    {
       $data = 
       [
        'level' => ['Admin','Koki','Kasir']
       ];

       return view ("user/insert",$data);
    }

    public function insert()
    {
     

        if (isset($_POST['password'])) {
            
           $data = 
           [
                'user'     => $_POST['user'],
                'email'    => $_POST['email'],
                'password' => $_POST['password'],
                'level'    => $_POST['level'],
                'aktif'    => 1
           ];

            // membuat object
            $model = new User_M();

            if ( $model -> insert($data) === false) {
            $error = $model->errors();
            // membuat session flashdata
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/user/create")); 
            } else {
            return redirect()->to(base_url("/admin/user")); 
            }
        } 
      
        // function insert suadah bawaan dari CI
        // insert -> mengirim data ke database dengan parameter$_POST
        // sesuai dengan method form yang kita pakai = post
    }

    public function update($id = null, $isi=1)
    {
      
        $model_nana = new User_M();

        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }
        
        $data = 
        [
            'aktif'  => $isi
        ];

        $model_nana->update($id, $data);
        return redirect()->to(base_url("/admin/user")); 
    }

    public function delete($id = null)
    {
        // membuat object
        $model = new User_M();
        $model -> delete($id);

        return redirect()->to(base_url("/admin/user")); 
    }

    public function find($id = null){

        $model = new User_M();
        $user = $model->find($id);

        $data = [
            'judul' => 'UPDATE DATA USER',
            'user' => $user,
            'level' => ['Admin','Koki','Kasir']
        ];
        return view("user/update", $data);
    }

    public function update_user()
    {
        $id = $_POST['iduser'];
        $data = 
        [
            'email' => $_POST['email'],
            'level' => $_POST['level']
        ];
        $model = new User_M();

        $model->update($id,$data);
        return redirect()->to(base_url("/admin/user")); 
    }
}
