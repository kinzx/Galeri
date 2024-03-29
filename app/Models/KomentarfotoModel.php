<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarfotoModel extends Model
{
    protected $table = 'komentarfoto';
    protected $primaryKey = 'komentarid';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['fotoid', 'deskripsi', 'userid'];
    public function getKomentarByFotoId($fotoid)
    {
        return $this->where('fotoid', $fotoid)->findAll();

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


    public function getKomentarWithAvatar()
    {
        return $this->db->table('komentarfoto')
            ->select('komentarfoto.*, user.avatar, user.username') // Menambahkan field username
            ->join('user', 'user.iduser = komentarfoto.userid')
            ->get()
            ->getResultArray();
    }
}
