<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Helpers\Datatables\Datatables;
use App\Models\Mskelas;

class ClassGroup extends BaseController
{
    public function index()
    {
        $data = [
            'datas' => $this->user,
            'title' => 'Master Classroom - ProgMa',
        ];
        return view('master/classroom/v_class', $data);
    }

    public function datatable()
    {
        $table = Datatables::method([Mskelas::class, 'datatable'], 'sortable')
            ->make();

        $table->updateRow(function ($db, $no) {
            return [
                $no,
                $db->title,
                $db->author,
                $db->token,
                ($db->ishidden == 1 ? 'Yes' : 'No'),
                ($db->isactive == 1 ? 'Yes' : 'No'),
                date('d F Y', strtotime($db->createddate)),
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
