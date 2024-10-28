<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/user-css/layout.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <?php echo $__env->yieldPushContent('assets'); ?>
    <title></title>
</head>

<body>
    <?php if($errors->any()): ?>
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;">
            <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal8d8abad6c9f4099f69624093dc099a9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d8abad6c9f4099f69624093dc099a9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d8abad6c9f4099f69624093dc099a9b)): ?>
<?php $attributes = $__attributesOriginal8d8abad6c9f4099f69624093dc099a9b; ?>
<?php unset($__attributesOriginal8d8abad6c9f4099f69624093dc099a9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d8abad6c9f4099f69624093dc099a9b)): ?>
<?php $component = $__componentOriginal8d8abad6c9f4099f69624093dc099a9b; ?>
<?php unset($__componentOriginal8d8abad6c9f4099f69624093dc099a9b); ?>
<?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php if (isset($component)) { $__componentOriginal019aea6689d70c91703abc9052f93d7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal019aea6689d70c91703abc9052f93d7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal019aea6689d70c91703abc9052f93d7c)): ?>
<?php $attributes = $__attributesOriginal019aea6689d70c91703abc9052f93d7c; ?>
<?php unset($__attributesOriginal019aea6689d70c91703abc9052f93d7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal019aea6689d70c91703abc9052f93d7c)): ?>
<?php $component = $__componentOriginal019aea6689d70c91703abc9052f93d7c; ?>
<?php unset($__componentOriginal019aea6689d70c91703abc9052f93d7c); ?>
<?php endif; ?>
    <?php if($latest_announcement): ?>
        <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="announcementModalLabel"><?php echo $latest_announcement->title; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if($latest_announcement->image_path): ?>
                        <img src="<?php echo e(Storage::url($latest_announcement->image_path)); ?>" alt="" style="width: 100%; height: auto; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?php echo e(Storage::url($latest_announcement->image_path )); ?>" alt="">
                        <?php endif; ?>
                        <?php echo $latest_announcement->content; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($latest_announcement): ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                // Check if the modal has already been shown
                if (!localStorage.getItem('announcementShown')) {
                    var announcementModal = new bootstrap.Modal(document.getElementById('announcementModal'));

                    // Show the modal
                    announcementModal.show();

                    // Add an event listener to set localStorage when the modal is hidden
                    var modalElement = document.getElementById('announcementModal');
                    modalElement.addEventListener('hidden.bs.modal', function () {
                        localStorage.setItem('announcementShown', 'true');
                    });
                }
            });
        </script>
    <?php endif; ?>
    

</body>
<?php echo $__env->yieldPushContent('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if($errors->any()): ?>
            const toastEl = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastEl, {
                delay: 5000  // Delay time in milliseconds (5000ms = 5 seconds)
            });
            toast.show();
        <?php endif; ?>
    });
</script>

<script>
    var botmanWidget = {
        aboutText: 'Start the conversation by saying hi',
        frameEndpoint: '/botman/chat',
        title: 'BOTMAN',
        introMessage: "Hello, <?php echo e(Auth::check() ? Auth::user()->firstname : 'there'); ?>! 👋 I'm here to help you with anything you need. How can I assist you today?",
        mainColor: '#f2613f', 
        bubbleBackground: '#f2613f', 
        backgroundColor: '#f2613f', 
        messageBgColor: '#f2613f', 
        bubbleAvatarUrl: ''
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0.0.20/build/js/widget.min.js"></script>
<script>
    const navBtn = document.getElementById("menu-btn");
    const sideNav = document.getElementById("navbar");

    navBtn.addEventListener("click", () => {
            onsole.log('click');
        sideNav.classList.toggle('hide');
    });
</script>

</html>
<?php /**PATH E:\bms\resources\views/components/user-components/layout.blade.php ENDPATH**/ ?>