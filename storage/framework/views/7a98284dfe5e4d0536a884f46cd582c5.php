<div>
    <div class="mb-6 flex items-start justify-between gap-4 flex-wrap">
        <div>
            <h2 class="text-2xl font-bold">Skills</h2>
            <p class="text-ink-500 text-sm">Kelola skills dengan icon & progress level.</p>
        </div>
        <button wire:click="openCreate" class="btn-primary" data-testid="btn-create-skill">+ Tambah Skill</button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showForm): ?>
        <div class="card mb-6">
            <form wire:submit="save" class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="label">Nama Skill</label>
                    <input class="input" wire:model="name" data-testid="input-skill-name">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
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
                    <select class="input" wire:model="category">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat); ?>"><?php echo e($cat); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>
                <div>
                    <label class="label">Level (<?php echo e($level); ?>%)</label>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon_path || $icon_upload): ?>
                        <img src="<?php echo e($icon_upload ? $icon_upload->temporaryUrl() : $icon_path); ?>" class="h-12 w-12 mt-3 object-contain">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="btn-primary" data-testid="btn-save-skill">Save</button>
                    <button type="button" wire:click="$set('showForm', false)" class="btn-ghost">Cancel</button>
                </div>
            </form>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-testid="skill-row-<?php echo e($s->id); ?>">
                        <td class="table-td">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($s->icon_path): ?>
                                <img src="<?php echo e($s->icon_path); ?>" class="h-8 w-8 object-contain">
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="table-td font-medium"><?php echo e($s->name); ?></td>
                        <td class="table-td"><span class="chip"><?php echo e($s->category); ?></span></td>
                        <td class="table-td">
                            <div class="flex items-center gap-2">
                                <div class="w-24 h-1.5 bg-ink-200 dark:bg-white/10 rounded-full overflow-hidden">
                                    <div class="h-full bg-brand-500" style="width: <?php echo e($s->level); ?>%"></div>
                                </div>
                                <span class="text-xs"><?php echo e($s->level); ?>%</span>
                            </div>
                        </td>
                        <td class="table-td"><?php echo e($s->sort_order); ?></td>
                        <td class="table-td text-right">
                            <button wire:click="edit(<?php echo e($s->id); ?>)" class="text-brand-500 hover:underline mr-3" data-testid="btn-edit-skill-<?php echo e($s->id); ?>">Edit</button>
                            <button wire:click="delete(<?php echo e($s->id); ?>)" wire:confirm="Hapus skill ini?" class="text-red-500 hover:underline" data-testid="btn-delete-skill-<?php echo e($s->id); ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="table-td text-center text-ink-500">Belum ada skill.</td></tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/skills-manager.blade.php ENDPATH**/ ?>