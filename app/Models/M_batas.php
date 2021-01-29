<?php

namespace App\Models;

use CodeIgniter\Model;

class M_batas extends Model
{
    protected $table = 'tbl_batas';
    protected $returnType = 'object';
    // protected $allowedFields = [];

    public function search($keyword)
    {
        return $this->like('nama', $keyword)->orLike('jenis', $keyword);
    }
}
// $builder->like('title', 'match');
// $builder->like('body', 'match');
