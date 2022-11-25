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
    public function loker()
    {
        $data = [
            'title' => 'Lowongan Pekerjaan',
            'profile' => $this->profile,
            'loker' => LokerModel::orderBy('deadline')->get()
        ];
        return view('home/loker', $data);
    }
    public function kenangan()
    {
        $data = [
            'title' => 'Kenangan Siswa',
            'profile' => $this->profile,
            'kenangan' => KenanganModel::orderBy('created_at')->get()
        ];
        return view('home/kenangan', $data);
    }
    public function cekdata(Request $request)
    {
        $nis = $request->nis;
        $nama = $request->nama;

        $alumni = AlumniModel::cekData($nis, $nama);

        if ($alumni) {
            session()->flash('berhasil', 'Data yang anda cari telah ditemukan');
            session()->flash('status', 'secondary');
            session()->flash('icon', 'check-circle-fill');
        } else {
            session()->flash('gagal', 'Data yang anda cari tidak ditemukan');
            session()->flash('status', 'danger');
            session()->flash('icon', 'exclamation-triangle-fill');
        }

        $data = [
            'title' => 'Cek Data',
            'profile' => $this->profile,
            'alumni' => $alumni
        ];
        return view('home/cekdata', $data);
    }
}
