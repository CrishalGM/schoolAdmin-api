<?php

namespace App\Http;

//use App\Http\Middleware\Cors;
use App\Http\Middleware\CamelCaseIncludesMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
//        // \App\Http\Middleware\TrustHosts::class,
//        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
//        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
//        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
//        \App\Http\Middleware\TrimStrings::class,
//        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
//    Cors::class
    ];

    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'CamelCaseIncludes' => CamelCaseIncludesMiddleware::class,
//        'auth.auth0' => \Fixico\B2B\Http\Middleware\Auth0LoginMiddleware::class,
    ];

    protected $middlewareGroups = [
        'web' => [
//            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
//            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
    protected $middlewareAliases = [
//        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
//        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
//        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'cors' => \App\Http\Middleware\Cors::class,
//        'auth.webhook' => \App\Http\Middleware\TallyFormGuardMiddleware::class,
    ];
}
