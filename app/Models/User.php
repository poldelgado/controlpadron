<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;
use App\Models\Empadronado;
use App\Models\EmpadronadoUser;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enabled' => 'boolean',
        'admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->admin === 1 ? true:false;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function empadronados()
    {
        return $this->belongsToMany(Empadronado::class,'empadronado_user','user_id','empadronado_id')
                        ->using(EmpadronadoUser::class)
                        ->orderByRaw('lower(apellido)')
                        ->orderByRaw('lower(nombre)')
                        ->withPivot([
                            'created_at'
                        ]);

    }
}
