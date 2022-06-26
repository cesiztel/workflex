<?php

namespace Tests\Unit\Repositories;

use App\Models\Gig;
use App\Repositories\GigRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GigRepositoryTest extends TestCase
{
    /**
     * Test repository
     *
     * @return void
     */
    public function test_that_can_get_all_gigs()
    {
        // Arrange
        $expectedGig = new Gig();
        $expectedGig->id = 34;
        $expectedGigs = collect([$expectedGig]);

        // Act
        $repository = \Mockery::mock(GigRepositoryInterface::class);
        $repository->allows()->all()->andReturns($expectedGigs);
        $gigs = $repository->all();

        // Assert
        $this->assertTrue($expectedGigs->count() == 1);
        $this->assertTrue($expectedGigs->first()->id == $gigs->first()->id);
    }
}
