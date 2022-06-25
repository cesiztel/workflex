<?php

namespace Database\Seeders;

use App\Models\GigCategory;
use App\Models\GigSubCategory;
use Illuminate\Database\Seeder;

class GigCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'hospitality' => ['serving', 'catering', 'housekeeper'],
            'retail' => ['sales associate', 'field marketing', 'telemarketing'],
            'logistics' => ['warehouse worker', 'mover', 'delivery'],
            'charity' => ['charity worker']
        ];

        foreach($data as $key => $value) {
            $this->factoryBy($data, $key, count($value));
        }
    }

    private function factoryBy($data, $category, $subcategoriesCounter)
    {
        GigCategory::factory(1, ['name' => $category])
            ->has(
                GigSubCategory::factory()
                    ->count($subcategoriesCounter)
                    ->sequence(fn ($sequence) => ['name' => $data[$category][$sequence->index]]))
            ->create();
    }
}
