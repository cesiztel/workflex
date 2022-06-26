<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = "gig_applications";

    protected $fillable = [
        'status',
        'allocated_at',
        'rejected_at'
    ];

    public function worker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
