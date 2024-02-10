<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                "id" => 24,
                "province_id" => 9,
                "type" => "Kabupaten",
                "city_name" => "Bandung Barat",
                "postal_code" => "40721"
            ],
            [
                "id" => 25,
                "province_id" => 29,
                "type" => "Kabupaten",
                "city_name" => "Banggai",
                "postal_code" => "94711"
            ],
            [
                "id" => 26,
                "province_id" => 29,
                "type" => "Kabupaten",
                "city_name" => "Banggai Kepulauan",
                "postal_code" => "94881"
            ],
            [
                "id" => 27,
                "province_id" => 2,
                "type" => "Kabupaten",
                "city_name" => "Bangka",
                "postal_code" => "33212"
            ],
            [
                "id" => 28,
                "province_id" => 2,
                "type" => "Kabupaten",
                "city_name" => "Bangka Barat",
                "postal_code" => "33315"
            ],
            [
                "id" => 29,
                "province_id" => 2,
                "type" => "Kabupaten",
                "city_name" => "Bangka Selatan",
                "postal_code" => "33719"
            ],
            [
                "id" => 30,
                "province_id" => 2,
                "type" => "Kabupaten",
                "city_name" => "Bangka Tengah",
                "postal_code" => "33613"
            ],
            [
                "id" => 31,
                "province_id" => 11,
                "type" => "Kabupaten",
                "city_name" => "Bangkalan",
                "postal_code" => "69118"
            ],
            [
                "id" => 32,
                "province_id" => 1,
                "type" => "Kabupaten",
                "city_name" => "Bangli",
                "postal_code" => "80619"
            ],
        ];
    }
}
