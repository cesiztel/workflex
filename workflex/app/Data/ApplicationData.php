<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ApplicationData extends Data
{
    public function __construct(
        public ?int $gig_id,
        public int $shift_id,
        public int $worker_id
    ) {
    }
}