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
            ->select('msclass.classtitle as title, msclass.classauthor, msuser.fullname as author, msclass.token, msclass.ishidden, msclass.isactive, msclass.createddate')
            ->join('msuser', 'msuser.userid=msclass.classauthor');
    }
}
