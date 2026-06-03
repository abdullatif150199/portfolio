<?php

namespace App\Livewire\Admin;

use App\Models\About;
use App\Models\Client;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Dashboard — Admin')]
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'stats' => [
                'projects'     => Project::count(),
                'skills'       => Skill::count(),
                'experiences'  => Experience::count(),
                'clients'      => Client::count(),
                'testimonials' => Testimonial::count(),
                'about_done'   => About::exists(),
            ],
            'recent_projects' => Project::latest()->take(5)->get(),
        ]);
    }
}
