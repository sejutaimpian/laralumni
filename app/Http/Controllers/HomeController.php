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
    public function siswaterbaik()
    {
        $data = [
            'title' => 'Siswa Terbaik',
            'profile' => $this->profile,
            'penghargaan' => PenghargaanModel::getJoinPenghargaanAlumni()
        ];
        return view('home/siswaterbaik', $data);
    }
    public function kabaralumni()
    {
        $data = [
            'title' => 'Kabar Alumni',
            'profile' => $this->profile,
            'kabar' => KabarModel::getJoinKabarAkun()
        ];
        return view('home/kabaralumni', $data);
    }
    public function kabar($id)
    {
        $data = [
            'title' => 'Kabar Alumni',
            'profile' => $this->profile,
            'kabar' => KabarModel::getJoinKabarAkun($id)
        ];
        return view('home/kabar', $data);
    }
}
