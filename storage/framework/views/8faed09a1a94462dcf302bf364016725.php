<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/><!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin-css/layout.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldPushContent('assets'); ?>

    <title>Document</title>
</head>
    <body>
        <?php if(session('success')): ?>
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo e(session('success')); ?>

                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(session('error-toast')): ?>
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo e(session('error-toast')); ?>

                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalfa1ad47626571b08040348a362e6b30c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa1ad47626571b08040348a362e6b30c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa1ad47626571b08040348a362e6b30c)): ?>
<?php $attributes = $__attributesOriginalfa1ad47626571b08040348a362e6b30c; ?>
<?php unset($__attributesOriginalfa1ad47626571b08040348a362e6b30c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa1ad47626571b08040348a362e6b30c)): ?>
<?php $component = $__componentOriginalfa1ad47626571b08040348a362e6b30c; ?>
<?php unset($__componentOriginalfa1ad47626571b08040348a362e6b30c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal1716d9353f02dae3a1a0d304ffe03b0c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1716d9353f02dae3a1a0d304ffe03b0c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1716d9353f02dae3a1a0d304ffe03b0c)): ?>
<?php $attributes = $__attributesOriginal1716d9353f02dae3a1a0d304ffe03b0c; ?>
<?php unset($__attributesOriginal1716d9353f02dae3a1a0d304ffe03b0c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1716d9353f02dae3a1a0d304ffe03b0c)): ?>
<?php $component = $__componentOriginal1716d9353f02dae3a1a0d304ffe03b0c; ?>
<?php unset($__componentOriginal1716d9353f02dae3a1a0d304ffe03b0c); ?>
<?php endif; ?>
        <div class="content-wrapper">
            <section class="content" id="content">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>
        <?php echo $__env->yieldPushContent('scripts'); ?>
        <?php echo $__env->yieldPushContent('footer'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH E:\bms\resources\views/components/admin-components/admin-layout.blade.php ENDPATH**/ ?>