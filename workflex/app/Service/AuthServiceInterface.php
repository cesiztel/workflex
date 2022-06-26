<?php

namespace App\Service;

use App\Data\AuthData;

interface AuthServiceInterface
{
    public function generateToken(AuthData $data): string;
}