<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['modalId', 'user']));

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

foreach (array_filter((['modalId', 'user']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php $__env->startPush('assets'); ?>
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.3); 
        }
        .image{
            width: 225px;
            height: 200px;
        }
    </style>
<?php $__env->stopPush(); ?>
<div class="modal fade" id="<?php echo e($modalId); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="<?php echo e($modalId); ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verify User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="verify-modal-body" style="padding: 10px">    
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="mb-3">
                            <?php
                                $fileExtension = pathinfo($user->supporting_file, PATHINFO_EXTENSION);
                                $fileName = basename($user->supporting_file); 
                            ?>
                            <?php if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                <img class="image" src="<?php echo e(Storage::url($user->supporting_file)); ?>" alt="Supporting File"/>
                            <?php elseif($fileExtension === 'pdf'): ?>
                                <img class="image" src="/images/pdf-icon.png" alt="PDF File"/>
                            <?php elseif(in_array($fileExtension, ['doc', 'docx'])): ?>
                                <img class="image" src="/images/word.jpg" alt="Word Document"/>
                                <p class="file_name text-center"></p>
                            <?php else: ?>
                                <img class="image" src="/images/file-icon.png" alt="File"/>
                            <?php endif; ?>
                            <div class="mb-2 text-center">
                                <p><?php echo e($fileName); ?></p>
                            </div>
                        </div>
                        <a href="<?php echo e(asset('storage/' . $user->supporting_file)); ?>" download="<?php echo e(basename($user->supporting_file)); ?>" class="btn btn-primary">
                            Download Supporting File
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="number-copies" class="col-form-label">First name</label>
                        <input class="form-control" type="text" value="<?php echo e($user->firstname); ?>" name="firstname"
                            placeholder="First Name" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="lastname" class="col-form-label">Last name</label>
                        <input class="form-control" value="<?php echo e($user->lastname); ?>" type="text" id="lastname"
                            name="lastname" placeholder="Last Name" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="row-md-6">
                        <label for="email" class="col-form-label">Email</label>
                        <input class="form-control" value="<?php echo e($user->email); ?>" type="text" id="lastname"
                            name="email" placeholder="Last Name" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="row-md-6">
                        <label for="contact_no" class="col-form-label">Contact number</label>
                        <input class="form-control" value="<?php echo e($user->contact_no); ?>" type="text" id="lastname"
                            name="contact_no" placeholder="Last Name" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="<?php echo e(route('admin.toVerify.account', $user->id )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-success">Verify</button>
                </form>
            </div>
        </div>
    </div>
</div>  
<?php /**PATH E:\bms\resources\views/components/admin-components/modal/verify-user.blade.php ENDPATH**/ ?>