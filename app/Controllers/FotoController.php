<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotoModel;
use App\Models\KomentarfotoModel;
use App\Models\AlbumModel;
use App\Models\AlbumfotoModel;

class FotoController extends BaseController
{
    protected $session; // Tambahkan properti untuk menyimpan referensi sesi

    public function __construct()
    {
        $this->fotoModel = new \App\Models\FotoModel();
        $this->userModel = new \App\Models\UserModel();
        $this->albumModel = new \App\Models\AlbumModel();
        $this->albumfotoModel = new \App\Models\AlbumfotoModel();
        $this->likeModel = new \App\Models\LikefotoModel();


        $this->session = \Config\Services::session(); // Memuat sesi di konstruktor
        $this->validation = \Config\Services::validation(); // Load the validation library
    }




    public function uploadForm()
    {
        // Ambil ID pengguna dari sesi
        $iduser = session()->get('iduser');

        // Pastikan ID pengguna tersedia sebelum mencari data pengguna
        if ($iduser) {
            $userModel = new \App\Models\UserModel();
            $userData = $userModel->find($iduser);

            // Kirim data ke view
            $data['userData'] = $userData;
            session(); //Memulai sesi jika belum memulainya

            return view('upload_form', $data);
        } else {
            // Handle jika ID pengguna tidak tersedia
            // Misalnya, redirect pengguna ke halaman login
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman upload gambar');
        }
    }

    public function upload()
    {

        if (
            !$this->validate([
                'judul' => 'required'
            ])
        ) {
            return redirect()->to('/uploadForm')->withInput()->with('error', 'Photo uploaded failed.');
        }

        // Handle file upload
        $lokasifile = $this->request->getFile('lokasifile');

        $newName = null;
        if ($lokasifile && $lokasifile->isValid() && !$lokasifile->hasMoved()) {
            $newName = $lokasifile->getRandomName();
            $lokasifile->move(ROOTPATH . 'public/uploads/', $newName);
        }

        // Save to the database
        $fotoModel = new \App\Models\FotoModel();
        $data = [
            'iduser' => $this->session->get('iduser'),
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggalunggahan' => date('Y-m-d'),
            'lokasifoto' => $newName,
            // 'iduser' => $this->session->get('iduser'), // Memastikan 'iduser' sudah diset
        ];

        $fotoModel->insert($data);

        return redirect()->to('/uploadForm')->with('success', 'Photo uploaded successfully.');
    }


    public function like($idfoto)
    {
        $iduser = session()->get('iduser');

        // Periksa apakah pengguna sudah melakukan "like" pada foto ini
        $isLiked = $this->likeModel->isLiked($iduser, $idfoto);


        // Jika pengguna belum melakukan "like", tambahkan "like" ke dalam database
        if (!$isLiked) {
            $this->likeModel->like($iduser, $idfoto);
        }

        // Redirect kembali ke halaman home
        return redirect()->to('/home');
    }

    



    public function home()
    {
        if (!session()->has('iduser')) {
            // Jika belum login, atur pesan flash dan redirect ke halaman login
            session()->setFlashdata('error', 'Anda harus login untuk mengakses halaman.');
            return redirect()->to('/login');
        }

        $iduser = session()->get('iduser');
        $userData = $this->userModel->find($iduser);

        // Mendapatkan data foto dari model
        $komentarModel = new KomentarfotoModel();
        $fotoModel = new FotoModel();
        $gambarDariDatabase = $fotoModel->getFotoWithUser();
        $komentar = $komentarModel->getKomentarWithAvatar(); // Ambil komentar dengan avatar

        // Mendapatkan data album pengguna
        $albumModel = new \App\Models\AlbumModel();
        $userAlbums = $albumModel->where('iduser', $iduser)->findAll();

        // Mendapatkan status "like" untuk setiap foto
        $isLikedArray = [];
        foreach ($gambarDariDatabase as $gambar) {
            $isLiked = $this->likeModel->isLiked($iduser, $gambar['idfoto']);
            $isLikedArray[$gambar['idfoto']] = $isLiked;
        }

        // Mengirimkan data ke view
        $data = [
            'userAlbums' => $userAlbums,
            'gambarDariDatabase' => $gambarDariDatabase,
            'userData' => $userData,
            'komentar' => $komentar, // Kirim data komentar ke view
            'isLikedArray' => $isLikedArray
        ];

        // var_dump($gambarDariDatabase);
        // die;
        return view('home', $data);
    }

    public function detailpost()
    {

    }

    public function simpanFoto()
    {
        // Ambil data yang dikirim dari formulir
        $idfoto = $this->request->getPost('idfoto');
        $albumid = $this->request->getPost('albumid');

        // Periksa ketersediaan album untuk pengguna yang sedang login
        $albumModel = new AlbumModel();
        $album = $albumModel->find($albumid);

        if (!$album || $album['iduser'] != session()->get('iduser')) {
            // Album tidak ditemukan atau bukan milik pengguna yang sedang login
            // Tampilkan pesan error dan redirect kembali ke halaman home
            session()->setFlashdata('error', 'Album tidak valid.');
            return redirect()->to('/home');
        }

        // Periksa ketersediaan foto yang dipilih
        $fotoModel = new FotoModel();
        $foto = $fotoModel->find($idfoto);

        if (!$foto) {
            // Foto tidak ditemukan
            // Tampilkan pesan error dan redirect kembali ke halaman home
            session()->setFlashdata('error', 'Foto tidak valid.');
            return redirect()->to('/home');
        }

        // Lakukan proses penyimpanan foto ke dalam album
        $albumfotoModel = new AlbumfotoModel();
        $data = [
            'iduser' => session()->get('iduser'),
            'idfoto' => $idfoto,
            'albumid' => $albumid,
            // Tambahkan kolom lain sesuai kebutuhan (misalnya, tanggal pembuatan)
        ];

        // Simpan data ke dalam tabel albumfoto menggunakan model AlbumfotoModel
        $albumfotoModel->insert($data);

        // Berikan feedback ke pengguna bahwa foto berhasil disimpan ke dalam album
        session()->setFlashdata('success', 'Foto berhasil disimpan ke dalam album.');
        return redirect()->to('/home');
    }

    

    // public function kelolafoto()
    // {
    //     $userModel = new \App\Models\UserModel();
    //     $userData = $userModel->find($iduser);

    //     // Kirim data ke view
    //     $data['userData'] = $userData;
    //     $iduser = $this->session->get('iduser');
    //     $data['gambarDariDatabase'] = $this->fotoModel->where('iduser', $iduser)->findAll();

    //     // Check if the request is for editing a photo
    //     if ($this->request->getMethod() === 'post' && $this->request->getPost('action') === 'edit') {
    //         // Process the edit request
    //         return $this->editPhoto($data);
    //     }

    //     return view('kelola/kelolafoto', $data);
    // }

    public function kelolafoto()
    {
        // Ambil ID pengguna dari sesi
        $iduser = $this->session->get('iduser');

        // Pastikan ID pengguna tersedia sebelum mencari data pengguna
        if ($iduser) {
            $userModel = new \App\Models\UserModel();
            $userData = $userModel->find($iduser);

            // Kirim data pengguna ke view
            $data['userData'] = $userData;

            // Ambil gambar dari database berdasarkan ID pengguna
            $data['gambarDariDatabase'] = $this->fotoModel->where('iduser', $iduser)->findAll();

            // Kirim data ke view
            return view('kelola/kelolafoto', $data);
        } else {
            // Handle jika ID pengguna tidak tersedia
            // Misalnya, redirect pengguna ke halaman login
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman Kelola foto');
        }
        return view('kelola/kelolafoto', $data);
    }


    public function delete($idfoto)
    {
        $this->fotoModel->delete($idfoto);
        session()->setFlashdata('success', 'Photo deleted successfully.');
        return redirect()->to('/kelolafoto');
    }

    public function edit($idfoto)
    {
        // Ambil data dari permintaan POST
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');

        // Perbarui data foto dalam database
        $fotoModel = new \App\Models\FotoModel();
        $data = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        ];

        $fotoModel->update($idfoto, $data);

        session()->setFlashdata('success', 'Photo updated successfully.');

        // Redirect kembali ke halaman kelolafoto setelah pengeditan
        return redirect()->to('/kelolafoto')->with('success', 'Photo updated successfully.');
    }
}
