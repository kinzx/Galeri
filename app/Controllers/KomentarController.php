<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KomentarfotoModel;

class KomentarController extends BaseController
{
    public function __construct()
    {

        // Inisialisasi KomentarfotoModel
        $this->KomentarfotoModel = new KomentarfotoModel();

        // Meload session
        $this->session = \Config\Services::session(); // Memuat sesi di konstruktor
    }

    public function tambahkomentar($fotoid)
    {
        $data = $this->request->getPost();
        $this->KomentarfotoModel->insert([
            'fotoid' => $fotoid,
            'deskripsi' => $data['deskripsi'],
            'tanggalunggahan' => date('Y-m-d H:i:s'),
            'iduser' => $this->session->get('iduser'),
        ]);

        return redirect()->to('/home');
    }

}
