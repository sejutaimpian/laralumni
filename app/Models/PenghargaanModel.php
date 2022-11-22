<?php

namespace App\Models;

use Database\Factories\PenghargaanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenghargaanModel extends Model
{
    use HasFactory;
    protected $table = 'penghargaan';

    protected static function newFactory()
    {
        return PenghargaanFactory::new();
    }

    protected static function getJoinPenghargaanAlumni()
    {
        return DB::table('penghargaan')
            ->join('alumni', 'penghargaan.nis', '=', 'alumni.nis')
            ->join('jurusan', 'alumni.id_jurusan', '=', 'jurusan.id')
            ->select('alumni.nis', 'nama', 'nama_jurusan', 'icon', 'tahun_keluar', 'foto', 'penghargaan.id', 'penghargaan')
            ->orderBy('tahun_keluar', 'desc')
            ->get();
    }
    protected static function getLimitJoinPenghargaanAlumni()
    {
        return DB::table('penghargaan')
            ->join('alumni', 'penghargaan.nis', '=', 'alumni.nis')
            ->join('jurusan', 'alumni.id_jurusan', '=', 'jurusan.id')
            ->select('alumni.nis', 'nama', 'nama_jurusan', 'icon', 'tahun_keluar', 'foto', 'penghargaan.id', 'penghargaan')
            ->orderBy('tahun_keluar', 'desc')
            ->limit(4)->get();
    }
}
