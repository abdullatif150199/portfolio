<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Admin Dashboard'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="min-h-screen bg-ink-50 dark:bg-ink-950 text-ink-900 dark:text-ink-100">
    <div class="flex min-h-screen">
        
        <aside class="hidden lg:flex w-64 flex-col fixed inset-y-0 z-30
                      border-r border-ink-200 dark:border-white/10
                      bg-white dark:bg-ink-900/80 backdrop-blur-xl">
            <div class="px-6 py-6 border-b border-ink-200 dark:border-white/10">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 font-bold text-lg" data-testid="admin-logo">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-brand-500 text-white">AL</span>
                    <span>Admin Panel</span>
                </a>
            </div>
            <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
                <?php
                    $menu = [
                        ['admin.dashboard',    'Dashboard',    '📊'],
                        ['admin.about',        'About Me',     '🪪'],
                        ['admin.skills',       'Skills',       '⚡'],
                        ['admin.projects',     'Projects',     '🗂️'],
                        ['admin.experiences',  'Experience',   '💼'],
                        ['admin.clients',      'Clients',      '🤝'],
                        ['admin.testimonials', 'Testimonials', '💬'],
                    ];
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$route, $label, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($route)); ?>" wire:navigate
                       data-testid="nav-<?php echo e(Str::slug($label)); ?>"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition
                              <?php echo e(request()->routeIs($route) ? 'bg-brand-500/10 text-brand-600 dark:text-brand-300 font-semibold' : 'text-ink-700 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-white/5'); ?>">
                        <span class="text-base"><?php echo e($icon); ?></span>
                        <span><?php echo e($label); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </nav>
            <div class="p-4 border-t border-ink-200 dark:border-white/10">
                <div class="text-xs text-ink-500 mb-2">Logged in as</div>
                <div class="text-sm font-medium mb-3"><?php echo e(auth()->user()?->name); ?></div>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full text-sm px-3 py-2 rounded-lg
                                                 bg-ink-100 dark:bg-white/5 hover:bg-red-500 hover:text-white transition"
                            data-testid="btn-logout">
                        Sign out
                    </button>
                </form>
            </div>
        </aside>

        <div class="lg:pl-64 flex-1 flex flex-col">
            <header class="sticky top-0 z-20 border-b border-ink-200 dark:border-white/10
                           bg-white/80 dark:bg-ink-950/80 backdrop-blur">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="font-semibold"><?php echo e($title ?? 'Admin'); ?></h1>
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('home')); ?>" target="_blank"
                           class="text-sm px-3 py-1.5 rounded-lg border border-ink-200 dark:border-white/10 hover:border-brand-500"
                           data-testid="btn-view-site">View site ↗</a>
                        <button onclick="window.toggleTheme()" class="px-3 py-1.5 rounded-lg border border-ink-200 dark:border-white/10"
                                data-testid="btn-theme">🌓</button>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('ok')): ?>
                    <div class="mb-4 px-4 py-3 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-300 border border-emerald-500/20"
                         data-testid="flash-success">
                        <?php echo e(session('ok')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/layouts/admin.blade.php ENDPATH**/ ?>