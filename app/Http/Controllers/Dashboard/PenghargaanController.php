<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AlumniModel;
use App\Models\PenghargaanModel;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penghargaan',
            'profile' => $this->profile,

            'alumni' => AlumniModel::all(),
            'penghargaan' => PenghargaanModel::getJoinPenghargaanAlumni()
        ];
        return view('dashboard/siswaterbaik', $data);
    }
}
