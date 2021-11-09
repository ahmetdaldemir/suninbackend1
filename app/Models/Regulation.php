<?php namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Regulation extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    public function get_data()
    {
        return RegulationLanguage::where('regulation_id', $this->id)->get();
    }
}

class RegulationLanguage extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
}
