<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();
        //
        $this->mapWriterRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             // Đường dẫn thư mục
             ->namespace($this->namespace.'\Website')
             // Thêm tiền tố cho name route
             ->name('web.')
             // Thêm tiền tố cho URL 
             // ->prefix('homepage')
             // File route đích
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
             // Đường dẫn thư mục
             ->namespace($this->namespace.'\Admin')
             // Thêm tiền tố cho name route
             ->name('admin.')
             // Thêm tiền tố cho URL 
             ->prefix('admin')
             // File route đích
             ->group(base_path('routes/admin.php'));
    }

    protected function mapWriterRoutes()
    {
        Route::middleware('web')
             // Đường dẫn thư mục
             ->namespace($this->namespace.'\Writer')
             // Thêm tiền tố cho name route
             ->name('writer.')
             // Thêm tiền tố cho URL 
             ->prefix('writer')
             // File route đích
             ->group(base_path('routes/writer.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
