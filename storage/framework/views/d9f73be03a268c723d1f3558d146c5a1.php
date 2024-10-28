

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
<?php $component->withAttributes([]); ?>Complaints <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $attributes = $__attributesOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__attributesOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $component = $__componentOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__componentOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('assets'); ?>
        <link rel="stylesheet" href="/css/admin-css/admin-complaints.css">
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
            <div class="table-header" style="margin-bottom: -5px">
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
<?php $component->withAttributes([]); ?>Complaints <?php echo $__env->renderComponent(); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">View Complaints</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ON process</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Resolved</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Escalated</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                        type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Rejected</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="example">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $onProcesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onProcess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: start"><?php echo e($onProcess->id); ?></td>
                                        <td style="text-align: start"><?php echo e($onProcess->firstname); ?> <?php echo e($onProcess->lastname); ?></td>
                                        <td style="text-align: start"><?php echo e(Str::limit($onProcess->complaint_title, 20)); ?></td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($onProcess->created_at)->format('F j, Y')); ?></td>
                                        <td style="text-align: start">
                                            <?php switch($onProcess->complaint_status):
                                                case ('Pending'): ?>
                                                    <span class="badge text-bg-secondary"><?php echo e($onProcess->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('In Review'): ?>
                                                    <span class="badge text-bg-info"><?php echo e($onProcess->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Resolved'): ?>
                                                    <span class="badge text-bg-success"><?php echo e($onProcess->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Escalated'): ?>
                                                    <span class="badge text-bg-danger"><?php echo e($onProcess->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Rejected'): ?>
                                                    <span class="badge text-bg-dark"><?php echo e($onProcess->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php default: ?>
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($onProcess->id); ?>">UPDATE</button>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.edit-complaint','data' => ['modalId' => ''.e($onProcess->id).'','complaint' => $onProcess]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.edit-complaint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => ''.e($onProcess->id).'','complaint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($onProcess)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $attributes = $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $component = $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="resolved">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $resolves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resolved): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: start"><?php echo e($resolved->id); ?></td>
                                        <td style="text-align: start"><?php echo e($resolved->firstname); ?> <?php echo e($resolved->lastname); ?></td>
                                        <td style="text-align: start"><?php echo e($resolved->complaint_title); ?></td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($resolved->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td style="text-align: start">
                                            <?php switch($resolved->complaint_status):
                                                case ('Pending'): ?>
                                                    <span class="badge text-bg-secondary"><?php echo e($resolved->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('In Review'): ?>
                                                    <span class="badge text-bg-info"><?php echo e($resolved->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Resolved'): ?>
                                                    <span class="badge text-bg-success"><?php echo e($resolved->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Escalated'): ?>
                                                    <span class="badge text-bg-danger"><?php echo e($resolved->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Rejected'): ?>
                                                    <span class="badge text-bg-dark"><?php echo e($resolved->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php default: ?>
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($resolved->id); ?>">UPDATE</button>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.edit-complaint','data' => ['modalId' => ''.e($resolved->id).'','complaint' => $resolved]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.edit-complaint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => ''.e($resolved->id).'','complaint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($resolved)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $attributes = $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $component = $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="escalated">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $escalates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escalate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: start"><?php echo e($escalate->id); ?></td>
                                        <td style="text-align: start"><?php echo e($escalate->firstname); ?> <?php echo e($escalate->lastname); ?></td>
                                        <td style="text-align: start"><?php echo e($escalate->complaint_title); ?></td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($escalate->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td style="text-align: start">
                                            <?php switch($escalate->complaint_status):
                                                case ('Pending'): ?>
                                                    <span class="badge text-bg-secondary"><?php echo e($escalate->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('In Review'): ?>
                                                    <span class="badge text-bg-info"><?php echo e($escalate->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Resolved'): ?>
                                                    <span class="badge text-bg-success"><?php echo e($escalate->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Escalated'): ?>
                                                    <span class="badge text-bg-danger"><?php echo e($escalate->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Rejected'): ?>
                                                    <span class="badge text-bg-dark"><?php echo e($escalate->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php default: ?>
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($escalate->id); ?>">UPDATE</button>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.edit-complaint','data' => ['modalId' => ''.e($escalate->id).'','complaint' => $escalate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.edit-complaint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => ''.e($escalate->id).'','complaint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($escalate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $attributes = $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $component = $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                    tabindex="0">
                    <div class="table-container">
                        <table class="table table-bordered " style="width:100%" id="rejected">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Complaint</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $rejects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: start"><?php echo e($reject->id); ?></td>
                                        <td style="text-align: start"><?php echo e($reject->firstname); ?> <?php echo e($reject->lastname); ?></td>
                                        <td style="text-align: start"><?php echo e($reject->complaint_title); ?></td>
                                        <td style="text-align: start"><?php echo e(\Carbon\Carbon::parse($reject->created_at)->format('F j, Y, g:i A')); ?></td>
                                        <td style="text-align: start">
                                            <?php switch($reject->complaint_status):
                                                case ('Pending'): ?>
                                                    <span class="badge text-bg-secondary"><?php echo e($reject->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('In Review'): ?>
                                                    <span class="badge text-bg-info"><?php echo e($reject->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Resolved'): ?>
                                                    <span class="badge text-bg-success"><?php echo e($reject->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Escalated'): ?>
                                                    <span class="badge text-bg-danger"><?php echo e($reject->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php case ('Rejected'): ?>
                                                    <span class="badge text-bg-dark"><?php echo e($reject->complaint_status); ?></span>
                                                <?php break; ?>
    
                                                <?php default: ?>
                                                    <span class="badge text-bg-warning">Unknown Status</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo e($reject->id); ?>">UPDATE</button>
                                        </td>
                                    </tr>
                                    <?php if (isset($component)) { $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.edit-complaint','data' => ['modalId' => ''.e($reject->id).'','complaint' => $reject]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.edit-complaint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => ''.e($reject->id).'','complaint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($reject)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $attributes = $__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__attributesOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86)): ?>
<?php $component = $__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86; ?>
<?php unset($__componentOriginalc387d05e77a19bbc87ab1ee9a143ff86); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#resolved', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#escalated', {
                lengthMenu: [5, 10, 25],    
                language: {
                    buttons: {
                        selectAll: 'Select all items',
                        selectNone: 'Select none'
                    }
                }
            });
        </script>
        <script>
            new DataTable('#rejected', {
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
<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/complaints.blade.php ENDPATH**/ ?>