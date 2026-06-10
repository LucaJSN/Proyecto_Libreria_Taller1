<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Consultas extends Model
{
    protected $table= 'consultas';
    protected $fillable = ['nombres', 'mail', 'telefono', 'mensaje'];

}
