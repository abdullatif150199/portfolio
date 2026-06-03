<div class="w-full max-w-md mx-auto px-6">
    <div class="glass rounded-3xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white font-bold mb-4">AL</div>
            <h1 class="text-2xl font-bold">Welcome back</h1>
            <p class="text-sm text-ink-400 mt-1">Sign in to manage your portfolio</p>
        </div>

        <form wire:submit="authenticate" class="space-y-4">
            <div>
                <label class="label" for="email">Email</label>
                <input type="email" id="email" wire:model="email" class="input"
                       placeholder="admin@portfolio.test" data-testid="input-email" autofocus>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="label" for="password">Password</label>
                <input type="password" id="password" wire:model="password" class="input"
                       placeholder="••••••••" data-testid="input-password">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <label class="flex items-center gap-2 text-sm text-ink-300">
                <input type="checkbox" wire:model="remember" class="rounded border-white/20 bg-ink-900 text-brand-500">
                Remember me
            </label>
            <button type="submit" class="btn-primary w-full justify-center" data-testid="btn-login">
                <span wire:loading.remove wire:target="authenticate">Sign in</span>
                <span wire:loading wire:target="authenticate">Signing in...</span>
            </button>
        </form>

        <p class="text-center text-xs text-ink-500 mt-6">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-brand-400">← Back to website</a>
        </p>
    </div>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/auth/login.blade.php ENDPATH**/ ?>