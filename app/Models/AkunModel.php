<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunModel extends Model
{
    use HasFactory;
    protected $table = 'akun';

    public function alumni()
    {
        return $this->hasOne(AkunModel::class);
    }
}
