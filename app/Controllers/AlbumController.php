<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Albumfoto;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AlbumModel;

class AlbumController extends BaseController
{
    public function create()
    {
        // Pastikan pengguna telah login
        if (!session()->has('iduser')) {
            // Jika belum login, atur pesan flash dan redirect ke halaman login
            session()->setFlashdata('error', 'Anda harus login untuk membuat album.');
            return redirect()->to('/login');
        }

        // Proses form submission untuk membuat album baru
        $albumModel = new AlbumModel();

        $data = [
            'namaalbum' => $this->request->getPost('namaalbum'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'iduser' => session()->get('iduser')
        ];

        $albumModel->insert($data);
        session()->setFlashdata('success', 'Album berhasil ditambahkan.');
        return redirect()->to('/profile');
    }
}
