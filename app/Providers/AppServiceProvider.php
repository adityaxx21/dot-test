<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('api', function ($results, $query = [], $statusCode = 200, $description = "OK") {
            return response()->json(
                [
                    "rajaongkir" =>
                    [
                        'query' => $query,
                        'status' => [
                            'code' => $statusCode,
                            'description' => $description
                        ],
                        'results' => count($results) == 1 ? $results->first() : $results,
                    ]
                ],
                $statusCode
            );
        });
    }
}
