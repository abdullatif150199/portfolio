<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'role', 'company', 'message', 'avatar_path', 'rating', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'sort_order' => 'integer',
    ];
}
