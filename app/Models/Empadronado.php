<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\EmpadronadoUser;

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


    public function users()
    {
        return $this->belongsToMany(User::class,'empadronado_user','empadronado_id','user_id')
                    ->using(EmpadronadoUser::class)
                    ->orderByRaw('lower(lastname)')
                    ->orderByRaw('lower(name)')
                    ->withPivot(['created_at']);
    }

    public function isLlamado($user_id) {
        if ($this->users->contains($user_id)) {
            return true;
        }
        return false;
    }
}
