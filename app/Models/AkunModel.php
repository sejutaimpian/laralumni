<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AkunModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'akun';
    protected $fillable = [
        'nis', 'nama', 'nowhatsapp', 'email', 'password', 'foto', 'role', 'is_active'
    ];
    protected $hidden = [
        'password',
    ];

    public function alumni()
    {
        return $this->hasOne(AkunModel::class);
    }
}
