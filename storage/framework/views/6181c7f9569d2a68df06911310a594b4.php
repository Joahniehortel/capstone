<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['modalId', 'complaint']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['modalId', 'complaint']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php $__env->startPush('assets'); ?>
    <style>
        .image {
            width: 50%;
        }

        .no-file {
            width: 150px
        }

        .default-complaint {
            padding: 20px;
            text-align: center;
        }

        .default-complaint p {
            font-size: 16px
        }
    </style>
<?php $__env->stopPush(); ?>
<div class="modal fade" id="<?php echo e($modalId); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="<?php echo e($modalId); ?>Label" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Complaint</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!empty($complaint->complaint_image)): ?>
                <?php if(isset($complaint)): ?>
                    <?php if(!empty($complaint->complaint_image)): ?>
                        <?php
                            $extension = pathinfo($complaint->complaint_image, PATHINFO_EXTENSION);
                        ?>
                        <?php if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                            <div class="text-center">
                                <img src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" alt="Complaint Image" width="50%" />
                                <div class="mt-2">
                                    <a href="<?php echo e(asset($complaint->complaint_image)); ?>" download class="btn btn-primary">
                                        Download Image
                                    </a>
                                </div>
                            </div>
                        <?php elseif($extension === 'pdf'): ?>
                            <div style="padding: 20px">
                                <iframe src="<?php echo e(Storage::url($complaint->complaint_image)); ?>" width="100%"
                                    height="300px"></iframe>
                            </div>
                        <?php elseif(in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'mkv'])): ?>
                            <div style="padding: 20px">
                                <video controls width="100%">
                                    <source src="<?php echo e(Storage::url($complaint->complaint_image)); ?>"
                                        type="video/<?php echo e(pathinfo($complaint->complaint_image, PATHINFO_EXTENSION)); ?>">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php elseif(in_array($extension, ['mp3', 'wav', 'ogg'])): ?>
                            <div style="padding: 20px; display:flex; justify-content:center">
                                <audio controls>
                                    <source src="<?php echo e(Storage::url($complaint->complaint_image)); ?>"
                                        type="audio/<?php echo e(pathinfo($complaint->complaint_image, PATHINFO_EXTENSION)); ?>">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        <?php else: ?>
                            <p class="text-center mt-3 mt-5">Unsupported file type.</p>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="default-complaint d-flex flex-column align-items-center justify-content-center">
                    <img class="no-file mb-3" src="/images/attachment.png" alt="">
                    <p>No file submitted</p>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('complaint.update', $complaint->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date_submitted">Date submitted</label>
                                <input type="text"
                                    value="<?php echo e(\Carbon\Carbon::parse($complaint->created_at)->format('F j, Y, g:i A')); ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <select class="form-select" aria-label="Default select example" name="complaint_status">
                                    <option value="Pending"
                                        <?php echo e($complaint->complaint_status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="In Review"
                                        <?php echo e($complaint->complaint_status == 'In Review' ? 'selected' : ''); ?>>In Review
                                    </option>
                                    <option value="Resolved"
                                        <?php echo e($complaint->complaint_status == 'Resolved' ? 'selected' : ''); ?>>Resolved
                                    </option>
                                    <option value="Escalated"
                                        <?php echo e($complaint->complaint_status == 'Escalated' ? 'selected' : ''); ?>>Escalated
                                    </option>
                                    <option value="Rejected"
                                        <?php echo e($complaint->complaint_status == 'Rejected' ? 'selected' : ''); ?>>Rejected
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row-md-6 mb-3">
                            <label for="about" class="form-col-label">Complaint title</label>
                            <input type="text" class="form-control" id="about"
                                value="<?php echo e($complaint->complaint_title); ?>" <?php if(true): echo 'disabled'; endif; ?>>
                        </div>
                        <div class="row-md-6">
                            <label for="">Complaint detail</label>
                            <textarea class="form-control" name="" id="" cols="15" rows="5" <?php if(true): echo 'disabled'; endif; ?>><?php echo e($complaint->complaint_detail); ?></textarea>
                        </div>
                        <div class="row-md-6">
                            <label for="">Note</label>
                            <textarea class="form-control" name="additional_message" id="" cols="15" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH E:\bms\resources\views/components/admin-components/modal/edit-complaint.blade.php ENDPATH**/ ?>