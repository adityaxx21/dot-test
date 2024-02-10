<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Province>
 */
class ProvinceFactory extends Factory
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
                "id" => 1,
                "province" => "Bali"
            ],
            [
                "id" =>2,
                "province" => "Bangka Belitung"
            ],
            [
                "id" =>3,
                "province" => "Banten"
            ],
            [
                "id" =>4,
                "province" => "Bengkulu"
            ],
            [
                "id" =>5,
                "province" => "DI Yogyakarta"
            ],
            [
                "id" =>6,
                "province" => "DKI Jakarta"
            ],
            [
                "id" =>7,
                "province" => "Gorontalo"
            ],
            [
                "id" =>8,
                "province" => "Jambi"
            ],
            [
                "id" =>9,
                "province" => "Jawa Barat"
            ],
            [
                "id" =>10,
                "province" => "Jawa Tengah"
            ],
        ];
    }
}
