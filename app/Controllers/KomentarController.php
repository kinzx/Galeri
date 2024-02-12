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
        $iduser = session()->get('iduser');
        // Mendapatkan ID pengguna dari sesi
        $iduser = $this->session->get('iduser');

        $deskripsi = $this->request->getPost('deskripsi');

        // Menyimpan komentar beserta iduser ke dalam database
        if (!empty($deskripsi)) {
            // Menyimpan komentar beserta iduser ke dalam database
            $this->KomentarfotoModel->insert([
                'fotoid' => $fotoid,
                'deskripsi' => $deskripsi,
                'userid' => $iduser,
            ]);
        } else {
            session()->setFlashdata('error', 'Deskripsi komentar tidak boleh kosong.');

            // Handle kasus di mana deskripsi kosong
            // Misalnya, atur pesan kesalahan dan kembalikan pengguna ke halaman sebelumnya
        }

        // Redirect kembali ke halaman home setelah komentar ditambahkan
        return redirect()->to('/home');
    }

}
