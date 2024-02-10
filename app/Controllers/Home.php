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
        // Ambil data pengguna dari database
        $iduser = session()->get('iduser');
        $userModel = new \App\Models\UserModel();
        $userData = $userModel->find($iduser);

        // Kirim data ke view
        $data['userData'] = $userData;

        // Tampilkan view dengan data pengguna
        return view('kelola/kelolaprofile', $data);
    }

    public function editProfile()
    {
        // Ambil data dari permintaan POST
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'avatar' => $this->request->getPost('avatar'),
            'namalengkap' => $this->request->getPost('namalengkap')
        ];

        // Periksa apakah ada file yang diunggah
        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            // Pindahkan gambar profil baru ke direktori yang diinginkan
            $newAvatarName = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/uploads/', $newAvatarName);

            // Simpan lokasi gambar profil baru ke dalam data
            $data['avatar'] = 'uploads/' . $newAvatarName; // Perbaikan path gambar
        }

        // Simpan perubahan ke dalam database
        $userModel = new \App\Models\UserModel();
        $iduser = session()->get('iduser');
        $userModel->update($iduser, $data);

        // Redirect kembali ke halaman profil setelah update
        return redirect()->to('/kelolaprofile')->with('success', 'Profile updated successfully.');
    }
}
