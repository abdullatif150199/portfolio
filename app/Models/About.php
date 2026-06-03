<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name', 'title', 'subtitle', 'bio', 'photo_path',
        'email', 'phone', 'location',
        'github_url', 'linkedin_url', 'twitter_url', 'website_url',
        'resume_url', 'years_experience', 'projects_completed',
    ];
}
