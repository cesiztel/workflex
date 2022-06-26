<?php

namespace Database\Factories;

use App\Models\GigCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'gig_category_id' => GigCategory::factory(),
            'description' => $this->faker->words(40, true),
            'languages_requirements' => json_encode([$this->faker->randomElement(['english, dutch, german'])]),
            'skills_requirements' => json_encode([$this->faker->randomElement(['Receiving guests', 'Represent company', '>1 year experience'])]),
            'etiquette_requirements'=> json_encode([$this->faker->randomElement(['No visible piercings', 'No nail polish / fake nails', 'No nail polish / fake nails'])]),
            'status' => 'draft'
        ];
    }
}
