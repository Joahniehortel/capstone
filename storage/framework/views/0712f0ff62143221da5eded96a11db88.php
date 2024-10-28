

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-announcement.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
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
<?php $component->withAttributes([]); ?>Add Announcement <?php echo $__env->renderComponent(); ?>
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
                    <li class="breadcrumb-item"><a href="/admin/announcements">Announcements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Announcement</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="main-container mb-3">
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> 
                <strong>Something went wrong.</strong> <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.announcement.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="announcement-logo text-center mb-4">
                <img src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
                <div class="details" style="line-height: 0.3">
                    <div class="details mb-5" style="line-height: 0.3">
                        <p>Republic of the Philippines</p>
                        <p>Province of Davao del Sur</p>
                        <p>Municipality of Davao City</p>
                        <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="title" placeholder="Title" class="title form-control mb-3 <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('title')); ?>">
                        <?php if($errors->has('title')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('title')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="modal-container">
                        <input type="file" id="file" name="image" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image mb-3">Select Image</button>
                    </div>
                    <script>
                        const selectImage = document.querySelector('.select-image');
                        const inputFile = document.querySelector('#file');
                        const imgArea = document.querySelector('.img-area');
                
                        selectImage.addEventListener('click', function() {
                            inputFile.click();
                        });
                
                        inputFile.addEventListener('change', function() {
                            const image = this.files[0];
                            if (image.size < 10000000) {
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
                </div>
                <textarea id="editor" name="content" rows="10" placeholder="Write something..." class="form-control <?php echo e($errors->has('content') ? 'is-invalid' : ''); ?>"><?php echo e(old('content')); ?></textarea>
                <?php if($errors->has('content')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('content')); ?>

                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-end align-items-end">
                    <button class="btn btn-primary mt-3" type="submit" style="font-size: 12px">Publish</button>
                </div>
        </form>
    </div>
    <br>
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
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';
        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
    </script>
    </body>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/announcement/add-announcement.blade.php ENDPATH**/ ?>