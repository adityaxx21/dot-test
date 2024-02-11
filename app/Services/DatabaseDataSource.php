<?php

namespace App\Services;

use App\Contracts\DataSourceInterface;
use App\Models\Province;
use App\Models\City;

class DatabaseDataSource implements DataSourceInterface
{
    public $queries = array();
    public function searchProvinces($provinceId = null)
    {
        $results = Province::query()
            ->when($provinceId, function ($query) use ($provinceId) {
                $this->queries["id"] = $provinceId;
                $query->where('id',  $provinceId);
            })
            ->get()->pluck('responseAPI');

        return response()->api($results,  $this->queries);
    }

    public function searchCities($cityId = null, $provinceId = null)
    {
        $results = City::query()
            ->when($cityId, function ($query) use ($cityId) {
                $this->queries["id"] = $cityId;
                $query->where('id',  $cityId);
            })
            ->when($provinceId, function ($query) use ($provinceId) {
                $this->queries["province"] = $provinceId;
                $query->where('province_id', $provinceId);
            })
            ->get()->pluck('responseAPI');

        return response()->api($results,  $this->queries);
    }
}
