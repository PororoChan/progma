<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'datas' => $this->user,
            'title' => 'ProgMa - Dashboard',
        ];
        return view('dashboard/v_home', $data);
    }
}
