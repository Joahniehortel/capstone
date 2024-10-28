

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-document.css">
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
    <div class="table-header mb-3 mt-3">
        <div class="row">
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
<?php $component->withAttributes([]); ?>Document Requests <?php echo $__env->renderComponent(); ?>
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
                        <li class="breadcrumb-item active" aria-current="page">View Document Request</li>
                    </ol>
                </nav>
            </div>
            <div class="col add-btn d-flex justify-content-end align-items-center">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocument" style="font-size: 12px"> Add Document</a>
                
                <?php if (isset($component)) { $__componentOriginalcb753ef562ecd96a28b4b44f287d8579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb753ef562ecd96a28b4b44f287d8579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.add-document','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.add-document'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb753ef562ecd96a28b4b44f287d8579)): ?>
<?php $attributes = $__attributesOriginalcb753ef562ecd96a28b4b44f287d8579; ?>
<?php unset($__attributesOriginalcb753ef562ecd96a28b4b44f287d8579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb753ef562ecd96a28b4b44f287d8579)): ?>
<?php $component = $__componentOriginalcb753ef562ecd96a28b4b44f287d8579; ?>
<?php unset($__componentOriginalcb753ef562ecd96a28b4b44f287d8579); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="table-container mb-3">
        <table class="table table-bordered text-start " style="width:100%" id="example">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Document Name</th>
                    <th scope="col" >Description</th>
                    <th scope="col"></th>
            </thead>
            <tbody class="text-center">
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($document->id); ?></td>
                        <td><?php echo e($document->file_name); ?></td>
                        <td><?php echo e(Str::limit($document->file_details, 50, '...')); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="font-size: 12px">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#<?php echo e($document->id); ?>">Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete<?php echo e($document->id); ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php if (isset($component)) { $__componentOriginal0670211ffb12e5c0ef7e225412f39198 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0670211ffb12e5c0ef7e225412f39198 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.edit-document','data' => ['modalId' => $document->id,'document' => $document]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.edit-document'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document->id),'document' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0670211ffb12e5c0ef7e225412f39198)): ?>
<?php $attributes = $__attributesOriginal0670211ffb12e5c0ef7e225412f39198; ?>
<?php unset($__attributesOriginal0670211ffb12e5c0ef7e225412f39198); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0670211ffb12e5c0ef7e225412f39198)): ?>
<?php $component = $__componentOriginal0670211ffb12e5c0ef7e225412f39198; ?>
<?php unset($__componentOriginal0670211ffb12e5c0ef7e225412f39198); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal74ad48ad6ff230d560b6ab9be4c87494 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74ad48ad6ff230d560b6ab9be4c87494 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.delete-document','data' => ['modalId' => $document->id,'document' => $document]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.delete-document'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document->id),'document' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74ad48ad6ff230d560b6ab9be4c87494)): ?>
<?php $attributes = $__attributesOriginal74ad48ad6ff230d560b6ab9be4c87494; ?>
<?php unset($__attributesOriginal74ad48ad6ff230d560b6ab9be4c87494); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74ad48ad6ff230d560b6ab9be4c87494)): ?>
<?php $component = $__componentOriginal74ad48ad6ff230d560b6ab9be4c87494; ?>
<?php unset($__componentOriginal74ad48ad6ff230d560b6ab9be4c87494); ?>
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
    new DataTable('#example', {
        lengthMenu: [5, 10, 25],  
        order: [[0, 'asc']],  
        autoWidth: false,  
        columnDefs: [
            { width: "5%", targets: 0 },  
            { width: "25%", targets: 1 }
        ],
        dom: '',  
        language: {
            buttons: {
                selectAll: 'Select all items',
                selectNone: 'Select none'
            }
        }
    });

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/document/document.blade.php ENDPATH**/ ?>