

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-officials.css">
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
    <?php if($errors->any()): ?>
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
    <div class="table-header">
        <div class="col mb-3">
            <?php if (isset($component)) { $__componentOriginal5406e8d7771770e2730decca9aaff420 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5406e8d7771770e2730decca9aaff420 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Officials <?php echo $__env->renderComponent(); ?>
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
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px">View Officials</li>
                </ol>
            </nav>
        </div>
        <div class="col add-btn">
            <a class="btn btn-primary" style="font-size: 12px" href="<?php echo e(route('official.create')); ?>">Add Official</a>
        </div>
    </div>
    <div class="table-container">
        <table class="table" style="width:100%" id="official">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $officials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $official): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($official->id); ?></td>
                        <td>
                            <?php if(!empty($official->image)): ?>
                                <img class="image" src="<?php echo e(Storage::url($official->image)); ?>" alt="Supporting File" />
                            <?php else: ?>
                                <img class="image" src="/images/profile-picture.png" alt="Supporting File" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($official->firstname); ?> <?php echo e($official->lastname); ?></td>
                        <td><?php echo e($official->position); ?></td>
                        <td>
                            <?php switch($official->official_status):
                                case ('active'): ?>
                                    <span class="badge bg-success"><?php echo e($official->official_status); ?></span>
                                    <?php break; ?>
                                <?php case ('inactive'): ?>
                                    <span class="badge bg-danger"><?php echo e($official->official_status); ?></span> 
                                    <?php break; ?>
                                <?php default: ?>
                                    <span class="badge bg-secondary"><?php echo e($official->official_status); ?></span> 
                            <?php endswitch; ?>
                        </td>                        
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <form id="edit-form-<?php echo e($official->id); ?>"
                                        action="<?php echo e(route('official.edit', $official->id)); ?>" method="GET">
                                        <li> <a class="dropdown-item"
                                                href="javascript:document.getElementById('edit-form-<?php echo e($official->id); ?>').submit()">Edit</a>
                                        </li>
                                    </form>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#viewOfficialProfile-<?php echo e($official->id); ?>">View</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo e($official->id); ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php if (isset($component)) { $__componentOriginal59dfde9a99f129623779697d03f53688 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal59dfde9a99f129623779697d03f53688 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.confirm-delete-official','data' => ['official' => $official,'modalId' => ''.e($official->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.confirm-delete-official'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['official' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($official),'modalId' => ''.e($official->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal59dfde9a99f129623779697d03f53688)): ?>
<?php $attributes = $__attributesOriginal59dfde9a99f129623779697d03f53688; ?>
<?php unset($__attributesOriginal59dfde9a99f129623779697d03f53688); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal59dfde9a99f129623779697d03f53688)): ?>
<?php $component = $__componentOriginal59dfde9a99f129623779697d03f53688; ?>
<?php unset($__componentOriginal59dfde9a99f129623779697d03f53688); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal87826e3af8b02b60839a29bed48808a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87826e3af8b02b60839a29bed48808a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.view-official-profile','data' => ['official' => $official,'modalId' => 'viewOfficialProfile-'.e($official->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.view-official-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['official' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($official),'modalId' => 'viewOfficialProfile-'.e($official->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87826e3af8b02b60839a29bed48808a3)): ?>
<?php $attributes = $__attributesOriginal87826e3af8b02b60839a29bed48808a3; ?>
<?php unset($__attributesOriginal87826e3af8b02b60839a29bed48808a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87826e3af8b02b60839a29bed48808a3)): ?>
<?php $component = $__componentOriginal87826e3af8b02b60839a29bed48808a3; ?>
<?php unset($__componentOriginal87826e3af8b02b60839a29bed48808a3); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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
    $(document).ready(function() {
        $('#official').DataTable({
            lengthMenu: [5, 10, 25],
            scrollCollapse: true,
            scroller: true,
            responsive: true,
            
        });
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/officials/official.blade.php ENDPATH**/ ?>