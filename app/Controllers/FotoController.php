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
<<<<<<< Updated upstream
        // $validationRules = [
        //     'judul' => 'required',
        //     'lokasifile' => [
        //         'uploaded[lokasifile]',
        //         'max_size[lokasifile,1024]', // Maksimal 1 MB
        //         'mime_in[lokasifile,image/jpg,image/jpeg,image/png]', // Hanya izinkan tipe file gambar
        //     ],
        // ];


<<<<<<< Updated upstream
        // $this->validator->setRules($validationRules);
=======
>>>>>>> Stashed changes

        // if (!$this->validate($this->request, $validationRules)) {
        //     return redirect()->back()->withInput()->with('validation', $this->validator);
        // }
=======
>>>>>>> Stashed changes

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
        return view('welcome_message', $data);

        return view('home', $data);
    }
    public function delete($idfoto)
    {
        $this->fotoModel->delete($idfoto);
        return redirect()->to('/kelolafoto');
    }
    
}
