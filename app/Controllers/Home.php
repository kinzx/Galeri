<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotoModel;

helper(['user']);
class Home extends BaseController
{
    protected $session; // Tambahkan properti untuk menyimpan referensi sesi

    public function __construct()
    {
        $this->fotoModel = new \App\Models\FotoModel();

        // Meload session
        $this->session = \Config\Services::session(); // Memuat sesi di konstruktor
    }
    public function index(): string
    {
        return view('index');
    }
    public function tambah(): string
    {
        return view('tambah');
    }

    public function tes(): string
    {
        return view('tes');
    }

    public function profile(): string
    {
        return view('profile');
    }

    public function kelolaprofile(): string
    {
        return view('kelola/kelolaprofile');
    }


    public function kelolafoto(): string
    {
        $iduser = $this->session->get('iduser');
    
        // Menyimpan data gambar yang dimiliki oleh pengguna tertentu
        $data['gambarDariDatabase'] = $this->fotoModel->where('iduser', $iduser)->findAll();
    
        return view('kelola/kelolafoto', $data);
    }

}
