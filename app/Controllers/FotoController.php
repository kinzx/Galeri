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
    }

    public function uploadForm()
    {
        helper(['form']); // Tambahkan baris ini untuk memuat helper formulir
        return view('upload_form');
    }

    public function upload()
    {
        // Validate the form data
        $validationRules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasifile' => 'uploaded[lokasifile]|max_size[lokasifile,1024]|mime_in[lokasifile,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
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
        $data['gambarDariDatabase'] = $this->fotoModel->findAll();

        return view('welcome_message', $data);
    }
}
