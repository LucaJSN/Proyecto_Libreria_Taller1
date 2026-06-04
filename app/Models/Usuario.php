<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array {
        return[
            'password' => 'hashed'
        ];
    }

    public function rol() 
    {
        return $this->belongsto(Rol::class, 'rol_id');
    }
}
