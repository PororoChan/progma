<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Helpers\Datatables\Datatables;
use App\Models\Msuser;
use Exception;

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
                ((isset($address) && !empty($address)) ? mb_strimwidth($address, 0, 50, '...') : "<i>address not added</i>"),
                $db->username,
                "<i class='$icon fs-6set me-2'></i><span class='fw-semibold text-secondary'>" . ucfirst($db->rolename) . "</span>",
                "
                <td>
                    <button class='btn btn-sm btn-info'><i class='bx bx-show-alt bx-xs'></i></button>
                    <button class='btn btn-sm btn-warning' onclick=\"crudModal('Edit User | $db->fullname', 'modal-md', 'bx bx-user-plus', '" . enVal($db->userid) . "', 'Update', '" . base_url('user/form/' . enVal($db->userid)) . "')\"><i class='bx bx-pencil bx-xs'></i></button>
                    <button class='btn btn-sm btn-danger' onclick=\"delModal('Delete User | $db->fullname', 'modal-md', 'bx bx-user', '" . enVal($db->userid) . "', 'Yes, Delete It', 'Are you sure want to delete this data?', '" . base_url('user/delete') . "')\"><i class='bx bx-trash bx-xs'></i></button>
                </td>
                "
            ];
        });
        $table->toJson();
    }

    public function showForm($id = '')
    {
        $res = array();
        $ftype = '';
        // $decid = deVal($id);
        if (!empty($id)) {
            // edit form
            $id = deVal($id);
            $ftype = 'edit';
            $datas = $this->user->getOne($id);
            $roles = $this->role->getOneByRoleId($datas['role']);
            $data = [
                'ftype' => $ftype,
                'rolename' => $roles,
                'row' => $datas,
            ];
        } else {
            $ftype = 'add';
            $data = [
                'ftype' => $ftype,
            ];
        }
        $res['view'] = view('master/user/v_form', $data);
        echo json_encode($res);
    }

    function isPassMatch($password, $confirm)
    {
        if ($password != $confirm) {
            return false;
        } else {
            return true;
        }
    }

    function isUnameExist($username, $ftype, $userid)
    {
        $uname = $this->user->cekUname($username);
        if (isset($uname)) {
            if ($ftype == 'edit') {
                if ($uname['userid'] == $userid) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function userPro()
    {
        $userid = $this->request->getPost('userid');
        $userid = deVal($userid);
        $ftype = $this->request->getPost('ftype');
        $fullname = $this->request->getPost('fullname');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');
        $bio = $this->request->getPost('bio');
        $profile = $this->request->getFile('profile');
        $bd = $this->request->getPost('bd');
        $role = $this->request->getPost('role');
        $uname = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm');
        $err = 0;
        $res = array();
        $msg = '';
        $data = array();

        // Validasi Null Empty
        if ($ftype == 'add') {
            if (empty($fullname) || empty($uname) || empty($pass) || empty($confirm) || empty($role)) {
                $err++;
                $msg = 'Security Credentials must have value';
            }
        } else {
            if (empty($fullname) || empty($uname) || empty($role)) {
                $err++;
                $msg = 'Security Credentials must have value';
            }
        }

        $this->db->transBegin();
        try {
            $filename = '';
            $userdata = [
                'gender' => $gender,
                'address' => $address,
                'bio' => $bio,
            ];

            if ($ftype == 'add') {
                if (!empty($profile)) {
                    $filename = $profile->getRandomName();
                    $profile->move(PROFILE, $filename);
                }
                $userdata['profile'] = (!empty($filename) ? $filename : '');

                // validasi password match
                $isPassMatch = $this->isPassMatch($pass, $confirm);
                if (!$isPassMatch) {
                    $err++;
                    $msg = 'Password not matches';
                }
            } else {
                $getOldFile = json_decode($this->user->getOne($userid)['userdata']);
                if (!empty($profile)) {
                    if (!empty($getOldFile->profile)) {
                        if (file_exists(PROFILE . $getOldFile->profile)) {
                            unlink(PROFILE . $getOldFile->profile);
                        }
                    }
                    $filename = $profile->getRandomName();
                    $profile->move(PROFILE, $filename);
                    $userdata['profile'] = $filename;
                } else {
                    $datauser = $this->user->getOne($userid);
                    $udata = json_decode($datauser['userdata']);
                    $userdata['profile'] = (!empty($udata->profile) ? $udata->profile : '');
                }
            }

            // cek username already exist
            $isUnameExist = $this->isUnameExist($uname, $ftype, (!empty($userid) ? $userid : ''));

            if (!$isUnameExist) {
                $err++;
                $msg = 'Username already exists';
            }

            if ($err > 0) {
                throw new Exception();
            } else {
                if ($ftype == 'add') {
                    $data = [
                        'fullname' => $fullname,
                        'userdata' => json_encode($userdata),
                        'birthdate' => date('y-m-d', strtotime($bd)),
                        'username' => $uname,
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                        'role' => $role,
                        'createddate' => date('Y-m-d H:i:s'),
                        'createdby' => session()->get('userid'),
                    ];
                    $this->user->tambah($data);
                } else {
                    $data = [
                        'fullname' => $fullname,
                        'userdata' => json_encode($userdata),
                        'birthdate' => date('y-m-d', strtotime($bd)),
                        'username' => $uname,
                        'role' => $role,
                        'updateddate' => date('Y-m-d H:i:s'),
                        'updatedby' => session()->get('userid'),
                    ];
                    $this->user->ubah($data, $userid);
                }

                $this->db->transCommit();
                $mm = '';
                if ($ftype == 'add') {
                    $mm = 'Successfully added new user';
                } else {
                    $mm = 'Successfully updating user data';
                }
                $res = [
                    'success' => 1,
                    'msg' => $mm,
                ];
            }
        } catch (Exception $e) {
            $res = [
                'success' => 0,
                'msg' => $msg,
                'error' => $this->db->error(),
            ];
            $this->db->transRollback();
        }
        $this->db->transComplete();
        echo json_encode($res);
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $id = deVal($id);
        $res = array();
        $err = 0;
        $msg = "";

        if (!empty($id)) {
            $getFile = $this->user->getOne($id);
            $enC = json_decode($getFile['userdata']);
            if (!empty($enC->profile)) {
                if (file_exists(PROFILE . $enC->profile)) {
                    unlink(PROFILE . $enC->profile);
                }
            }
        } else {
            $err++;
            $msg = "Data Id is not defined";
        }

        $this->db->transBegin();
        try {
            if ($err > 0) {
                throw new Exception();
            } else {
                $this->user->hapus($id);
                $res = [
                    'success' => 1,
                    'msg' => 'User has been deleted',
                ];
                $this->db->transCommit();
            }
        } catch (Exception $e) {
            $res = [
                'success' => 0,
                'msg' => $msg,
                'error' => $this->db->error(),
            ];
            $this->db->transRollback();
        }
        $this->db->transComplete();
        echo json_encode($res);
    }
}
