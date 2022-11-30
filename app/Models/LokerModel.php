<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LokerModel extends Model
{
    use HasFactory;
    protected $table = 'loker';
    protected $fillable = ['logo_perusahaan', 'pekerjaan', 'nama_perusahaan', 'penempatan', 'gaji', 'pendidikan', 'usia', 'kualifikasi', 'sumber', 'deadline'];

    protected static function getLimitLoker()
    {
        return DB::table('loker')
            ->orderBy('created_at', 'desc')
            ->limit(3)->get();
    }
}
