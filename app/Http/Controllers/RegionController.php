<?php

namespace App\Http\Controllers;

use App\Contracts\DataSourceInterface;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    protected $dataSource;

    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function searchProvinces(Request $request)
    {
        $id = $request->input("id");
        return $this->dataSource->searchProvinces($id);
    }

    public function searchCities(Request $request)
    {
        $id = $request->input("id");
        $province_id = $request->input("province");
        return $this->dataSource->searchCities($id, $province_id);
    }
}
