<nav class="sticky top-0 z-40 border-b border-ink-200/60 dark:border-white/10
            bg-white/70 dark:bg-ink-950/70 backdrop-blur-xl">
    <div class="container-x flex items-center justify-between h-16">
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 font-bold" data-testid="logo">
            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl
                         bg-gradient-to-br from-brand-500 to-brand-700 text-white text-sm">AL</span>
            <span class="hidden sm:inline">Abdul Latif</span>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
            <li><a href="#about" class="hover:text-brand-600 transition" data-testid="nav-about">About</a></li>
            <li><a href="#skills" class="hover:text-brand-600 transition" data-testid="nav-skills">Skills</a></li>
            <li><a href="#projects" class="hover:text-brand-600 transition" data-testid="nav-projects">Projects</a></li>
            <li><a href="#experience" class="hover:text-brand-600 transition" data-testid="nav-experience">Experience</a></li>
            <li><a href="#testimonials" class="hover:text-brand-600 transition" data-testid="nav-testimonials">Testimonials</a></li>
        </ul>

        <div class="flex items-center gap-2">
            <button onclick="window.toggleTheme()" class="h-9 w-9 inline-flex items-center justify-center rounded-full
                                                          border border-ink-200 dark:border-white/10
                                                          hover:border-brand-500 transition"
                    aria-label="Toggle theme" data-testid="btn-theme-toggle">🌓</button>
            <a href="#contact" class="btn-primary hidden sm:inline-flex" data-testid="nav-contact">
                Contact
                <span aria-hidden>→</span>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isAdmin()): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn-ghost" data-testid="nav-admin">Admin</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/partials/navbar.blade.php ENDPATH**/ ?>