<?php

namespace App\Models;

use CodeIgniter\Model;

class RegModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'regs';
    protected $primaryKey           = 'reg_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['email','name','password'];

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

public function RegisterSubmit($insertedData)
{
    $db = \Config\Database::connect();
    $db->table('regs')->insert($insertedData);    
        if(!empty($res)){
            return $res;
        }else{
            return $res;
        }
}

public function check_exit_admin($email, $password)
{
    $db         = \Config\Database::connect();
    $lgquery    = $db->table('regs');
    $lgquery->where('email', $email);
    $lgquery->where('password', $password);
    $res        = $lgquery->get()->getResultArray();
    if(!empty($res))
    {
        return $res;
    }else{
        return $res;
    }
}

public function getdata()
{
    $db    = \Config\Database::connect();
    $query = $db->table('reg');
    $res   = $query->get()->getResultArray();

}









}


