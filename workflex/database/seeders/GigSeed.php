<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Gig;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class GigSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->for(
            Company::factory(), 'userable'
        )->create();

        Gig::factory()
            ->count(2)
            ->state(new Sequence(
                ['status' => 'draft'],
                ['status' => 'publish']
            ))
            ->for($user)
            ->has(Shift::factory()->count(3))
            ->create();
    }
}
