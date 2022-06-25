<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'location'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}