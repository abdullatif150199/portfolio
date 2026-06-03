<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? config('app.name')); ?></title>
    <meta name="description" content="Portfolio Abdul Latif Mansyur — Fullstack Web Developer">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>👨🏻‍💻</text></svg>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="min-h-screen relative">
    
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -left-40 h-[480px] w-[480px] rounded-full gradient-blur"></div>
        <div class="absolute top-1/3 -right-40 h-[520px] w-[520px] rounded-full gradient-blur opacity-60"></div>
    </div>

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main><?php echo e($slot); ?></main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\ABDUL LATIF\Downloads\laravel-portfolio\laravel-portfolio\resources\views/layouts/app.blade.php ENDPATH**/ ?>