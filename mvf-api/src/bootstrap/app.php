<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();


$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);


$app->register(App\Providers\AppServiceProvider::class);
$app->middleware([
    App\Http\Middleware\CorsMiddleware::class
]);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/api.php';
});

return $app;
