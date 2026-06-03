<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Experience</h2>
            <p class="text-ink-500 text-sm">Kelola riwayat karir.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-experience">+ Tambah Experience</button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div><label class="label">Company</label><input class="input" wire:model="company" data-testid="input-exp-company"></div>
                <div><label class="label">Role</label><input class="input" wire:model="role"></div>
                <div><label class="label">Location</label><input class="input" wire:model="location"></div>
                <div><label class="label">Sort Order</label><input type="number" class="input" wire:model="sort_order"></div>
                <div><label class="label">Start Date</label><input type="date" class="input" wire:model="start_date"></div>
                <div><label class="label">End Date</label><input type="date" class="input" wire:model="end_date" <?php if($is_current): echo 'disabled'; endif; ?>></div>
                <label class="flex items-center gap-2 md:col-span-2">
                    <input type="checkbox" wire:model.live="is_current" class="rounded">
                    Pekerjaan saat ini
                </label>
                <div class="md:col-span-2">
                    <label class="label">Deskripsi</label>
                    <textarea rows="4" class="input" wire:model="description"></textarea>
                </div>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary" data-testid="btn-save-experience">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="card !p-0 overflow-hidden">
        <table class="w-full">
            <thead class="bg-ink-100 dark:bg-white/5">
                <tr>
                    <th class="table-th">Company</th>
                    <th class="table-th">Role</th>
                    <th class="table-th">Period</th>
                    <th class="table-th text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-200 dark:divide-white/5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="table-td font-medium"><?php echo e($e->company); ?></td>
                        <td class="table-td"><?php echo e($e->role); ?></td>
                        <td class="table-td text-xs text-ink-500">
                            <?php echo e(\Carbon\Carbon::parse($e->start_date)->format('M Y')); ?> —
                            <?php echo e($e->is_current ? 'Present' : \Carbon\Carbon::parse($e->end_date)->format('M Y')); ?>

                        </td>
                        <td class="table-td text-right">
                            <button wire:click="edit(<?php echo e($e->id); ?>)" class="text-brand-500 hover:underline mr-3">Edit</button>
                            <button wire:click="delete(<?php echo e($e->id); ?>)" wire:confirm="Hapus?" class="text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="table-td text-center text-ink-500">Belum ada experience.</td></tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/experience-manager.blade.php ENDPATH**/ ?>