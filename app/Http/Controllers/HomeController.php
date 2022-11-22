<?php

namespace App\Http\Controllers;

use App\Models\AlumniModel;
use App\Models\KabarModel;
use App\Models\KenanganModel;
use App\Models\LokerModel;
use App\Models\PenghargaanModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Portal Alumni SMK YPI Khoerul Falah Jompong',
            'profile' => $this->profile,
            'penghargaan' => PenghargaanModel::getLimitJoinPenghargaanAlumni(),
            'kabar' => KabarModel::getLimitJoinKabarAkun(),
            'loker' => LokerModel::getLimitLoker(),
            'kenangan' => KenanganModel::getLimitKenangan()
        ];
        return view('home/index', $data);
    }
}
