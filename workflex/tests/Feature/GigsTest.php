<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GigsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_returns_a_successful_list_of_gigs()
    {
        // Action
        $response = $this->get('api/gigs');

        // Assert
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has(2)
                ->first(fn ($json) =>
                    $json->where('id', 1)
                        ->where('user_id', 13)
                        ->where('gig_category_id', 5)
                        ->etc())
            );

    }

    public function test_returns_a_successful_gigs_by_id()
    {
        // Arrange
        $gigId = 1;

        // Action
        $response = $this->get("api/gigs/{$gigId}");

        // Assert
        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('user_id', 13)
                    ->where('gig_category_id', 5)
                    ->etc()
            );
    }
}
