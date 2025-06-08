<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleMiddleware;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public static function homeRedirect(): string
    {
        $user = Auth::user();

        return match ($user->role->value ?? null) {
            'admin' => '/dashboard',
            'owner' => '/dashboard',
            default => self::HOME,
        };
    }

    public function boot(): void
    {
        Route::aliasMiddleware('role', RoleMiddleware::class);

        $this->routes(function () {
            Route::middleware('web')->group(base_path('routes/web.php'));
        });
    }
}
