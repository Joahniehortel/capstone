<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/user-profile.css">
<?php $__env->stopPush(); ?>
<?php if(auth()->guard()->check()): ?>
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
    <div class="modal fade" id="view-profile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo e(route('user.profile.update', $authUser->id )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">User's Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="profile-modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                    aria-selected="true" style="border-radius: 0px;"> My Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false" style="border-radius: 0px;">My
                                    Request</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false" style="border-radius: 0px;">My
                                    Complaint</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                    <div class="mb-3 mt-3 text-center">
                                        <img src="/images/profile-picture.png" class="modal-profile-image" style="width: 150px">
                                        <p> <?php echo e($authUser->email); ?></p>
                                        <?php if($authUser->status == 'to verify'): ?>
                                            <span class="badge text-bg-warning fs-6 mb-3" >
                                                <i class='bx bx-shield-x'></i> <?php echo e($authUser->request_status); ?> Verifying
                                            </span>
                                        <?php elseif($authUser->status == 'verified'): ?>
                                            <span class="badge text-bg-primary fs-6 mb-3">
                                                <i class='bx bxs-check-shield'></i> <?php echo e($authUser->request_status); ?> Verified
                                            </span>
                                        <?php elseif($authUser->status == 'unverified'): ?>
                                            <span style="cursor: pointer" class="badge text-bg-danger fs-6 mb-3" data-bs-toggle="modal" data-bs-target="#verifyAccountModal2">
                                                <i class='bx bx-shield-x'></i> <?php echo e($authUser->request_status); ?> Unverified
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <div class="details text-start mt-3">
                                    <div class="row-mb-6 mb-2">
                                        <label for="firstname">First name</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(old('firstname', $authUser->firstname)); ?>">
                                        <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="row-mb-6 mb-2">
                                        <label for="lastname">Last name</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname', $authUser->lastname)); ?>">
                                        <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="row-mb-6 mb-2">
                                        <label for="contact_no">Contact no.</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact_no" value="<?php echo e(old('contact_no', $authUser->contact_no)); ?>" maxlength="12">
                                        <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <?php if($authUser->google_id == ''): ?>
                                        <div class="row-md-6">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="current_password">
                                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    
                                        <div class="row-md-6 mb-3">
                                            <label for="new_password">New Password</label>
                                            <input type="password" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_password">
                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="row-md-6 mb-3">
                                            <label for="confirm_new_password">Confirm New Password</label>
                                            <input type="password" class="form-control <?php $__errorArgs = ['confirm_new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="confirm_new_password">
                                            <?php $__errorArgs = ['confirm_new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    <?php endif; ?>                                  
                                    <div class="d-flex justify-content-end align-items-end">
                                        <button id="showButton" type="submit" class="btn btn-success" style="border-radius: 0px">Save Changes</button>
                                    </div>  
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
    
                                <?php if(!$documentRequests->isEmpty()): ?>
                                    <?php $__currentLoopData = $documentRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="request_list mb-1">
                                            <div class="row requested_container" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px; padding:5px">
                                                <div class="col">
                                                    <div class="d-flex flex-column">
                                                        <span class="document_type"><?php echo e($documentRequest->request_file_name); ?></span>
                                                        <span><i class='bx bx-check-square'></i> <?php echo e($documentRequest->request_status); ?></span>
                                                    </div>
                                                    <p class="document_requested_date"><i class='bx bxs-calendar-event'></i> <?php echo e(\Carbon\Carbon::parse($documentRequest->created_at)->format('F j, Y')); ?></p>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($documentRequest->created_at)->diffForHumans()); ?></small><br>
                                                </div>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <?php if( $documentRequest->request_status == 'Pending' || $documentRequest->request_status == 'Processing' ): ?>
                                                        <button class="btn-update btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-<?php echo e($documentRequest->id); ?>">Update</button>
                                                        <button class="btn btn-danger btn-cancel" type="button" data-bs-toggle="modal" data-bs-target="#cancel-<?php echo e($documentRequest->id); ?>">Cancel</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 500px">
                                        <img style="width: 100px" src="/images/folder.png" alt="">
                                        <p style="opacity: 0.5">No Request Found</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                                tabindex="0">
                                <?php if(!$complaints->isEmpty()): ?>
                                    <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="request_list mb-1">
                                            <div class="row requested_container" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px; padding:5px">
                                                <div class="col">
                                                    <span class="document_type"><?php echo e(Str::limit($complaint->complaint_title, 25, '...')); ?></span><br>
                                                    <span><i class='bx bx-check-square'></i> <?php echo e($complaint->complaint_status); ?></span>
                                                    <p class="document_requested_date"><i class='bx bxs-calendar-event'></i> <?php echo e(\Carbon\Carbon::parse($complaint->created_at)->format('F j, Y')); ?></p>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($complaint->created_at)->diffForHumans()); ?></small><br>
                                                </div>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <?php if( $complaint->complaint_status == 'Pending'): ?>
                                                        <form action="<?php echo e(route('complaint.edit.details', $complaint->id )); ?>" method="GET">
                                                            <button type="submit" class="btn btn-primary" style="border-radius: 0px">Update</button>
                                                        </form>
                                                        <button class="btn btn-danger btn-cancel" type="button" data-bs-toggle="modal" data-bs-target="#cancel-complaint-<?php echo e($complaint->id); ?>">Cancel</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 500px">
                                        <img style="width: 100px" src="/images/folder.png" alt="">
                                        <p style="opacity: 0.5">No Complaints Found</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal56421820f33304ca6402dd0c54188021 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56421820f33304ca6402dd0c54188021 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.verify-account','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.verify-account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56421820f33304ca6402dd0c54188021)): ?>
<?php $attributes = $__attributesOriginal56421820f33304ca6402dd0c54188021; ?>
<?php unset($__attributesOriginal56421820f33304ca6402dd0c54188021); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56421820f33304ca6402dd0c54188021)): ?>
<?php $component = $__componentOriginal56421820f33304ca6402dd0c54188021; ?>
<?php unset($__componentOriginal56421820f33304ca6402dd0c54188021); ?>
<?php endif; ?>
    <?php if(isset($documentRequests)): ?>
        <?php $__currentLoopData = $documentRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginale6e61a15059775d8f98e4719db4b4e9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6e61a15059775d8f98e4719db4b4e9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.edit-request','data' => ['requestForm' => $documentRequest,'modalId' => ''.e($documentRequest->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.edit-request'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['requestForm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($documentRequest),'modalId' => ''.e($documentRequest->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6e61a15059775d8f98e4719db4b4e9e)): ?>
<?php $attributes = $__attributesOriginale6e61a15059775d8f98e4719db4b4e9e; ?>
<?php unset($__attributesOriginale6e61a15059775d8f98e4719db4b4e9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6e61a15059775d8f98e4719db4b4e9e)): ?>
<?php $component = $__componentOriginale6e61a15059775d8f98e4719db4b4e9e; ?>
<?php unset($__componentOriginale6e61a15059775d8f98e4719db4b4e9e); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal3e16a42e4f3ca055262037788fee07ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e16a42e4f3ca055262037788fee07ed = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.cancel-request','data' => ['requestForm' => $documentRequest,'modalId' => ''.e($documentRequest->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.cancel-request'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['requestForm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($documentRequest),'modalId' => ''.e($documentRequest->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e16a42e4f3ca055262037788fee07ed)): ?>
<?php $attributes = $__attributesOriginal3e16a42e4f3ca055262037788fee07ed; ?>
<?php unset($__attributesOriginal3e16a42e4f3ca055262037788fee07ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e16a42e4f3ca055262037788fee07ed)): ?>
<?php $component = $__componentOriginal3e16a42e4f3ca055262037788fee07ed; ?>
<?php unset($__componentOriginal3e16a42e4f3ca055262037788fee07ed); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(isset($complaints)): ?>
        <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if (isset($component)) { $__componentOriginal702c5ab698bac42d970218a53888de3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal702c5ab698bac42d970218a53888de3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.cancel-complaint','data' => ['complaintForm' => $complaint,'modalId' => ''.e($complaint->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.cancel-complaint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['complaintForm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($complaint),'modalId' => ''.e($complaint->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal702c5ab698bac42d970218a53888de3f)): ?>
<?php $attributes = $__attributesOriginal702c5ab698bac42d970218a53888de3f; ?>
<?php unset($__attributesOriginal702c5ab698bac42d970218a53888de3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal702c5ab698bac42d970218a53888de3f)): ?>
<?php $component = $__componentOriginal702c5ab698bac42d970218a53888de3f; ?>
<?php unset($__componentOriginal702c5ab698bac42d970218a53888de3f); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH E:\bms\resources\views/components/user-components/profile.blade.php ENDPATH**/ ?>