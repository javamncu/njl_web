<!-- dev -->
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Percaya semua proxy (mis. ngrok) supaya header X-Forwarded-Proto
        // dibaca → Laravel tahu request sebenarnya HTTPS dan asset URL
        // dibuat dengan skema yang benar.
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {  
        //
    })->create();


// prod
// <?php

// use Illuminate\Foundation\Application;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;

// $app = Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware): void {
//         // Percaya semua proxy (mis. ngrok) supaya header X-Forwarded-Proto
//         // dibaca → Laravel tahu request sebenarnya HTTPS dan asset URL
//         // dibuat dengan skema yang benar.
//         $middleware->trustProxies(at: '*');
//     })
//     ->withExceptions(function (Exceptions $exceptions): void {
//         //
//     })->create();

// // Public folder ada di public_html (di luar laravel-app),
// // supaya @vite, public_path(), asset() dll. cari di sana.
// $app->usePublicPath(realpath(__DIR__.'/../../public_html'));

// return $app;
