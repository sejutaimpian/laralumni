<?php

namespace App\Models;

use Database\Factories\JurusanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    use HasFactory;
    protected $table = 'jurusan';

    protected static function newFactory()
    {
        return JurusanFactory::new();
    }
    public function alumni()
    {
        return $this->hasMany(AlumniModel::class);
    }
}
