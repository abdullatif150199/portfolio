<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialsManager extends Component
{
    use WithFileUploads;

    public ?int $editingId = null;
    public string $name = '';
    public ?string $role = null;
    public ?string $company = null;
    public string $message = '';
    public ?string $avatar_path = null;
    public $avatar_upload = null;
    public int $rating = 5;
    public int $sort_order = 0;
    public bool $showForm = false;

    public function resetForm()
    {
        $this->reset(['editingId','name','role','company','message','avatar_path','avatar_upload','rating','sort_order']);
        $this->rating = 5;
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(int $id)
    {
        $t = Testimonial::findOrFail($id);
        $this->editingId = $t->id;
        $this->name = $t->name;
        $this->role = $t->role;
        $this->company = $t->company;
        $this->message = $t->message;
        $this->avatar_path = $t->avatar_path;
        $this->rating = $t->rating;
        $this->sort_order = $t->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($this->avatar_upload) {
            $this->avatar_path = '/storage/'.$this->avatar_upload->store('avatars', 'public');
        }

        Testimonial::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'role' => $this->role,
                'company' => $this->company,
                'message' => $this->message,
                'avatar_path' => $this->avatar_path,
                'rating' => $this->rating,
                'sort_order' => $this->sort_order,
            ]
        );

        $this->resetForm();
        $this->showForm = false;
        session()->flash('ok', 'Testimonial berhasil disimpan.');
    }

    public function delete(int $id)
    {
        Testimonial::whereKey($id)->delete();
        session()->flash('ok', 'Testimonial dihapus.');
    }

    #[Layout('layouts.admin')]
    #[Title('Testimonials — Admin')]
    public function render()
    {
        return view('livewire.admin.testimonials-manager', [
            'testimonials' => Testimonial::orderBy('sort_order')->get(),
        ]);
    }
}
