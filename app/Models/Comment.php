<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;
use Spatie\Permission\Traits\HasRoles;

class Comment extends Model
{
    use HasFactory;
}
