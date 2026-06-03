<div id="top">


<section class="relative overflow-hidden">
    <div class="absolute inset-0 grid-bg opacity-60 [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    <div class="container-x relative pt-20 pb-28 lg:pt-32 lg:pb-40">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6" data-reveal>
                <div class="inline-flex items-center gap-2 chip">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Available for new projects
                </div>
                <h1 class="section-title text-balance">
                    Hi, I'm <span class="bg-gradient-to-r from-brand-500 to-brand-700 dark:from-brand-300 dark:to-brand-500 bg-clip-text text-transparent"><?php echo e($about?->name ?? 'Abdul Latif Mansyur'); ?></span>
                    <br class="hidden sm:block">
                    <span class="text-ink-700 dark:text-ink-300">— <?php echo e($about?->title ?? 'Fullstack Web Developer'); ?>.</span>
                </h1>
                <p class="text-lg text-ink-600 dark:text-ink-300 max-w-2xl text-balance">
                    <?php echo e($about?->subtitle ?? 'Membangun produk web yang cepat, elegan, dan berdampak.'); ?>

                </p>
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="#projects" class="btn-primary" data-testid="hero-cta-projects">
                        Lihat Projects
                        <span aria-hidden>↓</span>
                    </a>
                    <a href="#contact" class="btn-ghost" data-testid="hero-cta-contact">
                        Hubungi Saya
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($about?->resume_url): ?>
                        <a href="<?php echo e($about->resume_url); ?>" target="_blank"
                           class="text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-brand-600 underline underline-offset-4"
                           data-testid="hero-cta-resume">Download CV</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="flex items-center gap-6 pt-6 text-sm text-ink-500">
                    <div>
                        <div class="text-2xl font-bold text-ink-900 dark:text-white"><?php echo e($about?->years_experience ?? 5); ?>+</div>
                        <div>Years Exp.</div>
                    </div>
                    <div class="h-10 w-px bg-ink-200 dark:bg-white/10"></div>
                    <div>
                        <div class="text-2xl font-bold text-ink-900 dark:text-white"><?php echo e($about?->projects_completed ?? 40); ?>+</div>
                        <div>Projects Done</div>
                    </div>
                    <div class="h-10 w-px bg-ink-200 dark:bg-white/10"></div>
                    <div>
                        <div class="text-2xl font-bold text-ink-900 dark:text-white"><?php echo e($clients->count()); ?>+</div>
                        <div>Happy Clients</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 relative" data-reveal>
                <div class="glass rounded-3xl p-2 animate-float">
                    <div class="relative rounded-2xl overflow-hidden aspect-square">
                        <img src="<?php echo e($about?->photo_path ?? 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?w=800&h=800&fit=crop'); ?>"
                             alt="<?php echo e($about?->name); ?>"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-tr from-brand-900/20 via-transparent to-transparent"></div>
                    </div>
                </div>
                
                <div class="absolute -left-4 top-10 glass rounded-2xl px-4 py-3 text-sm font-mono hidden sm:flex items-center gap-2 shadow-xl">
                    <span class="text-emerald-500">●</span> Laravel + Livewire
                </div>
                <div class="absolute -right-4 bottom-8 glass rounded-2xl px-4 py-3 text-sm font-mono hidden sm:flex items-center gap-2 shadow-xl">
                    <span class="text-brand-500">{ }</span> Clean Code
                </div>
            </div>
        </div>
    </div>
</section>


<section id="about" class="py-20 lg:py-28">
    <div class="container-x">
        <div class="grid lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5" data-reveal>
                <div class="section-eyebrow">About Me</div>
                <h2 class="section-title">Passionate about <br>web craftsmanship.</h2>
            </div>
            <div class="lg:col-span-7 space-y-5 text-lg text-ink-600 dark:text-ink-300 leading-relaxed" data-reveal>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = explode("\n\n", $about?->bio ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $para): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($para); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4">
                    <div class="card !p-4">
                        <div class="text-xs text-ink-500 mb-1">Email</div>
                        <a href="mailto:<?php echo e($about?->email); ?>" class="text-sm font-medium hover:text-brand-600 break-all"><?php echo e($about?->email); ?></a>
                    </div>
                    <div class="card !p-4">
                        <div class="text-xs text-ink-500 mb-1">Location</div>
                        <div class="text-sm font-medium"><?php echo e($about?->location); ?></div>
                    </div>
                    <div class="card !p-4">
                        <div class="text-xs text-ink-500 mb-1">GitHub</div>
                        <a href="<?php echo e($about?->github_url); ?>" target="_blank" class="text-sm font-medium hover:text-brand-600">@abdullatif</a>
                    </div>
                    <div class="card !p-4">
                        <div class="text-xs text-ink-500 mb-1">LinkedIn</div>
                        <a href="<?php echo e($about?->linkedin_url); ?>" target="_blank" class="text-sm font-medium hover:text-brand-600">in/abdullatif</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="skills" class="py-20 lg:py-28 bg-ink-50/60 dark:bg-white/[0.02]">
    <div class="container-x">
        <div class="max-w-2xl mb-12" data-reveal>
            <div class="section-eyebrow">Skills & Tools</div>
            <h2 class="section-title">Stack yang saya kuasai.</h2>
            <p class="text-ink-600 dark:text-ink-300 mt-3">Dari backend yang robust hingga frontend yang elegan, ini teknologi yang saya pakai sehari-hari.</p>
        </div>

        <div class="space-y-10">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-reveal>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-ink-500 mb-4"><?php echo e($category); ?></h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card !p-4 group">
                                <div class="flex items-center gap-3 mb-3">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($skill->icon_path): ?>
                                        <img src="<?php echo e($skill->icon_path); ?>" alt="<?php echo e($skill->name); ?>"
                                             class="h-10 w-10 object-contain group-hover:scale-110 transition" loading="lazy">
                                    <?php else: ?>
                                        <div class="h-10 w-10 rounded-lg bg-brand-500/10 text-brand-600 dark:text-brand-300 flex items-center justify-center font-bold"><?php echo e(substr($skill->name,0,1)); ?></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-semibold truncate"><?php echo e($skill->name); ?></div>
                                        <div class="text-xs text-ink-500"><?php echo e($skill->level); ?>%</div>
                                    </div>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-ink-200 dark:bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-700 transition-all duration-700"
                                         style="width: <?php echo e($skill->level); ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section id="projects" class="py-20 lg:py-28">
    <div class="container-x">
        <div class="flex items-end justify-between mb-12 flex-wrap gap-4" data-reveal>
            <div class="max-w-2xl">
                <div class="section-eyebrow">Selected Work</div>
                <h2 class="section-title">Projects yang saya bangun.</h2>
                <p class="text-ink-600 dark:text-ink-300 mt-3">Pilihan project dari berbagai industri — dari marketplace hingga education platform.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="card !p-0 overflow-hidden group" data-reveal data-testid="project-card-<?php echo e($p->id); ?>">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="<?php echo e($p->cover_path); ?>" alt="<?php echo e($p->title); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->is_featured): ?>
                            <span class="absolute top-3 left-3 chip !bg-amber-500/90 !text-white">Featured</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950/70 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs uppercase tracking-wider text-brand-600 dark:text-brand-300 mb-1"><?php echo e($p->category); ?></div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-brand-600 transition"><?php echo e($p->title); ?></h3>
                        <p class="text-sm text-ink-600 dark:text-ink-400 line-clamp-3 mb-4"><?php echo e($p->description); ?></p>
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ($p->tech_stack ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="chip !text-[10px] !px-2"><?php echo e($t); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->demo_url): ?>
                                <a href="<?php echo e($p->demo_url); ?>" target="_blank" class="font-semibold text-brand-600 hover:underline" data-testid="project-demo-<?php echo e($p->id); ?>">Live demo →</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->repo_url): ?>
                                <a href="<?php echo e($p->repo_url); ?>" target="_blank" class="text-ink-500 hover:text-ink-900 dark:hover:text-white" data-testid="project-repo-<?php echo e($p->id); ?>">Source ↗</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section id="experience" class="py-20 lg:py-28 bg-ink-50/60 dark:bg-white/[0.02]">
    <div class="container-x">
        <div class="max-w-2xl mb-12" data-reveal>
            <div class="section-eyebrow">Career Journey</div>
            <h2 class="section-title">Professional Experience.</h2>
        </div>

        <div class="relative max-w-3xl mx-auto">
            <div class="absolute left-4 sm:left-1/2 top-0 bottom-0 w-px bg-ink-200 dark:bg-white/10"></div>
            <div class="space-y-12">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-8 <?php echo e($i%2===0 ? 'sm:flex-row' : 'sm:flex-row-reverse'); ?>" data-reveal>
                        <div class="absolute left-4 sm:left-1/2 -translate-x-1/2 h-3 w-3 rounded-full bg-brand-500 ring-4 ring-white dark:ring-ink-950"></div>
                        <div class="sm:w-1/2 sm:pl-12 sm:pr-0 pl-12">
                            <div class="card">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <h3 class="font-bold"><?php echo e($e->role); ?></h3>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($e->is_current): ?>
                                        <span class="chip !bg-emerald-500/10 !text-emerald-600 dark:!text-emerald-300">Current</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="text-brand-600 dark:text-brand-300 font-semibold mb-1"><?php echo e($e->company); ?></div>
                                <div class="text-xs text-ink-500 mb-3">
                                    <?php echo e(\Carbon\Carbon::parse($e->start_date)->format('M Y')); ?> —
                                    <?php echo e($e->is_current ? 'Present' : \Carbon\Carbon::parse($e->end_date)->format('M Y')); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($e->location): ?> · <?php echo e($e->location); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <p class="text-sm text-ink-600 dark:text-ink-400"><?php echo e($e->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count()): ?>
<section id="clients" class="py-16">
    <div class="container-x">
        <p class="text-center text-sm uppercase tracking-[0.2em] text-ink-500 mb-8" data-reveal>Trusted by teams at</p>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6 items-center" data-reveal>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($c->website_url ?? '#'); ?>" target="_blank"
                   class="flex items-center justify-center h-16 px-4 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transition">
                    <img src="<?php echo e($c->logo_path); ?>" alt="<?php echo e($c->name); ?>" class="max-h-10 max-w-full object-contain" loading="lazy">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section id="testimonials" class="py-20 lg:py-28">
    <div class="container-x">
        <div class="max-w-2xl mb-12" data-reveal>
            <div class="section-eyebrow">Testimonials</div>
            <h2 class="section-title">Apa kata mereka.</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <figure class="card" data-reveal>
                    <div class="flex gap-1 text-amber-400 mb-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i=0;$i<$t->rating;$i++): ?> <span>★</span> <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <blockquote class="text-ink-700 dark:text-ink-200 leading-relaxed mb-5">
                        "<?php echo e($t->message); ?>"
                    </blockquote>
                    <figcaption class="flex items-center gap-3">
                        <img src="<?php echo e($t->avatar_path); ?>" alt="<?php echo e($t->name); ?>" class="h-11 w-11 rounded-full object-cover ring-2 ring-brand-500/30">
                        <div>
                            <div class="font-semibold"><?php echo e($t->name); ?></div>
                            <div class="text-xs text-ink-500"><?php echo e($t->role); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($t->company): ?> · <?php echo e($t->company); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                        </div>
                    </figcaption>
                </figure>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section id="contact" class="py-20 lg:py-28">
    <div class="container-x">
        <div class="glass rounded-3xl p-10 lg:p-16 text-center max-w-4xl mx-auto" data-reveal>
            <div class="section-eyebrow !mb-2">Get in touch</div>
            <h2 class="section-title mb-4">Punya project menarik? <br>Mari ngobrol.</h2>
            <p class="text-ink-600 dark:text-ink-300 max-w-xl mx-auto mb-8">
                Saya selalu terbuka untuk diskusi, kolaborasi, atau sekedar networking. Jangan ragu untuk menghubungi.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="mailto:<?php echo e($about?->email); ?>" class="btn-primary" data-testid="contact-email">
                    ✉️ <?php echo e($about?->email); ?>

                </a>
                <a href="<?php echo e($about?->github_url); ?>" target="_blank" class="btn-ghost" data-testid="contact-github">GitHub</a>
                <a href="<?php echo e($about?->linkedin_url); ?>" target="_blank" class="btn-ghost" data-testid="contact-linkedin">LinkedIn</a>
            </div>
        </div>
    </div>
</section>

</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/public/home-page.blade.php ENDPATH**/ ?>