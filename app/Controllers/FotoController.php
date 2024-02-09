<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FotoController extends BaseController
{
    protected $session; // Tambahkan properti untuk menyimpan referensi sesi

    public function __construct()
    {
        $this->fotoModel = new \App\Models\FotoModel();
        $this->likefotoModel = new \App\Models\LikefotoModel();

        // Meload session
        $this->session = \Config\Services::session(); // Memuat sesi di konstruktor
        $this->validation = \Config\Services::validation(); // Load the validation library
    }

    public function uploadForm()
    {
        session(); //Memulai sesi jika belum memulainya
        helper(['form']); // Tambahkan baris ini untuk memuat helper formulir
        $data = [
            'title' => "Upload Foto",
            'validation' => \Config\Services::Validation()
        ];
        return view('upload_form', $data);
    }

    public function upload()
    {
        if (
            !$this->validate([
                'judul' => 'required'
            ])
        ) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/uploadForm')->withInput()->with('validation', $validation);
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

    public function home()
    {
        $komentarModel = new \App\Models\KomentarfotoModel();
        $data['gambarDariDatabase'] = $this->fotoModel->findAll();
        $data['komentar'] = $komentarModel->findAll();
        return view('home', $data);

        return view('home', $data);
    }

    public function kelolafoto()
    {
        $iduser = $this->session->get('iduser');
        $data['gambarDariDatabase'] = $this->fotoModel->where('iduser', $iduser)->findAll();

        // Check if the request is for editing a photo
        if ($this->request->getMethod() === 'post' && $this->request->getPost('action') === 'edit') {
            // Process the edit request
            return $this->editPhoto($data);
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

    public function like($idfoto)
    {
        // Mendapatkan ID pengguna dari sesi
        $iduser = $this->session->get('iduser');

        // Cek apakah pengguna sudah melakukan like sebelumnya
        $existingLike = $this->likefotoModel->where(['fotoid' => $idfoto, 'iduser' => $iduser])->first();

        // Jika pengguna telah melakukan like sebelumnya, hapus like tersebut (dislike)
        if ($existingLike) {
            $this->likefotoModel->delete($existingLike['likeid']);
            return redirect()->back()->with('success', 'Photo disliked successfully.');
        }

        // Tambahkan data like baru ke dalam tabel likefoto
        $data = [
            'fotoid' => $idfoto,
            'iduser' => $iduser,
            'tanggallike' => date('Y-m-d H:i:s')
        ];
        $this->likefotoModel->insert($data);

        // Alihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Photo liked successfully.');
    }

}
