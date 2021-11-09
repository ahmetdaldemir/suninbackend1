<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;


class Tenant extends Model
{
    use HasUuid;
    use HasFactory,SoftDeletes;
    public $incrementing = false;


    protected $casts = [
        'dataya' => 'json',
    ];
}