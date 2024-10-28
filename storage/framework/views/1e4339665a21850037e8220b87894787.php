

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-add-announcement.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
    <script src="js/data-table.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title">
        <div class="row mt-3 mb-3">
            <div class="col">
                <?php if (isset($component)) { $__componentOriginal5406e8d7771770e2730decca9aaff420 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5406e8d7771770e2730decca9aaff420 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Announcement <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $attributes = $__attributesOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__attributesOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $component = $__componentOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__componentOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">View Announcements</li>
                    </ol>
                </nav>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <div>
                    <a href="<?php echo e(route('admin.announcement.create')); ?>" class="btn btn-primary">Add Announcement</a>
                </div>
            </div>
        </div>
        <div class="table-container" style="overflow-x: scroll">
            <table class="table table-bordered" id="example">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>    
                            <td><?php echo e($announcement->id); ?></td>
                            <td><?php echo e($announcement->title); ?></td>
                            <td>
                                <?php if($announcement->image_path): ?>
                                    <div class="text-center">
                                        <img class="image" src="<?php echo e(Storage::url($announcement->image_path)); ?>" alt="Supporting File" style="width: 100px" />
                                    </div>
                                <?php else: ?>
                                    <div class="text-center">
                                        <img src="/images/default-image.png" alt="Failed to load" style="width: 50px">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(Str::limit($announcement->content, 25, '...')); ?></td>
                            <td><?php echo e($announcement->created_at); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#<?php echo e($announcement->id); ?>">View</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.announcement.edit', $announcement->id)); ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete<?php echo e($announcement->id); ?>">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <?php if (isset($component)) { $__componentOriginal665402f2453a85e82fcc56e8df024d3c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal665402f2453a85e82fcc56e8df024d3c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.confirm-delete-announcement','data' => ['announcement' => $announcement,'modalId' => ''.e($announcement->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.confirm-delete-announcement'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['announcement' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($announcement),'modalId' => ''.e($announcement->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal665402f2453a85e82fcc56e8df024d3c)): ?>
<?php $attributes = $__attributesOriginal665402f2453a85e82fcc56e8df024d3c; ?>
<?php unset($__attributesOriginal665402f2453a85e82fcc56e8df024d3c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal665402f2453a85e82fcc56e8df024d3c)): ?>
<?php $component = $__componentOriginal665402f2453a85e82fcc56e8df024d3c; ?>
<?php unset($__componentOriginal665402f2453a85e82fcc56e8df024d3c); ?>
<?php endif; ?>  
                        <?php if (isset($component)) { $__componentOriginalbeaeac4aa7e96fa6e7f566537f4f97f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbeaeac4aa7e96fa6e7f566537f4f97f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.view-announcement','data' => ['announcement' => $announcement,'modalId' => ''.e($announcement->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.view-announcement'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['announcement' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($announcement),'modalId' => ''.e($announcement->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbeaeac4aa7e96fa6e7f566537f4f97f4)): ?>
<?php $attributes = $__attributesOriginalbeaeac4aa7e96fa6e7f566537f4f97f4; ?>
<?php unset($__attributesOriginalbeaeac4aa7e96fa6e7f566537f4f97f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbeaeac4aa7e96fa6e7f566537f4f97f4)): ?>
<?php $component = $__componentOriginalbeaeac4aa7e96fa6e7f566537f4f97f4; ?>
<?php unset($__componentOriginalbeaeac4aa7e96fa6e7f566537f4f97f4); ?>
<?php endif; ?>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer'); ?>
    <?php if (isset($component)) { $__componentOriginal77270b1c95fd7742f390c98b291675dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77270b1c95fd7742f390c98b291675dd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77270b1c95fd7742f390c98b291675dd)): ?>
<?php $attributes = $__attributesOriginal77270b1c95fd7742f390c98b291675dd; ?>
<?php unset($__attributesOriginal77270b1c95fd7742f390c98b291675dd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77270b1c95fd7742f390c98b291675dd)): ?>
<?php $component = $__componentOriginal77270b1c95fd7742f390c98b291675dd; ?>
<?php unset($__componentOriginal77270b1c95fd7742f390c98b291675dd); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#example', {
            lengthMenu: [5, 10, 25],  
            order: [[0, 'asc']],  
            autoWidth: false,  
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/announcement/announcement.blade.php ENDPATH**/ ?>