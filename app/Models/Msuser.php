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
    public function checkUser($username)
    {
        return $this->builder
            ->where('username', $username)
            ->get()->getRowArray();
    }
    public function getOne($userid)
    {
        return $this->builder
            ->where('userid', $userid)
            ->get()->getRowArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
