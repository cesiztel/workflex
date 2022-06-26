<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_returns_a_successful_list_of_categories()
    {
        // Action
        $response = $this->get('api/categories');

        // Assert
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has(6)
                ->first(fn ($json) =>
                    $json->where('id', 1)
                        ->where('name', 'hospitality')
                        ->etc())
            );

    }
}
