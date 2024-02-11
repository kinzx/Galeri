<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LikeModel;

class LikeController extends Controller
{
    public function like($idfoto)
    {
        $iduser = session()->get('iduser');

        $likeModel = new LikeModel();
        $likeModel->like($iduser, $idfoto);

        return redirect()->back();
    }

    public function unlike($idfoto)
    {
        $iduser = session()->get('iduser');

        $likeModel = new LikeModel();
        $likeModel->unlike($iduser, $idfoto);

        return redirect()->back();
    }

    // Method untuk mengecek apakah pengguna sudah melakukan like pada suatu postingan
    public function checkLikeStatus($idfoto)
    {
        $iduser = session()->get('iduser');

        $likeModel = new LikeModel();
        $isLiked = $likeModel->isLiked($iduser, $idfoto);

        return $isLiked; // Mengembalikan nilai true atau false
    }
}
