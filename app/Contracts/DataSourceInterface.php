<?php
namespace App\Contracts;

interface DataSourceInterface
{
    public function searchProvinces($provinceId=null);

    public function searchCities($cityId=null, $provinceId=null);
}