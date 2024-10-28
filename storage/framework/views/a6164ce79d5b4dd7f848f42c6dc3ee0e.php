

<?php $__env->startPush('assets'); ?>
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3);
        }
        .breadcrumb-item.active{
            font-size: 14px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php if (isset($component)) { $__componentOriginal5406e8d7771770e2730decca9aaff420 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5406e8d7771770e2730decca9aaff420 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Request <?php echo $__env->renderComponent(); ?>
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
            <li class="breadcrumb-item active" aria-current="page"><span>View Requests</span></li>
        </ol>
    </nav>
<?php $__env->stopSection(); ?>
    <?php $__env->startPush('assets'); ?>
        <link rel="stylesheet" href="/css/admin-css/admin-request.css">

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
        <?php if(session('success')): ?>
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
                    data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo e(session('success')); ?>

                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo e(session('success')); ?>

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
        <div class="page-container">
            <div class="table-header">
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
<?php $component->withAttributes([]); ?>Requests <?php echo $__env->renderComponent(); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">View Requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">On Process</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ready-tab" data-bs-toggle="tab" data-bs-target="#ready-tab-pane" type="button"
                        role="tab" aria-controls="ready-tab-pane" aria-selected="false">Ready to pick up</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-tab-pane"
                        type="button" role="tab" aria-controls="completed-tab-pane"
                        aria-selected="false">Completed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected-tab-pane"
                        type="button" role="tab" aria-controls="rejected-tab-pane" aria-selected="false">Rejected</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="process">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $document_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($document_request->id); ?></td>
                                        <td><?php echo e($document_request->request_file_name); ?></td>
                                        <td><?php echo e($document_request->firstname); ?> <?php echo e($document_request->lastname); ?></td>
                                        <td>
                                            <?php switch($document_request->request_status):
                                                case ('Pending'): ?>
                                                    <span class="badge text-bg-secondary"><?php echo e($document_request->request_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Processing'): ?>
                                                    <span class="badge text-bg-primary"><?php echo e($document_request->request_status); ?></span>
                                                <?php break; ?>
    
                                                <?php default: ?>
                                                    <span>Unknown Status</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($document_request->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($document_request->id); ?>">UPDATE</button>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginal64bfb13695cc5148d195e00d3cf60efa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.request-modal','data' => ['documentRequest' => $document_request,'modalId' => ''.e($document_request->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.request-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['documentRequest' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($document_request),'modalId' => ''.e($document_request->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $attributes = $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $component = $__componentOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="ready-tab-pane" role="tabpanel" aria-labelledby="ready-tab" tabindex="0">
                    <div class="table-container">
                        <table class="table" id="ready">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $readyRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ready): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($ready->id); ?></td>
                                        <td><?php echo e($ready->request_file_name); ?></td>
                                        <td><?php echo e($ready->firstname); ?> <?php echo e($ready->lastname); ?></td>
                                        <td>
                                            <span class="badge text-bg-success"><?php echo e($ready->request_status); ?></span>
                                        </td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($ready->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                
                                                <button class="btn btn-secondary"  data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($ready->id); ?>">UPDATE</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginal64bfb13695cc5148d195e00d3cf60efa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.request-modal','data' => ['documentRequest' => $ready,'modalId' => ''.e($ready->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.request-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['documentRequest' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ready),'modalId' => ''.e($ready->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $attributes = $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $component = $__componentOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="completed-tab-pane" role="tabpanel" aria-labelledby="completed-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="completed">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $completed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $completed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($completed->id); ?></td>
                                        <td><?php echo e($completed->request_file_name); ?></td>
                                        <td><?php echo e($completed->firstname); ?> <?php echo e($completed->lastname); ?></td>
                                        <td>
                                            <span class="badge text-bg-success"><?php echo e($completed->request_status); ?></span>
                                        </td>
                                            <td><?php echo e(\Carbon\Carbon::parse($completed->created_at)->format('l, h:i A')); ?></td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($completed->id); ?>">UPDATE</button>
                                                <form action="<?php echo e(route('documentRequest.destroy', $completed->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginal64bfb13695cc5148d195e00d3cf60efa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.request-modal','data' => ['documentRequest' => $completed,'modalId' => ''.e($completed->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.request-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['documentRequest' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($completed),'modalId' => ''.e($completed->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $attributes = $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $component = $__componentOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="rejected-tab-pane" role="tabpanel" aria-labelledby="rejected-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table" id="rejected">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requested</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rejected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rejected): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($rejected->id); ?></td>
                                        <td><?php echo e($rejected->request_file_name); ?></td>
                                        <td><?php echo e($rejected->firstname); ?> <?php echo e($rejected->lastname); ?></td>
                                        <td>
                                            <span class="badge text-bg-danger"><?php echo e($rejected->request_status); ?></span>
                                        </td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($rejected->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($rejected->id); ?>">UPDATE</button>
                                                <form action="<?php echo e(route('documentRequest.destroy', $rejected->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>  
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginal64bfb13695cc5148d195e00d3cf60efa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.request-modal','data' => ['documentRequest' => $rejected,'modalId' => ''.e($rejected->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.request-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['documentRequest' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rejected),'modalId' => ''.e($rejected->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $attributes = $__attributesOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__attributesOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa)): ?>
<?php $component = $__componentOriginal64bfb13695cc5148d195e00d3cf60efa; ?>
<?php unset($__componentOriginal64bfb13695cc5148d195e00d3cf60efa); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var toastEl = document.querySelector('.toast');
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                });
                new DataTable('#process', {
                    lengthMenu: [5, 10, 25],         
                    dom: '',            
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    },
                });

                new DataTable('#ready', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    }
                });
                new DataTable('#completed', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    }
                });
                new DataTable('#rejected', {
                    lengthMenu: [5, 10, 25],
                    language: {
                        buttons: {
                            selectAll: 'Select all items',
                            selectNone: 'Select none'
                        }
                    },
                });
            </script>
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
<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/request.blade.php ENDPATH**/ ?>