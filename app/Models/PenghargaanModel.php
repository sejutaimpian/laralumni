<?php

namespace App\Models;

use Database\Factories\PenghargaanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghargaanModel extends Model
{
    use HasFactory;
    protected $table = 'penghargaan';

    protected static function newFactory()
    {
        return PenghargaanFactory::new();
    }
}
