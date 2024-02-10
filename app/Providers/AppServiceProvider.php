<?php

namespace App\Providers;

use App\Contracts\DataSourceInterface;
use App\Services\ApiDataSource;
use App\Services\DatabaseDataSource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $implementation = config('app.data_source');

        $this->app->bind(DataSourceInterface::class, function ($app) use ($implementation) {
            if ($implementation === 'database') {
                return new DatabaseDataSource();
            } elseif ($implementation === 'api') {
                return new ApiDataSource();
            } else {
                throw new \Exception("Invalid location data source implementation: $implementation");
            }
        });
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
                        'results' => count($results) == 1 ? $results[0] : $results,
                    ]
                ],
                $statusCode
            );
        });

        Response::macro('apiError', function ( $statusCode = 400, $description = "Invalid key.") {
            return response()->json(
                [
                    "rajaongkir" =>
                    [
                        'status' => [
                            'code' => $statusCode,
                            'description' => $description
                        ],
                    ]
                ],
                $statusCode
            );
        });
    }
}
