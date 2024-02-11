<?php

namespace App\Models;

use CodeIgniter\Model;

class LikefotoModel extends Model
{
  protected $table = 'likefoto';
  protected $primaryKey = 'likeid';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $protectFields = true;
  protected $allowedFields = ['idfoto', 'iduser', 'tanggallike'];
  // LikefotoModel.php
  public function like($idfoto)
  {
    $iduser = session()->get('iduser'); // Ambil ID pengguna dari sesi

    $data = [
      'idfoto' => $idfoto,
      'iduser' => $iduser,
      'tanggallike' => date('Y-m-d'),
    ];

    $this->insert($data);
  }

  public function isLiked($iduser, $idfoto)
  {
    // Lakukan query ke database untuk memeriksa apakah pengguna sudah melakukan "like" pada foto ini
    $result = $this->where('iduser', $iduser)
      ->where('idfoto', $idfoto)
      ->first();

    // Jika hasil query ditemukan, berarti pengguna sudah melakukan "like" pada foto ini
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  // Dates
  protected $useTimestamps = false;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';

  // Validation
  protected $validationRules = [];
  protected $validationMessages = [];
  protected $skipValidation = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert = [];
  protected $afterInsert = [];
  protected $beforeUpdate = [];
  protected $afterUpdate = [];
  protected $beforeFind = [];
  protected $afterFind = [];
  protected $beforeDelete = [];
  protected $afterDelete = [];
}
