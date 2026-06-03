<?php

namespace App\Livewire\Admin;

use App\Models\Client;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientsManager extends Component
{
    use WithFileUploads;

    public ?int $editingId = null;
    public string $name = '';
    public ?string $logo_path = null;
    public $logo_upload = null;
    public ?string $website_url = null;
    public int $sort_order = 0;
    public bool $showForm = false;

    public function resetForm()
    {
        $this->reset(['editingId','name','logo_path','logo_upload','website_url','sort_order']);
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(int $id)
    {
        $c = Client::findOrFail($id);
        $this->editingId = $c->id;
        $this->name = $c->name;
        $this->logo_path = $c->logo_path;
        $this->website_url = $c->website_url;
        $this->sort_order = $c->sort_order;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate(['name' => 'required|string|max:80']);

        if ($this->logo_upload) {
            $this->logo_path = '/storage/'.$this->logo_upload->store('clients', 'public');
        }

        Client::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'logo_path' => $this->logo_path,
                'website_url' => $this->website_url,
                'sort_order' => $this->sort_order,
            ]
        );

        $this->resetForm();
        $this->showForm = false;
        session()->flash('ok', 'Client berhasil disimpan.');
    }

    public function delete(int $id)
    {
        Client::whereKey($id)->delete();
        session()->flash('ok', 'Client dihapus.');
    }

    #[Layout('layouts.admin')]
    #[Title('Clients — Admin')]
    public function render()
    {
        return view('livewire.admin.clients-manager', [
            'clients' => Client::orderBy('sort_order')->get(),
        ]);
    }
}
