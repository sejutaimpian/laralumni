<?php

namespace App\Models;

use Database\Factories\AlumniFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
