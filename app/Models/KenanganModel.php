<?php

namespace App\Models;

use Database\Factories\KenanganFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KenanganModel extends Model
{
    use HasFactory;
    protected $table = 'kenangan';

    protected static function newFactory()
    {
        return KenanganFactory::new();
    }

    protected static function getLimitKenangan()
    {
        return DB::table('kenangan')
            ->orderBy('created_at', 'desc')
            ->limit(3)->get();
    }
}
