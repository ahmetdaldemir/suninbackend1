<?php namespace App\Repositories\View;


use App\Repositories\View\Blog\BlogRepository;
use App\Repositories\View\Blog\BlogRepositoryInterface;

use App\Repositories\View\Villa\VillaRepository;
use App\Repositories\View\Villa\VillaRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            VillaRepositoryInterface::class,
            VillaRepository::class
       );
        $this->app->bind(
             BlogRepositoryInterface::class,
             BlogRepository::class
        );
    }
}
