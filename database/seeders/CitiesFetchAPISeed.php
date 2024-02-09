<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CitiesFetchAPISeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            $apiKey = config('app.api_key');
            $uri = config('app.uri');

            $response = Http::withHeaders([
                'key' => $apiKey,
            ])->get("{$uri}/city/");

            if ($response->successful()) {
                $cities = $response->json()['rajaongkir']['results'];
                foreach ($cities as $city) {
                    City::create([
                        'id' => $city['city_id'],
                        'province_id' => $city['province_id'],
                        'city_name' => $city['city_name'],
                        'postal_code' => $city['postal_code'],
                        'type' => $city['type'],
                    ]);
                }
            } else {
                throw new \Exception('Failed to fetch data from the API.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error message
            Log::error('CitySeeder failed: ' . $e->getMessage());
            // Re-throw the exception to stop the seeder process completely if needed
            throw $e;
        }
    }
}
