<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'galleries';
    protected $primaryKey           = 'galId';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['title','date','gal_file'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];



    public function inserted_gallery($gallerydata)
    {
       
        $db  = \Config\Database::connect();
        $res = $db->table('galleries')->insert($gallerydata); 
        echo $db->getLastQuery();
        if(!empty($res)){
            return $res;
        }else{
            return $res;
        }
    }
    public function getGalleries()
    {
        $db    = \Config\Database::connect();
        $query =  $db->table('galleries');
        $res    = $query->get()->getResultArray();
        print_r($res);die;
    }
}
