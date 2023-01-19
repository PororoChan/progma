<?php

namespace App\Models;

use CodeIgniter\Model;

class Msrole extends Model
{
    protected $table = 'msrole';
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getOneByRoleId($roleid)
    {
        return $this->builder
            ->where('roleid', $roleid)
            ->get()->getRowArray();
    }
}
