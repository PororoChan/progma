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
    public function sortable()
    {
        return [
            null,
            'msrole.rolename',
            'cast(msrole.createddate) as varchar',
            'name',
            null,
        ];
    }
    public function datatable()
    {
        return $this->builder
            ->select('msrole.rolename, msrole.createddate, msuser.fullname as name')
            ->join('msuser', 'msuser.userid=msrole.createdby');
    }
    public function getOneByRoleId($roleid)
    {
        return $this->builder
            ->where('roleid', $roleid)
            ->get()->getRowArray();
    }
}
