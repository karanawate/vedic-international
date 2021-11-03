<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'blogs';
    protected $primaryKey           = 'blogId';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];

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


    public function blogInserted($blogaraay)
    {
        $db = \Config\Database::connect();
        $res = $db->table('blogs')->insert($blogaraay);
        if(!empty($res)){
            return $res;
        }else{
            return $res;
        }
    }

    public function getBlogs()
    {
        $db     = \Config\Database::connect();
        $query  = $db->table('blogs');
        $res    = $query->get()->getResultArray();
        if(!empty($res)){
            return $res;
        }else{
            return $res;
        }
    }

    public function editBlog($blogId)
    {
        $db      = \Config\Database::connect();
        $query   = $db->table('blogs');
        $query->where('blogId',$blogId);
        $res     = $query->get()->getResultArray();
        if(!empty($res)){
            return $res;
        }else{
            return $res;
        }
    }



    



















}
