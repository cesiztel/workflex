<?php

namespace Database\Factories;

use App\Models\GigCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GigSubCategory>
 */
class GigSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gig_category_id' => GigCategory::factory(),
            'name' => $this->faker->word
        ];
    }
}
