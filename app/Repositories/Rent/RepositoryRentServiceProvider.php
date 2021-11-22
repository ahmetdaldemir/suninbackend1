<?php namespace App\Repositories\Rent;


use App\Repositories\Rent\Blog\BlogRepository;
use App\Repositories\Rent\Blog\BlogRepositoryInterface;

use App\Repositories\Rent\Category\CategoryRepository;
use App\Repositories\Rent\Category\CategoryRepositoryInterface;

use App\Repositories\Rent\Contract\ContractRepository;
use App\Repositories\Rent\Contract\ContractRepositoryInterface;

use App\Repositories\Rent\Currency\CurrencyRepository;
use App\Repositories\Rent\Currency\CurrencyRepositoryInterface;
use App\Repositories\Rent\Customer\CustomerRepository;
use App\Repositories\Rent\Customer\CustomerRepositoryInterface;

use App\Repositories\Rent\Message\MessageRepositoryInterface;
use App\Repositories\Rent\Message\MessageRepository;

use App\Repositories\Rent\Settings\SettingsRepository;
use App\Repositories\Rent\Settings\SettingsRepositoryInterface;

use App\Repositories\Rent\Slider\SliderRepository;
use App\Repositories\Rent\Slider\SliderRepositoryInterface;
use App\Repositories\Rent\User\UserRepository;
use App\Repositories\Rent\User\UserRepositoryInterface;

use App\Repositories\Rent\Villa\VillaRepository;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;

use App\Repositories\Rent\Tenant\TenantRepository;
use App\Repositories\Rent\Tenant\TenantRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryRentServiceProvider extends ServiceProvider
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
        $this->app->bind(
            MessageRepositoryInterface::class,
            MessageRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );
        $this->app->bind(
            ContractRepositoryInterface::class,
            ContractRepository::class
        );

        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class
        );

        $this->app->bind(
            CurrencyRepositoryInterface::class,
            CurrencyRepository::class
        );
    }
}
