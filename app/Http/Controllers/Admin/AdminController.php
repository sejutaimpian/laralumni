<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniModel;
use App\Models\KabarModel;
use App\Models\KenanganModel;
use App\Models\LokerModel;
use App\Models\PenghargaanModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $penghargaan = PenghargaanModel::getLimitJoinPenghargaanAlumni();
        $kabar = KabarModel::getLimitJoinKabarAkun();
        $loker = LokerModel::getLimitLoker();
        $kenangan = KenanganModel::getLimitKenangan();

        $total = [
            'penghargaan'   => PenghargaanModel::count(),
            'kabar'         => KabarModel::count(),
            'loker'         => LokerModel::count(),
            'kenangan'      => KenanganModel::count(),
            'alumni'        => AlumniModel::count()
        ];

        $data = [
            'title' => 'Dashboard',
            'profile' => $this->profile,
            // 'akun' => $this->akun,
            'penghargaan' => $penghargaan,
            'kabar' => $kabar,
            'loker' => $loker,
            'kenangan' => $kenangan,
            'total' => $total
        ];
        return view('admin/index', $data);
    }
}
