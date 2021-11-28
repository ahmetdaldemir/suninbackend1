<?php

namespace App\Repositories;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Destination\DestinationRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Page\PageRepositoryInterface;
use App\Repositories\Property\PropertyRepository;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Regulation\RegulationRepository;
use App\Repositories\Regulation\RegulationRepositoryInterface;
use App\Repositories\Rent\Page\RentPageRepository;
use App\Repositories\Rent\Page\RentPageRepositoryInterface;
use App\Repositories\Rent\RentCategory\RentCategoryRepository;
use App\Repositories\Rent\RentCategory\RentCategoryRepositoryInterface;
use App\Repositories\Rent\RentDestination\RentDestinationRepository;
use App\Repositories\Rent\RentDestination\RentDestinationRepositoryInterface;
use App\Repositories\Rent\Slider\SliderRepository;
use App\Repositories\Rent\Slider\SliderRepositoryInterface;
use App\Repositories\Rent\User\UserRepositoryInterface;
use App\Repositories\Rent\User\UserRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Service\ServiceRepositoryInterface;
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
        $this->app->bind(
            ServiceRepositoryInterface::class,
            ServiceRepository::class
        );
        $this->app->bind(
            RegulationRepositoryInterface::class,
            RegulationRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class
        );

        $this->app->bind(
            PageRepositoryInterface::class,
            PageRepository::class
        );

        $this->app->bind(
            RentPageRepositoryInterface::class,
            RentPageRepository::class
        );

        $this->app->bind(
            RentDestinationRepositoryInterface::class,
            RentDestinationRepository::class
        );

        $this->app->bind(
            RentCategoryRepositoryInterface::class,
            RentCategoryRepository::class
        );
    }
}
