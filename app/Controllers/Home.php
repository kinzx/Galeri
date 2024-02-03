<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotoModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view ('index');
    }

    public function kelola(): string
    {
        return view('kelolaprofile');
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

    
    public function kelolafoto(): string
    {
        return view('kelolafoto');
    }

    
}
