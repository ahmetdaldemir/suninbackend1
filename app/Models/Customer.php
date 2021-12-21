<?php namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';

    protected $fillable = [
        'fullName', 'email', 'password',
    ];

    protected $hidden = [
        'password'
    ];
}
