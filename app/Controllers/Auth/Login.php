<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index($role = '')
    {
        $role = deVal($role);
        $data = array();
        if ($role == 'teacher') {
            $data['title'] = 'Progma | Login Teacher';
        } else if ($role == 'student') {
            $data['title'] = 'Progma | Login Student';
        } else {
            $data['title'] = 'Progma | Login Admin';
        } 
        session()->set('bRole', $role);
        return view('v_login', $data);
    }

    public function loginAuth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $err = 0;
        $msg = '';
        $role = '';
        $roleid = 0;
        $res = array();

        if (empty($username) || empty($password)) {
            $err++;
            $msg = 'username or password required';
        } else {
            $getOne = $this->user->checkUser($username);
            if ($getOne && password_verify($password, rtrim($getOne['password']))) {
                $rolename = $this->role->getOneByRoleId($getOne['role']);
                if (session()->get('bRole') == $rolename['rolename']) {
                    session()->set('userid', $getOne['userid']);
                    session()->set('name', $getOne['fullname']);
                    session()->set('role', $getOne['role']);
                    if ($rolename['rolename']) {
                        $role = $rolename['rolename'];
                        $roleid = $getOne['role'];
                    } else {
                        $role = 'This user not having roles';
                    }
                } else {
                    $err++;
                    $msg = 'Login Credentials as ' . ucfirst(session()->get('bRole')) . ' only';
                }
            } else {
                $err++;
                $msg = 'username or password is incorrect';
            }
        }
        if ($err != 0) {
            $res = [
                'success' => 0,
                'msg' => $msg,
            ];
        } else {
            $res = [
                'success' => 1,
                'msg' => 'Login successfully as ' . ucfirst($role),
                'role' => $roleid,
            ];
        }
        echo json_encode($res);
    }

    public function logout()
    {
        $userid = session()->get('userid');
        $res = array();

        if (empty($userid)) {
            $res = [
                'success' => 0,
                'msg' => 'User not logged in',
            ];
        } else {
            session()->destroy();
            $res = [
                'success' => 1,
                'msg' => 'Logged Out',
            ];
        }
        echo json_encode($res);
    }
}
