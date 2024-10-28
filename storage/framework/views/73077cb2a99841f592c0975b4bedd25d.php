

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/request.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
    <div class="page-content">
        <?php if (isset($component)) { $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>REQUEST <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $attributes = $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $component = $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
        <div class="card-list">
            <?php if(isset($documents) && count($documents) > 0): ?>
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card" style="width: 18rem;" style="display: flex; justify-content:center">
                    <?php if(empty($document->image)): ?>
                        <img src="/images/dc.png" alt="Failed to load image" class="card-img-top">
                        <?php else: ?>
                            <img src="images/image.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="details" style="height: 100px">
                                <h5 class="card-title"><?php echo e($document->file_name); ?></h5>
                                <p class="card-text"><?php echo e(Str::limit($document->file_details, 75, '...')); ?></p>
                            </div>
                            <?php if(Auth::check()): ?>
                                <?php echo csrf_field(); ?>
                                <div class="d-flex justify-content-end align-items-end">
                                    <button class="request-btn" data-bs-toggle="modal" data-bs-target="#requestForm-<?php echo e($document->id); ?>">Proceed 
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </button>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal29f8bee5d02f89556e0b8434bfa351b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29f8bee5d02f89556e0b8434bfa351b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.request-form','data' => ['requestForm' => $document,'modalId' => 'requestForm-'.e($document->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.request-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['requestForm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document),'modalId' => 'requestForm-'.e($document->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29f8bee5d02f89556e0b8434bfa351b0)): ?>
<?php $attributes = $__attributesOriginal29f8bee5d02f89556e0b8434bfa351b0; ?>
<?php unset($__attributesOriginal29f8bee5d02f89556e0b8434bfa351b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29f8bee5d02f89556e0b8434bfa351b0)): ?>
<?php $component = $__componentOriginal29f8bee5d02f89556e0b8434bfa351b0; ?>
<?php unset($__componentOriginal29f8bee5d02f89556e0b8434bfa351b0); ?>
<?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>">Login to request this document</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="no-announcements-container text-center">
                    <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" alt="" style="width: 300px">
                    <p>There are no documents available for request right now. Please revisit us later for updates</p>
                </div>
            <?php endif; ?>
        </div>
        <img class="image" src="/images/building.png" alt="">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.user-components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/user/services/request.blade.php ENDPATH**/ ?>