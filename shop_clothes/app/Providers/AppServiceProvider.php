<?php

namespace App\Providers;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Service\Customer\CustomerService;
use App\Service\Customer\CustomerServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //Customer
        $this->app->singleton(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );
        $this->app->singleton(
            CustomerServiceInterface::class,
            CustomerService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
