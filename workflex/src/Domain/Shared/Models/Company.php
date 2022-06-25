<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location'
    ];

    public function user()
    {
        return $this->morphOne('Domain\Shared\Models\User', 'profile');
    }
}