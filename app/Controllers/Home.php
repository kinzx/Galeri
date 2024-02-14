<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotoModel;
use App\Models\AlbumModel;

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
    

    public function tes(): string
    {
        return view('tes');
    }

    public function album()
    {
        if (!session()->has('iduser')) {
            // Jika belum login, atur pesan flash dan redirect ke halaman login
            session()->setFlashdata('error', 'Anda harus login untuk mengakses halaman profile.');
            return redirect()->to('/login');
        }

        $iduser = session()->get('iduser');
        $userModel = new \App\Models\UserModel();
        $userData = $userModel->find($iduser);

        // Ambil data album pengguna
        $albumModel = new \App\Models\AlbumModel();
        $userAlbums = $albumModel->where('iduser', $iduser)->findAll();

        $data['userData'] = $userData;
        $data['userAlbums'] = $userAlbums;
        return view('album', $data);
    }

    public function hapus_album($albumid)
    {
        $this->albumModel->delete($albumid);
        session()->setFlashdata('success', 'Photo deleted successfully.');
        return redirect()->to('/kelolafoto');
    }

    public function profile()
    {
        // Pastikan pengguna telah login
        if (!session()->has('iduser')) {
            // Jika belum login, atur pesan flash dan redirect ke halaman login
            session()->setFlashdata('error', 'Anda harus login untuk mengakses halaman profile.');
            return redirect()->to('/login');
        }

        // Ambil data pengguna
        $iduser = session()->get('iduser');
        $userModel = new \App\Models\UserModel();
        $userData = $userModel->find($iduser);

        // Ambil data album pengguna
        $albumModel = new \App\Models\AlbumModel();
        $userAlbums = $albumModel->where('iduser', $iduser)->findAll();
            

        // Kirim data pengguna dan album ke view
        $data['userData'] = $userData;
        $data['userAlbums'] = $userAlbums;

        return view('profile', $data);
    }



    public function kelolaprofile()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->has('iduser')) {
            // Jika belum login, atur pesan flash dan redirect ke halaman login
            session()->setFlashdata('error', 'Anda harus login untuk mengakses halaman kelola profile.');
            return redirect()->to('/login');
        }

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
            $data['avatar'] = '/' . $newAvatarName; // Perbaikan path gambar
        }

        // Simpan perubahan ke dalam database
        $userModel = new \App\Models\UserModel();
        $iduser = session()->get('iduser');
        $userModel->update($iduser, $data);

        // Redirect kembali ke halaman profil setelah update
        return redirect()->to('/profile')->with('success', 'Profile updated successfully.');
    }
}
