<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotoModel;
use App\Models\AlbumModel;
use App\Models\AlbumfotoModel;

helper(['user']);
class Home extends BaseController
{

    protected $session; // Tambahkan properti untuk menyimpan referensi sesi

    public function __construct()
    {
        $this->fotoModel = new \App\Models\FotoModel();
        $this->albumModel = new \App\Models\AlbumModel();
        $this->albumfotoModel = new \App\Models\AlbumfotoModel();
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
        $albumid = $this->request->getGet('id'); // Ambil nilai id dari URL

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
        // Ambil detail album berdasarkan albumid yang diberikan
        $album = $albumModel->find($albumid);

        // Periksa apakah album ditemukan dan milik pengguna yang sedang login
        if (isset($album['iduser']) && $album['iduser'] != $iduser) {
            // Album tidak ditemukan atau bukan milik pengguna yang sedang login
            // Tampilkan pesan error dan redirect kembali ke halaman album
            session()->setFlashdata('error', 'Album tidak valid atau Anda tidak memiliki akses ke album ini.');
            return redirect()->to('/album');
        }



        // Ambil data album pengguna
        $albumModel = new \App\Models\AlbumModel();
        // Ambil data gambar dalam album dari tabel albumfoto
        $albumfotoModel = new \App\Models\AlbumfotoModel();
        $gambarAlbum = $albumfotoModel->where('albumid', $albumid)->findAll();

        $fotoModel = new FotoModel();
        $gambarDariDatabase = $fotoModel->getFotoWithUser();

        // Kirim data album dan gambar-gambar dalam album ke view
        $data['userData'] = $userData;
        $data['gambarDariDatabase'] = $gambarDariDatabase;
        $data['album'] = $album;
        $data['gambarAlbum'] = $gambarAlbum;

        // echo "<pre>";
        // print_r($data['userData']);
        // echo "</pre>";
        return view('album', $data);
    }

    public function hapusFoto($albumfotoid)
    {
        // Buat instance AlbumfotoModel
        $albumfotoModel = new AlbumfotoModel();

        // Pastikan pengguna telah login
        $albumfotoModel->delete($albumfotoid);
        session()->setFlashdata('success', 'Photo deleted successfully.');
        return redirect()->to('/profile');
    }

    // Lakukan proses penghapusan foto dari album


    public function hapus_album($albumid)
    {
        // Hapus entri album itu sendiri
        $this->albumModel->delete($albumid);
        session()->setFlashdata('error', 'Album berhasil dihapus.');
        return redirect()->to('/profile');
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
