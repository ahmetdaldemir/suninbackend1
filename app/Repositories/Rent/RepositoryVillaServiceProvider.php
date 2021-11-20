<?php namespace App\Repositories\Rent;


use App\Repositories\Rent\Blog\BlogRepository;
use App\Repositories\Rent\Blog\BlogRepositoryInterface;
use App\Repositories\Rent\Category\CategoryRepository;
use App\Repositories\Rent\Category\CategoryRepositoryInterface;
use App\Repositories\Rent\Settings\SettingsRepository;
use App\Repositories\Rent\Settings\SettingsRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepository;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use App\Repositories\Rent\Tenant\TenantRepository;
use App\Repositories\Rent\Tenant\TenantRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryVillaServiceProvider extends ServiceProvider
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
        $this->app->bind(
            SettingsRepositoryInterface::class,
            SettingsRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );
    }
}
