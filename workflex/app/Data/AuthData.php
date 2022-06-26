<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class AuthData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public ?string $key
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
}