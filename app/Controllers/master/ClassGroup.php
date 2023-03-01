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
                $db->ishidden,
                $db->isactive,
                date('d F Y', strtotime($db->createddate)),
                "
                <td></td>
                "
            ];
        });
        $table->toJson();
    }
}
