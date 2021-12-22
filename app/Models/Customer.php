<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jamesh\Uuid\HasUuid;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasUuid, HasRoles;

    protected $fillable = [
        'fullName', 'email', 'password',
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

}
