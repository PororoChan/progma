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
    public function sortable()
    {
        return [
            null,
            'msuser.fullname',
            null,
            null,
            'msuser.username',
            'msrole.rolename',
        ];
    }
    public function datatable()
    {
        return $this->builder
            ->select('msuser.userid, msuser.fullname as fullname, msuser.userdata, msuser.username, msrole.rolename')
            ->join('msrole', 'msrole.roleid=msuser.role');
    }
    public function cekUname($username)
    {
        return $this->builder
            ->where('username', $username)
            ->get()->getRowArray();
    }
    public function getCountRoleByRoleid($roleid)
    {
        return $this->builder
            ->where('role', $roleid)
            ->countAllResults();
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
    public function ubah($data, $userid)
    {
        return $this->builder->update($data, ['userid' => $userid]);
    }
    public function hapus($id)
    {
        return $this->builder->delete(['userid' => $id]);
    }
}
