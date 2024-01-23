<?php

namespace App\Controllers;

class Home extends BaseController
{
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

    public function home(): string
    {
        return view('welcome_message');
    }

    public function register(): string
    {
        return view('register');
    }

    public function login(): string
    {
        return view('login');
    }
}
