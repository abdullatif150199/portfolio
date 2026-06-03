<div>
    <div class="mb-8">
        <h2 class="text-3xl font-bold">Welcome back, <?php echo e(auth()->user()->name); ?> 👋</h2>
        <p class="text-ink-500 mt-1">Here's what's happening with your portfolio.</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-10">
        <?php
            $cards = [
                ['Projects',     $stats['projects'],     'admin.projects',     '🗂️'],
                ['Skills',       $stats['skills'],       'admin.skills',       '⚡'],
                ['Experience',   $stats['experiences'],  'admin.experiences',  '💼'],
                ['Clients',      $stats['clients'],      'admin.clients',      '🤝'],
                ['Testimonials', $stats['testimonials'], 'admin.testimonials', '💬'],
                ['About Me',     $stats['about_done'] ? '✓' : '–', 'admin.about', '🪪'],
            ];
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $val, $route, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($route)); ?>" wire:navigate class="card group" data-testid="stat-<?php echo e(Str::slug($label)); ?>">
                <div class="text-2xl mb-2"><?php echo e($icon); ?></div>
                <div class="text-3xl font-bold mb-1"><?php echo e($val); ?></div>
                <div class="text-xs text-ink-500 group-hover:text-brand-500 transition"><?php echo e($label); ?> →</div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="card">
        <h3 class="font-semibold mb-4">Recent Projects</h3>
        <div class="divide-y divide-ink-200 dark:divide-white/5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recent_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex items-center gap-4 py-3">
                    <img src="<?php echo e($p->cover_path); ?>" alt="" class="h-12 w-16 rounded object-cover">
                    <div class="flex-1 min-w-0">
                        <div class="font-medium truncate"><?php echo e($p->title); ?></div>
                        <div class="text-xs text-ink-500"><?php echo e($p->category); ?></div>
                    </div>
                    <a href="<?php echo e(route('admin.projects')); ?>" wire:navigate class="text-sm text-brand-500 hover:underline">Manage</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-sm text-ink-500 py-3">No projects yet.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/dashboard.blade.php ENDPATH**/ ?>