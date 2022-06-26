<?php

namespace App\Service;

use App\Data\AuthData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService implements AuthServiceInterface
{
    public function generateToken(AuthData $data): string
    {
        if (null === $data->key) {
            $data->key = uniqid();
        }

        $user = User::where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw new UnauthorizedHttpException("",'The provided credentials are incorrect.');
        }

        return $user->createToken($data->key)->plainTextToken;
    }
}