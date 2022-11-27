<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'profile' => $this->profile,

            ''
        ];
        return view('dashboard/index', $data);
    }
}
