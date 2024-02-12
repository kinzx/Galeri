<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotoModel;

class FotoController extends BaseController
{
    protected $session; // Tambahkan properti untuk menyimpan referensi sesi

    public function __construct()
    {
        $this->fotoModel = new \App\Models\FotoModel();
        $this->userModel = new \App\Models\UserModel();
        // $this->likefotoModel = new \App\Models\LikefotoModel();
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
        $fotoModel = new FotoModel();
        $gambarDariDatabase = $fotoModel->getFotoWithUser();

        // echo "<pre>" ;
        // print_r($data['gambarDariDatabase']);
        // echo "</pre>" ;
        // die;
        // Membuat array untuk menyimpan status "like" untuk setiap foto
        $isLikedArray = [];

        // Mendapatkan status "like" untuk setiap foto
        foreach ($gambarDariDatabase as $gambar) {
            // Memeriksa apakah pengguna sudah melakukan "like" pada foto ini
            $isLiked = $this->likeModel->isLiked($iduser, $gambar['idfoto']);
            $isLikedArray[$gambar['idfoto']] = $isLiked;
        }

        // Mendapatkan data komentar dari model
        $komentarModel = new \App\Models\KomentarfotoModel();
        $komentar = $komentarModel->findAll();

        // Mengirimkan data ke view
        $data = [
            'gambarDariDatabase' => $gambarDariDatabase,
            'userData' => $userData,
            'komentar' => $komentar,
            'isLikedArray' => $isLikedArray // Menyimpan status "like" untuk setiap foto
        ];

        return view('home', $data);
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
