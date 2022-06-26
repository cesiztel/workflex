<?php

namespace App\Providers;

use App\Repositories\ApplicationRepository;
use App\Repositories\ApplicationRepositoryInterface;
use App\Repositories\CompanyRepository;
use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\GigCategoryRepository;
use App\Repositories\GigCategoryRepositoryInterface;
use App\Repositories\GigRepository;
use App\Repositories\GigRepositoryInterface;
use App\Repositories\ShiftRepository;
use App\Repositories\ShiftRepositoryInterface;
use App\Repositories\WorkerRepository;
use App\Repositories\WorkerRepositoryInterface;
use App\Service\AuthService;
use App\Service\AuthServiceInterface;
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
        $this->app->bind(
            GigCategoryRepositoryInterface::class,
            GigCategoryRepository::class
        );
        $this->app->bind(
            GigRepositoryInterface::class,
            GigRepository::class
        );
        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepository::class
        );
        $this->app->bind(
            ApplicationRepositoryInterface::class,
            ApplicationRepository::class
        );
        $this->app->bind(
            ShiftRepositoryInterface::class,
            ShiftRepository::class
        );
        $this->app->bind(
            WorkerRepositoryInterface::class,
            WorkerRepository::class
        );
        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
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
