<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\Gedung_model;
use App\Models\Ruangan_model;
use App\Models\Akun_model;
use CodeIgniter\Validation\Rules;

class ManajemenUser extends BaseController
{
    public function __construct()
    {
        helper('html');
        $this->akun = new Akun_model();
    }
    // public function index(){

    //     $data = [
    //         "title" => "Manajemen user",
    //         "akuns" => $this->akun->get_akun(),
    //     ];
    //     // var_dump($data);
    //     return view('manajemenuser',$data);

    // }
    public function index()
    {
        // Cek session role
        $session = session();
        $role = $session->get('role');

        if ($role !== 'super admin') {
            // Jika bukan super admin, redirect ke laman dashboard
            return redirect()->to('/home');
        }

        // Jika super admin, lanjutkan dengan pemrosesan
        $data = [
            "title" => "Manajemen user",
            "akuns" => $this->akun->get_akun(),
        ];

        return view('manajemenuser', $data);
    }
    // public function createuser(){
    //     $data = [
    //         "title" => "create user",
    //         // "akuns" => $this->akun->get_akun(),
    //     ];
    //     return view('createuser',$data);

    // }
    public function createuser()
    {
        // Cek session role
        $session = session();
        $role = $session->get('role');

        if ($role !== 'super admin') {
            // Jika bukan super admin, redirect ke laman home
            return redirect()->to('/home');
        }

        // Jika super admin, lanjutkan dengan pemrosesan
        $data = [
            "title" => "create user",
            // "akuns" => $this->akun->get_akun(),
        ];

        return view('createuser', $data);
    }
    public function tambah()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to(base_url('auth'));
        }
        $gedung['title'] = 'Tambah Gedung Baru';

        $gedung['flash'] = $this->session->getFlashdata('add_new_product_flash');
        // $gedung['categories'] = $this->gedung->get_all_categories();

        return view('gedung/add_new_gedung', $gedung);
    }
    public function add_user()
    {

        $akun = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => 'admin'
        ];

        $this->akun->add_akun($akun);
        // var_dump($akun);
        // $this->session->setFlashdata('add_new_product_flash', 'Produk baru berhasil ditambahkan!');

        return redirect()->to(base_url('manajemenuser'));
        // }
    }
    public function hapus($id = 0)
    {
        // if (!session()->get('logged_in')) {
        //     // maka redirct ke halaman login
        //     return redirect()->to(base_url('auth'));
        // }
        $this->akun->delete_user($id);

        return redirect()->to(base_url('manajemenuser'));
    }
}
