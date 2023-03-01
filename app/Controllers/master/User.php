<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Helpers\Datatables\Datatables;
use App\Models\Msuser;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'datas' => $this->user,
            'title' => 'Master User - Progma',
        ];
        return view('master/user/v_user', $data);
    }

    function iconRole($role)
    {
        $role = strtolower($role);
        if ($role == 'admin') {
            $icon = 'fas fa-users-cog';
        } else if ($role == 'teacher') {
            $icon = 'fas fa-user-tie';
        } else if ($role == 'student') {
            $icon = 'fas fa-users';
        }
        return $icon;
    }

    function iconGender($gender)
    {
        $gender = strtolower($gender);
        if ($gender == 'male') {
            $icon = 'bx bx-male';
        } else if ($gender == 'female') {
            $icon = 'bx bx-female';
        }
        return $icon;
    }

    public function datatable()
    {
        $table = Datatables::method([Msuser::class, 'datatable'], 'sortable')
            ->make();

        $table->updateRow(function ($db, $no) {
            if (!empty($db->userdata)) {
                $userdata = json_decode($db->userdata);
                $gender = $userdata->gender;
                $address = $userdata->address;
                $genderIcon = $this->iconGender($gender);
            }
            $icon = $this->iconRole($db->rolename);

            return [
                $no,
                $db->fullname,
                (isset($gender) ? "<i class='$genderIcon bx-xs me-2'></i><span class='fw-normal'>" . ucfirst($gender) . "</span>" : "<i>gender's none</i>"),
                (isset($address) ? mb_strimwidth($address, 0, 50, '...') : "<i>address not added</i>"),
                $db->username,
                "<i class='$icon fs-6set me-2'></i><span class='fw-semibold text-secondary'>" . ucfirst($db->rolename) . "</span>",
                "
                <td>
                    <button class='btn btn-sm btn-info'><i class='bx bx-show-alt bx-xs'></i></button>
                    <button class='btn btn-sm btn-warning'><i class='bx bx-pencil bx-xs'></i></button>
                    <button class='btn btn-sm btn-danger'><i class='bx bx-trash bx-xs'></i></button>
                </td>
                "
            ];
        });
        $table->toJson();
    }
}
