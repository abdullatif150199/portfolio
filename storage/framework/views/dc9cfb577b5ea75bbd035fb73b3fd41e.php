<div>
    <div class="mb-6 flex items-start justify-between">
        <div>
            <h2 class="text-2xl font-bold">About Me</h2>
            <p class="text-ink-500 text-sm">Profil utama yang tampil di hero & about section.</p>
        </div>
    </div>

    <form wire:submit="save" class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-5">
            <div class="card space-y-4">
                <h3 class="font-semibold">Identitas</h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="label">Nama</label>
                        <input class="input" wire:model="name" data-testid="input-name">
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
                        <label class="label">Title</label>
                        <input class="input" wire:model="title" data-testid="input-title">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="label">Subtitle</label>
                        <input class="input" wire:model="subtitle" data-testid="input-subtitle">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="label">Bio (gunakan dua baris kosong untuk paragraf baru)</label>
                        <textarea rows="8" class="input" wire:model="bio" data-testid="input-bio"></textarea>
                    </div>
                </div>
            </div>

            <div class="card space-y-4">
                <h3 class="font-semibold">Kontak & Sosial</h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div><label class="label">Email</label><input class="input" wire:model="email"></div>
                    <div><label class="label">Phone</label><input class="input" wire:model="phone"></div>
                    <div><label class="label">Location</label><input class="input" wire:model="location"></div>
                    <div><label class="label">Resume URL</label><input class="input" wire:model="resume_url"></div>
                    <div><label class="label">GitHub URL</label><input class="input" wire:model="github_url"></div>
                    <div><label class="label">LinkedIn URL</label><input class="input" wire:model="linkedin_url"></div>
                    <div><label class="label">Twitter URL</label><input class="input" wire:model="twitter_url"></div>
                    <div><label class="label">Website URL</label><input class="input" wire:model="website_url"></div>
                </div>
            </div>
        </div>

        <div class="space-y-5">
            <div class="card">
                <h3 class="font-semibold mb-4">Foto Profil</h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo_path || $photo_upload): ?>
                    <img src="<?php echo e($photo_upload ? $photo_upload->temporaryUrl() : $photo_path); ?>"
                         alt="" class="aspect-square w-full rounded-2xl object-cover mb-3">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <label class="label">Upload foto baru</label>
                <input type="file" wire:model="photo_upload" accept="image/*" class="input" data-testid="input-photo">
                <p class="text-xs text-ink-500 mt-2">Atau gunakan URL langsung:</p>
                <input class="input mt-1" wire:model="photo_path" placeholder="https://...">
            </div>

            <div class="card grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Years Exp.</label>
                    <input type="number" class="input" wire:model="years_experience">
                </div>
                <div>
                    <label class="label">Projects Done</label>
                    <input type="number" class="input" wire:model="projects_completed">
                </div>
            </div>

            <button type="submit" class="btn-primary w-full justify-center" data-testid="btn-save-about">
                <span wire:loading.remove wire:target="save">Save Changes</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </form>
</div>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/livewire/admin/about-manager.blade.php ENDPATH**/ ?>