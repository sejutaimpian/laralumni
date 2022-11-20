<?php

namespace App\Models;

use Database\Factories\KabarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabarModel extends Model
{
    use HasFactory;
    protected $table = 'kabar';

    protected static function newFactory()
    {
        return KabarFactory::new();
    }
}
