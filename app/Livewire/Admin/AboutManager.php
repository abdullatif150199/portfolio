<?php

namespace App\Livewire\Admin;

use App\Models\About;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutManager extends Component
{
    use WithFileUploads;

    public ?About $about = null;

    #[Validate('required|string|max:120')]
    public string $name = '';
    #[Validate('required|string|max:120')]
    public string $title = '';
    public ?string $subtitle = null;
    #[Validate('required|string')]
    public string $bio = '';
    public ?string $photo_path = null;
    public $photo_upload = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $location = null;
    public ?string $github_url = null;
    public ?string $linkedin_url = null;
    public ?string $twitter_url = null;
    public ?string $website_url = null;
    public ?string $resume_url = null;
    public int $years_experience = 0;
    public int $projects_completed = 0;

    public function mount()
    {
        $this->about = About::firstOrCreate([], [
            'name' => 'Your Name', 'title' => 'Your Title', 'bio' => '...',
        ]);
        foreach ($this->about->getAttributes() as $k => $v) {
            if (property_exists($this, $k)) $this->$k = $v;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->photo_upload) {
            $path = $this->photo_upload->store('photos', 'public');
            $this->photo_path = '/storage/'.$path;
        }

        $this->about->update([
            'name' => $this->name,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'bio' => $this->bio,
            'photo_path' => $this->photo_path,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'github_url' => $this->github_url,
            'linkedin_url' => $this->linkedin_url,
            'twitter_url' => $this->twitter_url,
            'website_url' => $this->website_url,
            'resume_url' => $this->resume_url,
            'years_experience' => $this->years_experience,
            'projects_completed' => $this->projects_completed,
        ]);

        $this->photo_upload = null;
        session()->flash('ok', 'Profile berhasil disimpan.');
    }

    #[Layout('layouts.admin')]
    #[Title('About — Admin')]
    public function render()
    {
        return view('livewire.admin.about-manager');
    }
}
