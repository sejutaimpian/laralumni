<?php

namespace App\Models;

use Database\Factories\KenanganFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KenanganModel extends Model
{
    use HasFactory;
    protected $table = 'kenangan';

    protected static function newFactory()
    {
        return KenanganFactory::new();
    }
}
