<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function landingPage()
    {
        $data = [
            'title' => 'ProgMa | Job Task Guidance Management',
        ];
        return view('dashboard/v_landing', $data);
    }
}
