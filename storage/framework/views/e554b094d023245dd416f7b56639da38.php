<?php $__env->startPush('assets'); ?>
<?php if(auth()->guard()->check()): ?>
    <header class="header w-100" id="header">
        <div class="row w-100">
            <div class='col'>
                <button class="menu-btn" id="menu-btn"><i class='bx bx-menu' style="font-size: 26px"></i></button>
            </div>
            <div class="col btn-container d-flex align-items-center justify-content-end ms-auto cursor-pointer">
                <div class="dropdown">
                    <a href="#" class="text-center dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
                        <i class='bx bxs-user text-center' class="admin-icon" style="color: black;font-size: 16px;"></i><?php echo e($authUser->firstname); ?>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminProfile"><i class='bx bxs-user-account'></i> Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminLogout"><i class='bx bx-log-out'></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>        
        </div>
    </header>
    <?php if (isset($component)) { $__componentOriginal24907d7231209e54aef44778f4044142 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24907d7231209e54aef44778f4044142 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.admin-profile','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.admin-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal24907d7231209e54aef44778f4044142)): ?>
<?php $attributes = $__attributesOriginal24907d7231209e54aef44778f4044142; ?>
<?php unset($__attributesOriginal24907d7231209e54aef44778f4044142); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal24907d7231209e54aef44778f4044142)): ?>
<?php $component = $__componentOriginal24907d7231209e54aef44778f4044142; ?>
<?php unset($__componentOriginal24907d7231209e54aef44778f4044142); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal247d6018120b9ad2262c050d8d42b972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal247d6018120b9ad2262c050d8d42b972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.admin-logout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.admin-logout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal247d6018120b9ad2262c050d8d42b972)): ?>
<?php $attributes = $__attributesOriginal247d6018120b9ad2262c050d8d42b972; ?>
<?php unset($__attributesOriginal247d6018120b9ad2262c050d8d42b972); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal247d6018120b9ad2262c050d8d42b972)): ?>
<?php $component = $__componentOriginal247d6018120b9ad2262c050d8d42b972; ?>
<?php unset($__componentOriginal247d6018120b9ad2262c050d8d42b972); ?>
<?php endif; ?>
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php $__env->stopPush(); ?><?php /**PATH E:\bms\resources\views/components/admin-components/admin-header.blade.php ENDPATH**/ ?>