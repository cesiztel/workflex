<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'draft';

    protected $fillable = [
        'description',
        'languages_requirements',
        'skills_requirements',
        'etiquette_requirements',
        'status',
        'allocated_at',
        'closed_at'
    ];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gigCategory()
    {
        return $this->hasOne(GigCategory::class);
    }
}
