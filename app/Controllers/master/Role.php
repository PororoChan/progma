<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Helpers\Datatables\Datatables;
use App\Models\Msrole;

class Role extends BaseController
{
    public function index()
    {
        $data = [
            'datas' => $this->user,
            'roles' => $this->role,
            'title' => 'Menu Role - ProgMa',
        ];
        return view('master/role/v_role', $data);
    }

    public function getRoles()
    {
        $res = [];
        $roles = $this->role->getAllRole();
        foreach ($roles as $r) {
            $res[] = array('id' => $r['roleid'], 'text' => ucfirst($r['rolename']));
        }
        echo json_encode($res);
    }
}
