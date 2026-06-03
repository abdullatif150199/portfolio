<?php

namespace App\Livewire\Admin;

use App\Models\Skill;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class SkillsManager extends Component
{
    use WithFileUploads;

    public ?int $editingId = null;
    public string $name = '';
    public string $category = 'Backend';
    public int $level = 80;
    public ?string $icon_path = null;
    public $icon_upload = null;
    public int $sort_order = 0;
    public bool $showForm = false;

    public array $categories = ['Backend', 'Frontend', 'Database', 'DevOps', 'Mobile', 'Design', 'Other'];

    public function resetForm()
    {
        $this->reset(['editingId', 'name', 'category', 'level', 'icon_path', 'icon_upload', 'sort_order']);
        $this->category = 'Backend';
        $this->level = 80;
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(int $id)
    {
        $s = Skill::findOrFail($id);
        $this->editingId = $s->id;
        $this->name = $s->name;
        $this->category = $s->category;
        $this->level = $s->level;
        $this->icon_path = $s->icon_path;
        $this->sort_order = $s->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:80',
            'category' => 'required|string',
            'level' => 'required|integer|min:0|max:100',
        ]);

        if ($this->icon_upload) {
            $this->icon_path = '/storage/'.$this->icon_upload->store('icons', 'public');
        }

        Skill::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'category' => $this->category,
                'level' => $this->level,
                'icon_path' => $this->icon_path,
                'sort_order' => $this->sort_order,
            ]
        );

        $this->resetForm();
        $this->showForm = false;
        session()->flash('ok', 'Skill berhasil disimpan.');
    }

    public function delete(int $id)
    {
        Skill::whereKey($id)->delete();
        session()->flash('ok', 'Skill dihapus.');
    }

    #[Layout('layouts.admin')]
    #[Title('Skills — Admin')]
    public function render()
    {
        return view('livewire.admin.skills-manager', [
            'skills' => Skill::orderBy('sort_order')->get(),
        ]);
    }
}
