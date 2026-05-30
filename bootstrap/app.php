<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// ============================================================
// === DEV (local) ============================================
// Aktifkan blok ini saat development lokal: public folder masih
// di /public seperti Laravel standar. Komentari blok PROD di bawah.
// ============================================================
// return Application::configure(basePath: dirname(__DIR__))
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
//
//         // Atur locale (id/en) berdasarkan session — dipakai untuk fitur ganti bahasa.
//         $middleware->web(append: [
//             \App\Http\Middleware\SetLocale::class,
//         ]);
//     })
//     ->withExceptions(function (Exceptions $exceptions): void {
//         //
//     })->create();

// ============================================================
// === PROD (shared hosting cPanel: laravel-app + public_html) ===
// Aktifkan blok ini saat deploy ke Rumahweb / shared hosting.
// ============================================================
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Percaya semua proxy (mis. ngrok / cPanel proxy) supaya header
        // X-Forwarded-Proto dibaca → Laravel tahu request HTTPS dan
        // asset URL dibuat dengan skema yang benar.
        $middleware->trustProxies(at: '*');

        // Atur locale (id/en) berdasarkan session — dipakai untuk fitur ganti bahasa.
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// Public folder ada di public_html (di luar laravel-app),
// supaya @vite, public_path(), asset() dll. cari di sana.
$app->usePublicPath(realpath(__DIR__.'/../../public_html'));

return $app;
