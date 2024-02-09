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
        // Mendapatkan data dari POST request
        $data = $this->request->getPost();
        $iduser = session()->get('iduser');
        // Mendapatkan ID pengguna dari sesi
        $iduser = $this->session->get('iduser');

        // Menyimpan komentar beserta iduser ke dalam database
        $this->KomentarfotoModel->insert([
            'fotoid' => $fotoid,
            'deskripsi' => $data['deskripsi'],
            'tanggalunggahan' => date('Y-m-d H:i:s'),
            'iduser' => $iduser,
        ]);

        // Redirect kembali ke halaman home setelah komentar ditambahkan
        return redirect()->to('/home');
    }

}
