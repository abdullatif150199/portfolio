<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Projects</h2>
            <p class="text-ink-500 text-sm">Kelola showcase project di homepage.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-project">+ Tambah Project</button>
    </div>

    @if($showForm)
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="label">Judul</label>
                    <input class="input" wire:model="title" data-testid="input-project-title">
                    @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label">Kategori</label>
                    <input class="input" wire:model="category" placeholder="e.g. Web Application">
                </div>
                <div>
                    <label class="label">Sort Order</label>
                    <input type="number" class="input" wire:model="sort_order">
                </div>
                <div class="md:col-span-2">
                    <label class="label">Deskripsi</label>
                    <textarea rows="5" class="input" wire:model="description" data-testid="input-project-description"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="label">Tech Stack (comma separated)</label>
                    <input class="input" wire:model="tech_stack_csv" placeholder="Laravel, Livewire, MySQL, Tailwind">
                </div>
                <div>
                    <label class="label">Demo URL</label>
                    <input class="input" wire:model="demo_url">
                </div>
                <div>
                    <label class="label">Repo URL</label>
                    <input class="input" wire:model="repo_url">
                </div>
                <div class="md:col-span-2">
                    <label class="label">Cover (upload atau URL)</label>
                    <input type="file" wire:model="cover_upload" accept="image/*" class="input mb-2" data-testid="input-project-cover">
                    <input class="input" wire:model="cover_path" placeholder="https://images.unsplash.com/...">
                    @if($cover_path || $cover_upload)
                        <img src="{{ $cover_upload ? $cover_upload->temporaryUrl() : $cover_path }}" class="mt-3 aspect-[16/10] w-full rounded-lg object-cover">
                    @endif
                </div>
                <label class="md:col-span-2 flex items-center gap-2">
                    <input type="checkbox" wire:model="is_featured" class="rounded">
                    Tandai sebagai Featured
                </label>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary" data-testid="btn-save-project">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($projects as $p)
            <div class="card !p-0 overflow-hidden" data-testid="project-row-{{ $p->id }}">
                <img src="{{ $p->cover_path }}" alt="" class="aspect-[16/10] w-full object-cover">
                <div class="p-4">
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <h3 class="font-bold">{{ $p->title }}</h3>
                        @if($p->is_featured) <span class="chip !bg-amber-500/20 !text-amber-600">Featured</span> @endif
                    </div>
                    <p class="text-sm text-ink-500 line-clamp-2 mb-3">{{ $p->description }}</p>
                    <div class="flex gap-3 text-sm">
                        <button wire:click="edit({{ $p->id }})" class="text-brand-500 hover:underline" data-testid="btn-edit-project-{{ $p->id }}">Edit</button>
                        <button wire:click="delete({{ $p->id }})" wire:confirm="Hapus project ini?" class="text-red-500 hover:underline" data-testid="btn-delete-project-{{ $p->id }}">Delete</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-sm text-ink-500">Belum ada project.</p>
        @endforelse
    </div>
</div>
