<?php namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public function get_data()
    {
        return ServiceLanguage::where('service_id', $this->id)->get();
    }
}

class ServiceLanguage extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

}
