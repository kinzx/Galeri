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

    public function delete($idfoto)
    {
        $this->fotoModel->delete($idfoto);
        return redirect()->to('/kelolafoto');
    }

    public function edit($idfoto)
    {
        // Ambil data dari permintaan POST
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');

        // Validasi data jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/kelolafoto')->withInput()->with('validation', $validation);
        }

        // Periksa apakah ada file gambar yang diunggah
        $lokasifoto = $this->request->getFile('lokasifoto');
        if ($lokasifoto !== null) {
            if ($lokasifoto->isValid() && !$lokasifoto->hasMoved()) {
                // Handle file upload
                $lokasifotoName = $lokasifoto->getRandomName();
                $lokasifoto->move(ROOTPATH . 'public/uploads/', $lokasifotoName);
            } else {
                // File tidak valid, lakukan penanganan error di sini jika diperlukan
                return redirect()->to('/kelolafoto')->with('error', 'Invalid file uploaded.');
            }
        } else {
            // File tidak diunggah, lakukan penanganan error di sini jika diperlukan
            return redirect()->to('/kelolafoto')->with('error', 'No file uploaded.');
        }

        // Perbarui data foto dalam database
        $fotoModel = new \App\Models\FotoModel();
        $data = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'lokasifoto' => $lokasifotoName // Gunakan nama file yang baru jika diunggah
            // tambahkan kolom lain yang ingin diperbarui
        ];

        $fotoModel->update($idfoto, $data);

        // Redirect kembali ke halaman kelolafoto setelah pengeditan
        return redirect()->to('/kelolafoto')->with('success', 'Photo updated successfully.');
    }


}
