

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-verify.css">

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
    <div class="page-content">
        <div class="col" style="margin-top: 3rem; margin-bottom: 3rem;">
            <?php if (isset($component)) { $__componentOriginal5406e8d7771770e2730decca9aaff420 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5406e8d7771770e2730decca9aaff420 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Verify User <?php echo $__env->renderComponent(); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Verify User</li>
                </ol>
            </nav>                
        </div>
        <div class="table-container">
            <table class="table table-bordered" id="example">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->firstname); ?></td>
                            <td><?php echo e($user->lastname); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if($user->status == 'to verify'): ?>
                                    <span class="badge text-bg-warning"><?php echo e($user->status); ?></span>
                                <?php else: ?>
                                    <span class="badge text-bg-danger">warning</span>
                                <?php endif; ?>
                            </td>
                            <td class="d-flex gap-3">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo e($user->id); ?>">Verify</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" 
                                    data-bs-target="#reject">Reject</button>
                            </td>
                        </tr>
                        <?php if (isset($component)) { $__componentOriginal1e34ebbd5d38f196fe5b27f430351ee4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e34ebbd5d38f196fe5b27f430351ee4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.verify-user','data' => ['user' => $user,'modalId' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.verify-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user),'modalId' => ''.e($user->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e34ebbd5d38f196fe5b27f430351ee4)): ?>
<?php $attributes = $__attributesOriginal1e34ebbd5d38f196fe5b27f430351ee4; ?>
<?php unset($__attributesOriginal1e34ebbd5d38f196fe5b27f430351ee4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e34ebbd5d38f196fe5b27f430351ee4)): ?>
<?php $component = $__componentOriginal1e34ebbd5d38f196fe5b27f430351ee4; ?>
<?php unset($__componentOriginal1e34ebbd5d38f196fe5b27f430351ee4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4923846c57615a0c6050cb90c78e0890 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4923846c57615a0c6050cb90c78e0890 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.reject-verify-user','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.reject-verify-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4923846c57615a0c6050cb90c78e0890)): ?>
<?php $attributes = $__attributesOriginal4923846c57615a0c6050cb90c78e0890; ?>
<?php unset($__attributesOriginal4923846c57615a0c6050cb90c78e0890); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4923846c57615a0c6050cb90c78e0890)): ?>
<?php $component = $__componentOriginal4923846c57615a0c6050cb90c78e0890; ?>
<?php unset($__componentOriginal4923846c57615a0c6050cb90c78e0890); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#example', {
            lengthMenu: [5, 10, 25],
            language: {
                buttons: {
                    selectAll: 'Select all items',
                    selectNone: 'Select none'
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
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
<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/verify.blade.php ENDPATH**/ ?>