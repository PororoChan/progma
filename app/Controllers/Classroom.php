<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Classroom extends BaseController
{
    public function index()
    {
        $datac = $this->kelas;
        if (session()->get('role') == 2) {
            $datac = $this->kelas->getKelasByGuru()->get()->getResultArray();
        } else if (session()->get('role') == 3) {
            $datac = $this->kelas->getKelasByStudent()->get()->getResultArray();
        }
        $data = [
            'datas' => $this->user,
            'datac' => $datac,
            'title' => 'ProgMa - Classroom',
        ];
        return view('classroom/v_classroom', $data);
    }

    public function showForm()
    {
        $res = array();
        $res['view'] = view('classroom/v_form');
        echo json_encode($res);
    }

    public function tambah()
    {
        $token = $this->request->getPost('ctoken');
        $title = $this->request->getPost('ctitle');
        $background = $this->request->getFile('bimg');
        $ishidden = $this->request->getPost('ishidden');
        $isactive = $this->request->getPost('isactive');
        $res = array();
        $err = 0;
        $msg = "";

        if (empty($token)) {
            $err++;
            $msg = "Class Token is not provided";
        }
        if (empty($title)) {
            $err++;
            $msg = "Class title cannot be empty";
        }
        $cekToken = $this->kelas->cekToken($token);
        if ($cekToken) {
            $token = genToken();
        }

        $this->db->transBegin();
        try {
            $filename = genColor();
            if (!empty($background)) {
                $filename = $background->getRandomName();
                $background->move(CASSET, $filename);
            }

            if ($err > 0) {
                throw new Exception();
            } else {
                $data = [
                    'token' => $token,
                    'classtitle' => $title,
                    'backimg' => $filename,
                    'ishidden' => $ishidden,
                    'isactive' => $isactive,
                    'createddate' => date('Y-m-d H:i:s'),
                    'createdby' => session()->get('userid'),
                ];
                $this->kelas->tambah($data);
                $this->db->transCommit();
                $res = [
                    'success' => 1,
                    'msg' => 'New Class Created',
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

    public function backToRoom()
    {
        if (!empty(session()->get('classid'))) {
            session()->set('classid', null);
        }
        return redirect()->to('room');
    }

    public function roomDetail($id)
    {
        $cid = deVal($id);
        $getOne = $this->kelas->getOneById($cid);
        session()->set('classid', $id);

        $data = [
            'datas' => $this->user,
            'title' => ucwords($getOne['classtitle']),
            'data' => $this->kelas->getOneById($cid),
            'listclass' => $this->kelas->getWithout($cid, 0)->get()->getResultArray(),
            'listhidden' => $this->kelas->getWithout($cid, 1)->get()->getResultArray(),
        ];

        return view('classroom/v_detail', $data);
    }
}
