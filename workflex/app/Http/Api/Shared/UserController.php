<?php

namespace App\Http\Api\Shared;

use App\Data\AuthData;
use App\Service\AuthServiceInterface;

class UserController extends Controller
{
    public function store(
        AuthServiceInterface $authService,
        AuthData $data
    )
    {
        return $authService->generateToken($data);
    }
}
