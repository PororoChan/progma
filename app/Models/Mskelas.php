<?php

namespace App\Models;

use CodeIgniter\Model;

class Mskelas extends Model
{
    protected $table = 'msclass';
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function sortable()
    {
        return [
            null,
            'title',
            'author',
            'msclass.token',
            'msclass.ishidden',
            'msclass.isactive',
            'cast(msclass.createddate) as varchar',
            null,
        ];
    }
    public function datatable()
    {
        return $this->builder
            ->select('msclass.classtitle as title, msuser.fullname as author, msclass.token, msclass.ishidden, msclass.isactive, msclass.createddate')
            ->join('msuser', 'msuser.userid=msclass.createdby');
    }
    public function cekToken($token)
    {
        return $this->builder
            ->where('token', $token)
            ->get()->getRowArray();
    }
    public function getKelasByGuru()
    {
        return $this->builder
            ->where('isactive', 1)
            ->where('ishidden', 0)
            ->where('createdby', session()->get('userid'));
    }
    public function getOneById($id)
    {
        return $this->builder
            ->join('msuser', 'msuser.userid=msclass.createdby')
            ->where('classid', $id)
            ->get()->getRowArray();
    }
    public function getWithout($cid, $ishidden)
    {
        $q = $this->builder
            ->where('ishidden', $ishidden)
            ->where('classid !=', $cid);
        if (session()->get('role') == 2) {
            $q->where('createdby', session()->get('userid'));
        }
        return $q;
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
