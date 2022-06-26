<?php

namespace Database\Factories;

use App\Models\Gig;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shift>
 */
class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gig_id' => Gig::factory(),
            'start_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'end_at' => Carbon::now()->addHours(3)->format('Y-m-d H:i:s'),
            'amount' => $this->faker->randomFloat(2, 0, 200)
        ];
    }
}
