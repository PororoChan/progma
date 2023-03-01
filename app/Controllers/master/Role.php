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
            'title' => 'Master Role - ProgMa',
        ];
        return view('master/role/v_role', $data);
    }

    public function datatable()
    {
        $table = Datatables::method([Msrole::class, 'datatable'], 'sortable')
            ->make();

        $table->updateRow(function ($db, $no) {
            return [
                $no,
                ucfirst($db->rolename),
                date('d F Y', strtotime($db->createddate)),
                $db->name,
                "
                <td>
                    <button class='btn btn-sm btn-warning'><i class='bx bx-pencil'></i></button>
                    <button class='btn btn-sm btn-danger'><i class='bx bx-trash'></i></button>
                </td>
                "
            ];
        });
        $table->toJson();
    }
}
