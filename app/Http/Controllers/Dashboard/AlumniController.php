<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Alumni',
            'profile'       => $this->profile,

            'alumni'        => AlumniModel::getJoinJurusan(),
            'jurusan'       => JurusanModel::all()
        ];

        return view('dashboard/alumni', $data);
    }
}
