<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LokerModel;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Lowongan Pekerjaan',
            'profile' => $this->profile,

            'loker' => LokerModel::orderBy('deadline', 'desc')->get()
        ];
        return view('dashboard/loker', $data);
    }
}
