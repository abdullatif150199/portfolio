<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Projects</h2>
            <p class="text-ink-500 text-sm">Kelola showcase project di homepage.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-project">+ Tambah Project</button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="label">Judul</label>
                    <input class="input" wire:model="title" data-testid="input-project-title">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cover_path || $cover_upload): ?>
                        <img src="<?php echo e($cover_upload ? $cover_upload->temporaryUrl() : $cover_path); ?>" class="mt-3 aspect-[16/10] w-full rounded-lg object-cover">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card !p-0 overflow-hidden" data-testid="project-row-<?php echo e($p->id); ?>">
                <img src="<?php echo e($p->cover_path); ?>" alt="" class="aspect-[16/10] w-full object-cover">
                <div class="p-4">
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <h3 class="font-bold"><?php echo e($p->title); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->is_featured): ?> <span class="chip !bg-amber-500/20 !text-amber-600">Featured</span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="text-sm text-ink-500 line-clamp-2 mb-3"><?php echo e($p->description); ?></p>
                    <div class="flex gap-3 text-sm">
                        <button wire:click="edit(<?php echo e($p->id); ?>)" class="text-brand-500 hover:underline" data-testid="btn-edit-project-<?php echo e($p->id); ?>">Edit</button>
                        <button wire:click="delete(<?php echo e($p->id); ?>)" wire:confirm="Hapus project ini?" class="text-red-500 hover:underline" data-testid="btn-delete-project-<?php echo e($p->id); ?>">Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-sm text-ink-500">Belum ada project.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/projects-manager.blade.php ENDPATH**/ ?>