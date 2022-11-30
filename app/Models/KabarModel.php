<?php

namespace App\Models;

use Database\Factories\KabarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KabarModel extends Model
{
    use HasFactory;
    protected $table = 'kabar';
    protected $fillable = ['idakun', 'judul', 'isi', 'foto'];

    protected static function newFactory()
    {
        return KabarFactory::new();
    }

    protected static function getJoinKabarAkun($id = null)
    {
        if ($id != null) {
            return DB::table('kabar')
                ->join('akun', 'kabar.idakun', '=', 'akun.id')
                ->select('kabar.id', 'kabar.idakun', 'nama', 'judul', 'isi', 'kabar.foto', 'kabar.created_at')
                ->orderBy('created_at', 'desc')->where('kabar.id', '=', $id)
                ->first();
        } else {
            return DB::table('kabar')
                ->join('akun', 'kabar.idakun', '=', 'akun.id')
                ->select('kabar.id', 'kabar.idakun', 'nama', 'judul', 'isi', 'kabar.foto', 'kabar.created_at')
                ->orderBy('created_at', 'desc')
                ->get();
        }
    }
    protected static function getLimitJoinKabarAkun()
    {
        return DB::table('kabar')
            ->join('akun', 'kabar.idakun', '=', 'akun.id')
            ->select('kabar.id', 'nama', 'judul', 'isi', 'kabar.foto', 'kabar.created_at')
            ->orderBy('created_at', 'desc')
            ->limit(2)->get();
    }
}
