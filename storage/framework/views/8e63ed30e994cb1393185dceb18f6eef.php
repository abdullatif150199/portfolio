<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Testimonials</h2>
            <p class="text-ink-500 text-sm">Kata-kata dari klien & kolega.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-testimonial">+ Tambah Testimonial</button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div><label class="label">Nama</label><input class="input" wire:model="name"></div>
                <div><label class="label">Role</label><input class="input" wire:model="role"></div>
                <div><label class="label">Company</label><input class="input" wire:model="company"></div>
                <div>
                    <label class="label">Rating (1–5)</label>
                    <input type="number" min="1" max="5" class="input" wire:model="rating">
                </div>
                <div class="md:col-span-2">
                    <label class="label">Pesan</label>
                    <textarea rows="4" class="input" wire:model="message"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="label">Avatar (upload atau URL)</label>
                    <input type="file" wire:model="avatar_upload" accept="image/*" class="input mb-2">
                    <input class="input" wire:model="avatar_path" placeholder="https://...">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($avatar_path || $avatar_upload): ?>
                        <img src="<?php echo e($avatar_upload ? $avatar_upload->temporaryUrl() : $avatar_path); ?>" class="mt-3 h-16 w-16 rounded-full object-cover">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div><label class="label">Sort Order</label><input type="number" class="input" wire:model="sort_order"></div>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="grid md:grid-cols-2 gap-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card">
                <div class="flex gap-1 text-amber-500 mb-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i=0;$i<$t->rating;$i++): ?><span>★</span><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <p class="text-ink-700 dark:text-ink-200 mb-4">"<?php echo e($t->message); ?>"</p>
                <div class="flex items-center gap-3">
                    <img src="<?php echo e($t->avatar_path); ?>" alt="" class="h-10 w-10 rounded-full object-cover">
                    <div class="flex-1">
                        <div class="font-semibold"><?php echo e($t->name); ?></div>
                        <div class="text-xs text-ink-500"><?php echo e($t->role); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($t->company): ?> · <?php echo e($t->company); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                    </div>
                    <div class="flex gap-3 text-sm">
                        <button wire:click="edit(<?php echo e($t->id); ?>)" class="text-brand-500 hover:underline">Edit</button>
                        <button wire:click="delete(<?php echo e($t->id); ?>)" wire:confirm="Hapus?" class="text-red-500 hover:underline">Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-sm text-ink-500">Belum ada testimonial.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/testimonials-manager.blade.php ENDPATH**/ ?>