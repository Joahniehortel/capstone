
<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/announcement.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <?php if (isset($component)) { $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.page-title','data' => ['style' => 'font-size: 25px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'font-size: 25px;']); ?>ANNOUNCEMENTS <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $attributes = $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $component = $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
        <div class="list">
            <?php if($announcements->isNotEmpty()): ?>
                <div>
                    <ul class="announcement-list-container w-100">
                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="announcement-container">    
                                    <div class="row">
                                        <div class="col-12 col-md-2 text-center mb-3 mb-md-0">
                                            <?php if(!empty($announcement->image_path)): ?>
                                                <img src="<?php echo e(Storage::url($announcement->image_path)); ?>" alt="Announcement Image" class="img-fluid">
                                            <?php else: ?>
                                                <img src="/images/barangaylogo.png" alt="Announcement Image" style="width: 150px" class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            <h1 class="announcement_title" style="font-weight: bold; color:#6D4C41"><?php echo e($truncatedAnnouncements[$index]['title']); ?></h1>
                                            <p style="font-size: 14px"><i class='bx bxs-calendar-check'></i><?php echo e(\Carbon\Carbon::parse($announcement->created_at)->format('F j, Y')); ?></p>
                                            <p class="announcement_content" style="font-weight: 400"><?php echo e($truncatedAnnouncements[$index]['truncated_content']); ?></p>
                                            <?php if (isset($component)) { $__componentOriginale60fdc5b62bd08f4911356f87728776c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale60fdc5b62bd08f4911356f87728776c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.view-announcement-user','data' => ['announcement' => $announcement,'modalId' => ''.e($announcement->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.view-announcement-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['announcement' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($announcement),'modalId' => ''.e($announcement->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale60fdc5b62bd08f4911356f87728776c)): ?>
<?php $attributes = $__attributesOriginale60fdc5b62bd08f4911356f87728776c; ?>
<?php unset($__attributesOriginale60fdc5b62bd08f4911356f87728776c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale60fdc5b62bd08f4911356f87728776c)): ?>
<?php $component = $__componentOriginale60fdc5b62bd08f4911356f87728776c; ?>
<?php unset($__componentOriginale60fdc5b62bd08f4911356f87728776c); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" style="background: transparent; color:black; border:none;" data-bs-toggle="modal" data-bs-target="#<?php echo e($announcement->id); ?>">View Details</button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <?php if($announcements->isEmpty()): ?>
            <div class="no-announcements-container text-center">
                <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" style="width: 300px">
                <p>No announcements available at this time.</p>
            </div>
        <?php endif; ?>    
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.user-components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/user/announcement.blade.php ENDPATH**/ ?>