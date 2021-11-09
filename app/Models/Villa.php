<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Villa extends Model
{
    use HasFactory,SoftDeletes;
}

class VillaProperty extends Model
{
    use HasFactory;
    public $timestamps = false;

}


class VillaCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaLanguage extends Model
{
    use HasFactory;
    public $timestamps = false;

}

class VillaImage extends Model
{
    use HasFactory;
    public $timestamps = false;

}