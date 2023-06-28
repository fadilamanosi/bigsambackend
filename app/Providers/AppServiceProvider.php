<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use App\Interfaces\ActionsServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        

        $this->app->singleton(ActionsServiceInterface::class, function () {

            $api = explode("\\", request()->route()->getControllerClass());
            $api = $api[count($api) - 1];

            $action  = 'App\Actions\\' . $api . "Actions\\";
            $action  = $action . Str::ucfirst(request()->action);

            return App($action);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Response::macro('apiError', function($message, $code = 400){
            return Response::json(['message' => $message], $code);
        });

        Response::macro('apiSuccess', function($message, $code = 200){
            return Response::json(['data' => $message], $code);
        });
        //
    }
}
