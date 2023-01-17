<?php

namespace App\Models;

use CodeIgniter\Model;

class Msuser extends Model
{
    protected $table = 'msuser';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAll()
    {
        return $this->builder->get()->getResultArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
