<?php

namespace App\Providers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'auth:admin'])
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web', 'auth:instructor'])
                ->group(base_path('routes/instructor.php'));

            Route::middleware(['web', 'auth:student'])
                ->group(base_path('routes/student.php'));
        });

        Route::macro('authenticate', function (string $prefix, string $guard, string $name) {

            Route::prefix($prefix)->name($name . '.')->controller(AuthController::class)->group(function () use ($guard) {
                Route::middleware('guest:' . $guard)->group(function () use ($guard) {
                    Route::get('login', 'indexLogin')->name('login')->defaults('guard', $guard);
                    Route::post('login', 'login')->name('login.submit')->defaults('guard', $guard);
                });

                Route::middleware(['auth:' . $guard])->group(function () use ($guard) {
                    Route::post('logout', 'logout')->name('logout.submit')->defaults('guard', $guard);
                    Route::get('dashboard', 'dashboard')->name('dashboard')->defaults('guard', $guard);
                });
            });
        });
    }
}
