<?php namespace App\Models;

class Tenant extends BaseModel
{
    protected $casts = [
        'info' => 'array',
    ];
}