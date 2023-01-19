<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use Exception;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Register as Student',
        ];
        return view('v_register', $data);
    }

    function isLengthValid($password)
    {
        if (strlen($password) < 8) {
            return false;
        } else {
            return true;
        }
    }

    function getValidPassword($password, $confirm)
    {
        if ($password != $confirm) {
            return false;
        } else {
            return true;
        }
    }

    public function studentAdd()
    {
        $fullname = $this->request->getPost('fullname');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');
        $bio = $this->request->getPost('bio');
        $profile = $this->request->getFile('profile');
        $birth = $this->request->getPost('birth');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm');
        $err = 0;
        $role = 3;
        $msg = '';
        $res = array();

        // validasi null / kosong
        $this->db->transBegin();
        try {
            if (empty($fullname) || empty($username) || empty($password) || empty($confirm)) {
                $err++;
                $msg = 'Credentials field required';
            } else {
                $cekPassLength = $this->isLengthValid($password);
                if (!$cekPassLength) {
                    $err++;
                    $msg = 'Password must be minimum 8 characters';
                } else {
                    $validPW = $this->getValidPassword($password, $confirm);
                    if (!$validPW) {
                        $err++;
                        $msg = 'Password not match';
                    }
                }
            }

            if (empty($profile)) {
                $ppName = null;
            } else {
                $ppName = $profile->getRandomName();
                $profile->move(PROFILE, $ppName);
            }
            $udata = [
                'gender' => $gender,
                'address' => $address,
                'bio' => $bio,
                'profile' => $ppName
            ];

            $data = [
                'fullname' => $fullname,
                'userdata' => json_encode($udata),
                'birthdate' => (empty($birth) ? null : $birth),
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role,
                'createddate' => date('Y-m-d H:i:s'),
                'createdby' => 1,
            ];
            $this->user->tambah($data);

            if ($err != 0) {
                throw new Exception();
            } else {
                $res = [
                    'success' => 1,
                    'msg' => 'Successfully Registered as Student',
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
