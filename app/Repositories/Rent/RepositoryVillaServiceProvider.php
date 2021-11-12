<?php

namespace App\Repositories\Rent;


use App\Repositories\Rent\Villa\VillaRepository;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryVillaServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            VillaRepositoryInterface::class,
            VillaRepository::class
       );

    }
}
