<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Clients</h2>
            <p class="text-ink-500 text-sm">Logo client/perusahaan yang pernah bekerja sama.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-client">+ Tambah Client</button>
    </div>

    @if($showForm)
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div><label class="label">Nama</label><input class="input" wire:model="name" data-testid="input-client-name"></div>
                <div><label class="label">Website URL</label><input class="input" wire:model="website_url"></div>
                <div class="md:col-span-2">
                    <label class="label">Logo (upload atau URL)</label>
                    <input type="file" wire:model="logo_upload" accept="image/*" class="input mb-2">
                    <input class="input" wire:model="logo_path" placeholder="https://...">
                    @if($logo_path || $logo_upload)
                        <img src="{{ $logo_upload ? $logo_upload->temporaryUrl() : $logo_path }}" class="mt-3 h-16 object-contain">
                    @endif
                </div>
                <div><label class="label">Sort Order</label><input type="number" class="input" wire:model="sort_order"></div>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    @endif

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @forelse($clients as $c)
            <div class="card text-center">
                <img src="{{ $c->logo_path }}" alt="{{ $c->name }}" class="h-16 mx-auto object-contain mb-3">
                <div class="font-medium">{{ $c->name }}</div>
                <div class="flex justify-center gap-2 text-sm mt-3">
                    <button wire:click="edit({{ $c->id }})" class="text-brand-500 hover:underline">Edit</button>
                    <button wire:click="delete({{ $c->id }})" wire:confirm="Hapus?" class="text-red-500 hover:underline">Delete</button>
                </div>
            </div>
        @empty
            <p class="text-sm text-ink-500">Belum ada client.</p>
        @endforelse
    </div>
</div>
