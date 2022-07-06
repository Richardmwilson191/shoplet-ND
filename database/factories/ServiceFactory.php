<?php

namespace Database\Factories;

use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, User::all()->count()),
            'service_category_id' => rand(1, ServiceCategory::all()->count()),
            'service_nm' => $this->faker->words(2, true),
            'desc' => $this->faker->sentence(10),
            'price' => $this->faker->numberBetween(100, 99999999),
            'img_path' => $this->faker->filePath(),
        ];
    }
}
