<?php

namespace App\Livewire\Admin;

use App\Models\Experience;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ExperienceManager extends Component
{
    public ?int $editingId = null;
    public string $company = '';
    public string $role = '';
    public ?string $location = null;
    public ?string $description = null;
    public ?string $start_date = null;
    public ?string $end_date = null;
    public bool $is_current = false;
    public int $sort_order = 0;
    public bool $showForm = false;

    public function resetForm()
    {
        $this->reset(['editingId','company','role','location','description','start_date','end_date','is_current','sort_order']);
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(int $id)
    {
        $e = Experience::findOrFail($id);
        $this->editingId = $e->id;
        $this->company = $e->company;
        $this->role = $e->role;
        $this->location = $e->location;
        $this->description = $e->description;
        $this->start_date = optional($e->start_date)->format('Y-m-d');
        $this->end_date = optional($e->end_date)->format('Y-m-d');
        $this->is_current = (bool) $e->is_current;
        $this->sort_order = $e->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate([
            'company' => 'required|string',
            'role' => 'required|string',
            'start_date' => 'required|date',
        ]);

        Experience::updateOrCreate(
            ['id' => $this->editingId],
            [
                'company' => $this->company,
                'role' => $this->role,
                'location' => $this->location,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->is_current ? null : $this->end_date,
                'is_current' => $this->is_current,
                'sort_order' => $this->sort_order,
            ]
        );

        $this->resetForm();
        $this->showForm = false;
        session()->flash('ok', 'Experience berhasil disimpan.');
    }

    public function delete(int $id)
    {
        Experience::whereKey($id)->delete();
        session()->flash('ok', 'Experience dihapus.');
    }

    #[Layout('layouts.admin')]
    #[Title('Experience — Admin')]
    public function render()
    {
        return view('livewire.admin.experience-manager', [
            'experiences' => Experience::orderBy('sort_order')->get(),
        ]);
    }
}
