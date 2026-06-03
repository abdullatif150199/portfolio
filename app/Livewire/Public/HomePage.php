<?php

namespace App\Livewire\Public;

use App\Models\About;
use App\Models\Client;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class HomePage extends Component
{
    #[Layout('layouts.app')]
    #[Title('Abdul Latif Mansyur — Fullstack Web Developer')]
    public function render()
    {
        return view('livewire.public.home-page', [
            'about'        => About::first(),
            'skills'       => Skill::orderBy('sort_order')->get()->groupBy('category'),
            'projects'     => Project::orderBy('sort_order')->get(),
            'experiences'  => Experience::orderBy('sort_order')->get(),
            'clients'      => Client::orderBy('sort_order')->get(),
            'testimonials' => Testimonial::orderBy('sort_order')->get(),
        ]);
    }
}
