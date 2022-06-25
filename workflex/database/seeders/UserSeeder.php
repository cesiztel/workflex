<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedWorkers();
        $this->seedCompanies();
    }

    private function seedCompanies()
    {
        for($i = 0; $i <= 5; $i++)
        {
            User::factory()->for(
                Company::factory(), 'userable'
            )->create();
        }
    }

    private function seedWorkers()
    {
        for($i = 0; $i <= 5; $i++)
        {
            User::factory()->for(
                Worker::factory(), 'userable'
            )->create();
        }
    }
}
