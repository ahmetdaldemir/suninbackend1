<?php namespace App\Repositories\View;


use App\Repositories\View\Customer\CustomerRepository;
use App\Repositories\View\Customer\CustomerRepositoryInterface;
use App\Repositories\View\RentCategory\RentCategoryRepository;
use App\Repositories\View\RentCategory\RentCategoryRepositoryInterface;
use App\Repositories\View\Blog\BlogRepository;
use App\Repositories\View\Blog\BlogRepositoryInterface;

use App\Repositories\View\Category\CategoryRepository;
use App\Repositories\View\Category\CategoryRepositoryInterface;

use App\Repositories\View\RentDestination\RentDestinationRepository;
use App\Repositories\View\RentDestination\RentDestinationRepositoryInterface;
use App\Repositories\View\Reservation\ReservationRepository;
use App\Repositories\View\Reservation\ReservationRepositoryInterface;
use App\Repositories\View\Setting\SettingRepository;
use App\Repositories\View\Setting\SettingRepositoryInterface;
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

        $this->app->bind(
            RentDestinationRepositoryInterface::class,
            RentDestinationRepository::class
        );

        $this->app->bind(
            RentCategoryRepositoryInterface::class,
            RentCategoryRepository::class
        );

        $this->app->bind(
            SettingRepositoryInterface::class,
            SettingRepository::class
        );;

        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );

        $this->app->bind(
            ReservationRepositoryInterface::class,
            ReservationRepository::class
        );
    }
}
