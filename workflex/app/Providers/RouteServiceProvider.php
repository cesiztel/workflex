<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    protected $namespace = 'App\Http\Controllers';

    protected string $apiNamespace = 'App\Http\Api\Controllers';

    protected string $workerAdminNamespace = 'App\Http\Api\Admin\Controllers';

    protected string $companyAdminNamespace = 'App\Http\Api\Admin\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapApiRoutes();
            $this->mapWorkerAdminRoutes();
            $this->mapCompanyAdminRoutes();
            $this->mapWebRoutes();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    public function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->apiNamespace)
            ->group(base_path('routes/api.php'));
    }

    public function mapWorkerAdminRoutes()
    {
        Route::prefix('api/worker/admin')
            ->middleware('api')
            ->namespace($this->workerAdminNamespace)
            ->group(base_path('routes/admin.worker.api.php'));
    }

    public function mapCompanyAdminRoutes()
    {
        Route::prefix('api/company/admin')
            ->middleware('api')
            ->namespace($this->companyAdminNamespace)
            ->group(base_path('routes/admin.company.api.php'));
    }

    public function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
