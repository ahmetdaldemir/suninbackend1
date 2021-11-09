<?php

namespace App\Repositories;

use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Destination\DestinationRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Property\PropertyRepository;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Tenant\TenantRepository;
use App\Repositories\Tenant\TenantRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryBackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            PropertyRepositoryInterface::class,
            PropertyRepository::class
       );

        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class
        );

        $this->app->bind(
            DestinationRepositoryInterface::class,
            DestinationRepository::class
        );
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );
    }
}
