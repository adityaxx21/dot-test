<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->input("id");
        $province_id = $request->input("province");

        $results = City::query()
            ->when($id, function ($query) use ($id) {
                $query->where('id',  $id);
            })
            ->when($province_id, function ($query) use ($province_id) {
                $query->where('province_id', $province_id);
            })
            ->get()->pluck('responseAPI');

        return response()->api($results);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
