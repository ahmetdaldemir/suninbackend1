<?php namespace App\Repositories\View;


use App\Repositories\View\Blog\BlogRepository;
use App\Repositories\View\Blog\BlogRepositoryInterface;

use App\Repositories\View\Category\CategoryRepository;
use App\Repositories\View\Category\CategoryRepositoryInterface;

use App\Repositories\View\Slider\SliderRepository;
use App\Repositories\View\Slider\SliderRepositoryInterface;
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
             CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class
        );
    }
}
