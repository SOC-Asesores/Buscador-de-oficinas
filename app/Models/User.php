<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sisec',
        'name',
        'email',
        'password',
        'sucursal',
        'url',
        'logo',
        'telefono',
        'horario',
        'direccion',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'imagen_1',
        'imagen_2',
        'certificacion',
        'meta',
        'producto_1',
        'producto_2',
        'producto_3',
        'producto_4',
        'producto_5',
        'producto_6',
        'producto_7',
        'producto_8',
        'producto_9',
        'producto_10',
        'oficina_1',
        'oficina_2',
        'oficina_3',
        'oficina_4',
        'oficina_5',
        'oficina_6',
        'lat',
        'lng',
        'url_mapa',
        'productos',
        'oficinas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
