<?php

namespace App\Providers;

use App\Repositories\CompanyRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Repositories\interfaces\CompanyInterface;
use App\Repositories\interfaces\EmployeeInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(CompanyInterface::class, CompanyRepository::class);
         $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
