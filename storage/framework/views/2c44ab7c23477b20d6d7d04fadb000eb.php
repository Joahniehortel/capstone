

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-add-officials.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title" style="margin-bottom: 30px; margin-top:30px">
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
<?php $component->withAttributes([]); ?>Add Official <?php echo $__env->renderComponent(); ?>
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
                    <li class="breadcrumb-item active"><a href="/admin/official">View Officials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Official</li>
                </ol>
            </nav>
        </div>
    </div>
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
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <?php if(session('error')): ?>
            <div class="toast text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo e(session('error')); ?>

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>    
    <div class="official" style="margin-bottom: 30px">
        <form action="<?php echo e(route('official.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="w-100 d-flex justify-content-center">
                <div class="modal-container">
                    <input type="file" id="file" name="image" hidden>
                    <div class="img-area" data-img="">
                        <i class='bx bxs-cloud-upload icon'></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    <?php if($errors->has('image')): ?>
                        <div class="alert alert-danger">
                            <?php echo e($errors->first('image')); ?>

                        </div>
                    <?php endif; ?>
                    <button type="button" class="select-image mb-3">Select Image</button>
                </div>
            </div>
        
            <!-- Move the script here -->
            <script>
                const selectImage = document.querySelector('.select-image');
                const inputFile = document.querySelector('#file');
                const imgArea = document.querySelector('.img-area');
        
                selectImage.addEventListener('click', function() {
                    inputFile.click();
                });
        
                inputFile.addEventListener('change', function() {
                    const image = this.files[0];
                    if (image.size < 2000000) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            const allImg = imgArea.querySelectorAll('img');
                            allImg.forEach(item => item.remove());
                            const imgUrl = reader.result;
                            const img = document.createElement('img');
                            img.src = imgUrl;
                            imgArea.appendChild(img);
                            imgArea.classList.add('active');
                            imgArea.dataset.img = image.name;
                        }
                        reader.readAsDataURL(image);
                    } else {
                        alert("Image size more than 2MB");
                    }
                });
            </script>            
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="firstname" class="col-form-label">First name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" placeholder="First Name" value="<?php echo e(old('firstname')); ?>" required>
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
                <div class="col-md-6 mb-2">
                    <label for="lastname" class="col-form-label">Last name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" placeholder="Last Name" value="<?php echo e(old('lastname')); ?>" required>
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
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">   
                        <div class="col-md-6 mb-2">
                            <label for="status" class="col-form-label">Brgy. Position</label>
                            <select class="form-select <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="position" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Punong Barangay" <?php echo e(old('position') === 'Punong Barangay' ? 'selected' : ''); ?>>Punong Barangay</option>
                                <option value="Barangay Kagawad" <?php echo e(old('position') === 'Barangay Kagawad' ? 'selected' : ''); ?>>Barangay Kagawad</option>
                                <option value="SK Chairman" <?php echo e(old('position') === 'SK Chairman' ? 'selected' : ''); ?>>SK Chairman</option>
                                <option value="Barangay Secretary" <?php echo e(old('position') === 'Barangay Secretary' ? 'selected' : ''); ?>>Barangay Secretary</option>
                                <option value="Barangay Clerk" <?php echo e(old('position') === 'Barangay Clerk' ? 'selected' : ''); ?>>Barangay Clerk</option>
                                <option value="Barangay Record Keeper" <?php echo e(old('position') === 'Barangay Record Keeper' ? 'selected' : ''); ?>>Barangay Record Keeper</option>
                            </select>
                            <?php $__errorArgs = ['position'];
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
                        
                        <div class="col-md-6 mb-2">
                            <label for="status" class="col-form-label">Status</label>
                            <select class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Status</option>
                                <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                            <?php $__errorArgs = ['status'];
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
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="term_start" class="col-form-label">Term start</label>
                            <input type="date" class="form-control" id="term_start" name="term_start" required style="border: 1px solid #ddd;">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="term_end" class="col-form-label">Term end</label>
                            <input type="date" class="form-control" id="term_end" name="term_end" required style="border: 1px solid #ddd;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required style="border: 1px solid #ddd;">
                    <?php $__errorArgs = ['email'];
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
                <div class="col">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="gender" class="col-form-label">Gender</label>
                            <select class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender" style="border: 1px solid #ddd;">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" <?php echo e(old('gender') == 'Male' ? 'selected' : ''); ?>>Male</option>
                                <option value="Female" <?php echo e(old('gender') == 'Female' ? 'selected' : ''); ?>>Female</option>
                            </select>
                            <?php $__errorArgs = ['gender'];
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
                        <div class="col-md-6 mb-2">
                            <label for="contact_number" class="col-form-label">Contact number</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php echo e(old('contact_number')); ?>" required>
                            <?php $__errorArgs = ['contact_number'];
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
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-end mt-3 gap-3">
                <a href="<?php echo e(route('admin.official')); ?>" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Add Official</button>
            </div>
        </form>
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
<?php $__env->startPush('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/officials/add-official.blade.php ENDPATH**/ ?>