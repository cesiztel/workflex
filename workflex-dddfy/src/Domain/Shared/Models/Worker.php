<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function user()
    {
        return $this->morphOne('Domain\Shared\Models\User', 'profile');
    }
}