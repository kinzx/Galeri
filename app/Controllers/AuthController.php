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
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!$validation->run($data)) {
            session()->setFlashdata('error', ' username atau password salah');
            return redirect()->to('/login');
        }


        $errors = $this->validation->getErrors();

        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('/login');
        }

        $username = $data['username'];
        $password = $data['password'];

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

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
        session()->setFlashdata('error', 'username atau password salah');
        return redirect()->to('/login');
    }




    public function register()
    {
        return view('auth/register');
    }

    public function valid_register()
    {

        // $validation = \Config\Services::validation();
        // $validation->setRules([
        //     'username' => 'required|alpha_numeric|min_length[3]|max_length[255]',
        //     'email' => 'required|valid_email|is_unique[user.email]',
        //     'password' => 'required|min_length[8]',
        // ]);

        // // Melakukan validasi terhadap data yang diterima
        // if (!$validation->run($data)) {
        //     // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
        //     session()->setFlashdata('error', $validation->getErrors());
        //     return redirect()->to('/register');
        // }

        // Tangkap data dari form 
        $data = $this->request->getPost();

        // Jalankan validasi
        $this->validation->run($data, 'register');

        // Cek errornya
        $errors = $this->validation->getErrors();

        // Jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('register');
        }
        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Simpan data ke database
        $this->userModel->save([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $hashedPassword,
        ]);

        session()->setFlashdata('login', 'Pendaftaran berhasil. Silakan login.');
        return redirect()->to('/login');
    }






    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/')->with('success', 'Anda berhasil logout.');
    }
}
