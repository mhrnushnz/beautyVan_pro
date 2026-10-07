<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);


        //مسیر پیش فرض مهمان عه ینی اگر کاربر خواسا بره ب صفحه ای نیاز ب لاگین شدن داشت بره اول ب این صفحه لاگین کنه بعدا
        $middleware->redirectGuestsTo(function (Request $request) {
            return $request->is('p-admin', 'p-admin/*') ? route('home') : route('login_client');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // کاربر فاقد نقش یا مجوز لازم
        $exceptions->render(function (UnauthorizedException $e, Request $request) {
            if ($request->is('p-admin', 'p-admin/*')) {
                return redirect()->route('home');
            }
            return null;
        });

        // سایر خطاهای 403 در مسیرهای ادمین
        $exceptions->render(function (HttpExceptionInterface $e, Request $request) {
            if ($e->getStatusCode() === 403 && $request->is('p-admin', 'p-admin/*')) {
                return redirect()->route('home');
            }
            return null;
        });


        $exceptions->render(function (\Spatie\Permission\Exceptions\UnauthorizedException $e,\Illuminate\Http\Request $request) {
            if ($request->is('p-admin', 'p-admin/*')) {
                return redirect()->route('home');
            }
            return null;
        });
    })->create();
