<?php

namespace App\Models;

use Database\Factories\AlumniFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlumniModel extends Model
{
    use HasFactory;
    protected $table = 'alumni';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AlumniFactory::new();
    }
    public function akun()
    {
        return $this->hasOne(AlumniModel::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(AlumniModel::class);
    }

    protected static function getJoinJurusan($nis = null)
    {
        if ($nis) {
            return DB::table('alumni')
                ->join('jurusan', 'alumni.id_jurusan', '=', 'jurusan.id')
                ->where('nis', $nis)
                ->get();
        } else {
            return DB::table('alumni')
                ->join('jurusan', 'alumni.id_jurusan', '=', 'jurusan.id')
                ->orderBy('tahun_keluar', 'desc')
                ->get();
        }
    }
    protected static function cekData($nis, $nama)
    {
        return DB::table('alumni')
            ->join('jurusan', 'alumni.id_jurusan', '=', 'jurusan.id')
            ->where([
                ['nis', '=', $nis],
                ['nama', '=', $nama]
            ])
            ->first();
    }
}
