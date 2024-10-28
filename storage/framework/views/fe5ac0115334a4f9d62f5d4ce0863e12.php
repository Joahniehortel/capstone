

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
                    <li class="breadcrumb-item active" aria-current="page">Edit Announcement</li>
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
    <?php if(session('error')): ?>
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo e(session('error')); ?>

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="main-container">
        <div class="text-center">
            <img src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
            <div class="details" style="line-height: 0.3">
                <div class="details mb-5" style="line-height: 0.3">
                    <p>Republic of the Philippines</p>
                    <p>Province of Davao del Sur</p>
                    <p>Municipality of Davao City</p>
                    <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                </div>
            </div>
        </div>
        <form action="<?php echo e(route('admin.announcement.update', $announcement->id)); ?>" method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="title" placeholder="Title" value="<?php echo e($announcement->title); ?>"
                        class="title form-control mb-3">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex justify-content-center w-100">
                    <div class="modal-container">
                        <input type="file" id="file" name="image_path" hidden>
                        <div class="img-area" data-img="">
                            <?php if($announcement->image_path): ?>
                                <img class="image" src="<?php echo e(Storage::url($announcement->image_path)); ?>" alt="Supporting File" />
                            <?php endif; ?>
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image mb-3 btn btn-primary">Select Image</button>
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
                            if (image.size < 2000000) {
                                const reader = new FileReader();
                                reader.onload = () => {
                                    // Clear existing images before appending a new one
                                    imgArea.querySelectorAll('img').forEach(item => item.remove());

                                    // Create a new image element and set its src to the uploaded file
                                    const img = document.createElement('img');
                                    img.src = reader.result;
                                    imgArea.appendChild(img);
                                    imgArea.classList.add('active');
                                    imgArea.dataset.img = image.name;
                                }
                                reader.readAsDataURL(image);
                            } else {
                                alert("Image size exceeds 2MB");
                            }
                        });
                    </script>
                </div>
            </div>
            <textarea id="editor" name="content" rows="10" placeholder="Write something..."><?php echo e($announcement->content); ?></textarea>
            <div class="d-flex justify-content-end align-items-end">
                <button class="btn btn-primary mt-3" type="submit">Publish</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
    </script>
    </body>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/announcement/edit-announcement.blade.php ENDPATH**/ ?>