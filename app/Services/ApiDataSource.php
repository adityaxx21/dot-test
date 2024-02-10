<?php

namespace App\Services;

use App\Contracts\DataSourceInterface;
use Illuminate\Support\Facades\Http;

class ApiDataSource implements DataSourceInterface
{
    public function searchProvinces($provinceId = null)
    {
        $apiKey = config('app.api_key');
        $uri = config('app.uri');
        $params = array();
        $uriWithParams = $uri . "/province/";

        if (!empty($provinceId)) {
            $params["id"] = $provinceId;
            $uriWithParams .= '?' . http_build_query($params);
        }

        return Http::withHeaders([
            'key' => $apiKey,
        ])->get($uriWithParams)->json();
    }

    public function searchCities($cityId = null, $provinceId = null)
    {
        $apiKey = config('app.api_key');
        $uri = config('app.uri');
        $params = array();
        $uriWithParams = $uri . "/city/";

        if (!empty($cityId)) {
            $params["id"] = $cityId;
        }

        if (!empty($provinceId)) {
            $params["province"] = $provinceId;
        }

        if (!empty($params)) {
            $uriWithParams .= '?' . http_build_query($params);
        }

        return Http::withHeaders([
            'key' => $apiKey,
        ])->get($uriWithParams)->json();
    }
}
