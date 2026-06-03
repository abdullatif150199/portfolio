<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Skills</h2>
            <p class="text-ink-500 text-sm">Kelola skills dengan icon & progress level.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-skill">+ Tambah Skill</button>
    </div>

    @if($showForm)
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="label">Nama Skill</label>
                    <input class="input" wire:model="name" data-testid="input-skill-name">
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label">Kategori</label>
                    <select class="input" wire:model="category">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="label">Level ({{ $level }}%)</label>
                    <input type="range" min="0" max="100" wire:model.live="level" class="w-full">
                </div>
                <div>
                    <label class="label">Sort Order</label>
                    <input type="number" class="input" wire:model="sort_order">
                </div>
                <div class="md:col-span-2">
                    <label class="label">Icon (upload atau URL)</label>
                    <input type="file" wire:model="icon_upload" accept="image/*" class="input mb-2" data-testid="input-skill-icon">
                    <input class="input" wire:model="icon_path" placeholder="https://cdn.../icon.svg">
                    @if($icon_path || $icon_upload)
                        <img src="{{ $icon_upload ? $icon_upload->temporaryUrl() : $icon_path }}" class="h-12 w-12 mt-3 object-contain">
                    @endif
                </div>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary" data-testid="btn-save-skill">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    @endif

    <div class="card !p-0 overflow-hidden">
        <table class="w-full">
            <thead class="bg-ink-100 dark:bg-white/5">
                <tr>
                    <th class="table-th">Icon</th>
                    <th class="table-th">Name</th>
                    <th class="table-th">Category</th>
                    <th class="table-th">Level</th>
                    <th class="table-th">Order</th>
                    <th class="table-th text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-200 dark:divide-white/5">
                @forelse($skills as $s)
                    <tr data-testid="skill-row-{{ $s->id }}">
                        <td class="table-td">
                            @if($s->icon_path)
                                <img src="{{ $s->icon_path }}" class="h-8 w-8 object-contain">
                            @endif
                        </td>
                        <td class="table-td font-medium">{{ $s->name }}</td>
                        <td class="table-td"><span class="chip">{{ $s->category }}</span></td>
                        <td class="table-td">
                            <div class="flex items-center gap-2">
                                <div class="w-24 h-1.5 bg-ink-200 dark:bg-white/10 rounded-full overflow-hidden">
                                    <div class="h-full bg-brand-500" style="width: {{ $s->level }}%"></div>
                                </div>
                                <span class="text-xs">{{ $s->level }}%</span>
                            </div>
                        </td>
                        <td class="table-td">{{ $s->sort_order }}</td>
                        <td class="table-td text-right">
                            <button wire:click="edit({{ $s->id }})" class="text-brand-500 hover:underline mr-3" data-testid="btn-edit-skill-{{ $s->id }}">Edit</button>
                            <button wire:click="delete({{ $s->id }})" wire:confirm="Hapus skill ini?" class="text-red-500 hover:underline" data-testid="btn-delete-skill-{{ $s->id }}">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="table-td text-center text-ink-500">Belum ada skill.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
