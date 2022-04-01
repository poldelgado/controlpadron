<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empadronado extends Model
{
    use HasFactory;

    protected $fillable = [
        'apellido',
        'nombre',
        'dni',
    ];


     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'llamado' => 'boolean',
    ];
}
