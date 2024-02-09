<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $queries = array();

    public function index(Request $request)
    {
        $id = $request->input("id");
        $query = array();

        $results = Province::query()
            ->when($id, function ($query) use ($id) {
                $this->queries["id"] = $id;
                $query->where('id',  $id);
            })
            ->get()->pluck('responseAPI');

        return response()->api($results, $query );
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
