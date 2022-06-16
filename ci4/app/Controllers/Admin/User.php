<?php namespace App\Controllers\Admin;
// Untuk lokasi si controllers nya itu ada dimana
// Karena ini dimasukin ke dalam folder lagi
// ada admin dan front

// posisinya
//kalo di ci 3 gapake app\controller

use App\Controllers\BaseController;
class User extends BaseController
{
    // var
    protected $session = null;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        echo "user";
    }

    public function create()
    {
        $tbluser = [
            'user'  => 'Nana',
            'email' => 'nana@gmail.com',
            'level' => 'Programmer'
        ];

        $this->session->set($tbluser);
    }

   public function read()
   {
    $session = \Config\Services::session();
    echo $this->session->get('user');
    echo"<br>";
    echo $this->session->get('email');
    echo"<br>";
    echo $this->session->get('level'); 
   }

   public function delete()
   {
    $this->session->remove('email');
   }

   public function destroy()
   {
    $session->destroy;
   }
}
