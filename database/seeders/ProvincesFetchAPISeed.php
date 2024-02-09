<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProvincesFetchAPISeed extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        try {
            $apiKey = config('app.api_key');
            $uri = config('app.uri');
            $response = Http::withHeaders([
                'key' => $apiKey,
            ])->get("{$uri}/province/");

            if ($response->successful()) {
                $provinces = $response->json()['rajaongkir']['results'];
                foreach ($provinces as $province) {
                    Province::create([
                        'id' => $province['province_id'],
                        'province' => $province['province'],
                    ]);
                }
            } else {
                throw new \Exception('Failed to fetch data from the API.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error message
            Log::error('ProvinceSeeder failed: ' . $e->getMessage());
            // Re-throw the exception to stop the seeder process completely if needed
            throw $e;
        }
    }
}
