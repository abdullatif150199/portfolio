<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'description', 'tech_stack',
        'cover_path', 'demo_url', 'repo_url', 'is_featured', 'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];
}
