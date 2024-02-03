<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use Config\App;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->userModel = new UserModel();


        $this->session = \Config\Services::session();
        helper(['form', 'url']);

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }
    public function login()
    {
        return view('auth/login');
    }

    public function valid_login()
    {
        $data = $this->request->getPost();

        // Validasi login
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation->run($data)) {
            session()->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('/login');
        }

        $this->validation->run($data, 'login'); // Jalankan validasi

        $errors = $this->validation->getErrors();

        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('/login');
        }

        $email = $data['email'];
        $password = $data['password'];

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // User ditemukan, verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password benar, set sesi dan redirect ke halaman tertentu
                $this->session->set([
                    'isLogin' => true,
                    'iduser' => $user['iduser'],
                    'username' => $user['username'],
                ]);
                return redirect()->to('/home'); // Ganti dengan halaman yang sesuai
            }
        }

        // Email atau password salah
        session()->setFlashdata('error', 'Email atau password salah');
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function valid_register()
    {
        $data = $this->request->getPost();

        // Validasi input
        $rules = [
            'username' => 'required|alpha_numeric|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/register')->withInput()->with('validation', $this->validator);
        }

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Simpan data ke database
        $this->userModel->save([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $hashedPassword,
        ]);

        session()->setFlashdata('login', 'Registration successful. Please login.');
        return redirect()->to('/login');
    }



    // public function valid_register()
    // {
    //     // Tangkap data dari form
    //     $data = $this->request->getPost();

    //     // Jalankan validasi
    //     $this->validation->run($data, 'register');

    //     // Cek errornya
    //     $errors = $this->validation->getErrors();

    //     // Jika ada error kembalikan ke halaman register
    //     if ($errors) {
    //         session()->setFlashdata('error', $errors);
    //         return redirect()->to('/register');
    //     }

    //     $password = password_hash($data['password'], PASSWORD_BCRYPT); // Hash password

    //     $userModel = new UserModel();

    //     $userModel->save([
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => $password, // Simpan password yang sudah di-hash
    //     ]);

    //     session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
    //     return redirect()->to('/login');
    // }

   




    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/')->with('success', 'Anda berhasil logout.');
    }
}
