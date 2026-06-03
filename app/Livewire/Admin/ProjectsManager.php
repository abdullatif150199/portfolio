<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsManager extends Component
{
    use WithFileUploads;

    public ?int $editingId = null;
    public string $title = '';
    public string $category = '';
    public string $description = '';
    public string $tech_stack_csv = '';
    public ?string $cover_path = null;
    public $cover_upload = null;
    public ?string $demo_url = null;
    public ?string $repo_url = null;
    public bool $is_featured = false;
    public int $sort_order = 0;
    public bool $showForm = false;

    public function resetForm()
    {
        $this->reset(['editingId','title','category','description','tech_stack_csv','cover_path','cover_upload','demo_url','repo_url','is_featured','sort_order']);
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(int $id)
    {
        $p = Project::findOrFail($id);
        $this->editingId = $p->id;
        $this->title = $p->title;
        $this->category = $p->category ?? '';
        $this->description = $p->description;
        $this->tech_stack_csv = is_array($p->tech_stack) ? implode(', ', $p->tech_stack) : '';
        $this->cover_path = $p->cover_path;
        $this->demo_url = $p->demo_url;
        $this->repo_url = $p->repo_url;
        $this->is_featured = (bool) $p->is_featured;
        $this->sort_order = $p->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
        ]);

        if ($this->cover_upload) {
            $this->cover_path = '/storage/'.$this->cover_upload->store('projects', 'public');
        }

        $stack = collect(explode(',', $this->tech_stack_csv))
            ->map(fn ($s) => trim($s))->filter()->values()->all();

        Project::updateOrCreate(
            ['id' => $this->editingId],
            [
                'title' => $this->title,
                'slug' => Str::slug($this->title).'-'.Str::random(4),
                'category' => $this->category,
                'description' => $this->description,
                'tech_stack' => $stack,
                'cover_path' => $this->cover_path,
                'demo_url' => $this->demo_url,
                'repo_url' => $this->repo_url,
                'is_featured' => $this->is_featured,
                'sort_order' => $this->sort_order,
            ]
        );

        $this->resetForm();
        $this->showForm = false;
        session()->flash('ok', 'Project berhasil disimpan.');
    }

    public function delete(int $id)
    {
        Project::whereKey($id)->delete();
        session()->flash('ok', 'Project dihapus.');
    }

    #[Layout('layouts.admin')]
    #[Title('Projects — Admin')]
    public function render()
    {
        return view('livewire.admin.projects-manager', [
            'projects' => Project::orderBy('sort_order')->get(),
        ]);
    }
}
