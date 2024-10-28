<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <div class="navbar-brand me-auto">
            <a class="navbar-brand me-auto" href="/home">
                <img src="/images/dc.png" alt="error" style="width: 50px">
                <div>
                    <p>BARANGAY 8-A POBLACION DISTRICT</p>
                </div>
                EBARRIO
            </a>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-size: 16px; font-weight: 900; color:#6D4C41"><img class="image-logo" style="width: 50px" src="/images/dc.png"
                        alt=""> EBARRIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/home','active' => request()->is('home')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/home','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('home'))]); ?>Home
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                    <?php if(Auth::user()): ?>
                        <li class="nav-item active dropdown" :active="request()->is('complaint') || request()->is('complaint/edit/*')">
                            <button class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false"
                                style="box-shadow: none">
                                Services
                            </button>
                            <ul class="dropdown-menu" style="box-shadow: none">
                                <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/request','active' => request()->is('request')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/request','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('request'))]); ?>Request
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/complaint','active' => request()->is('complaint') || request()->is('complaint/edit/*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/complaint','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('complaint') || request()->is('complaint/edit/*'))]); ?>
                                    Complaint
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                            </ul>
                        </li>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/request','active' => request()->is('request')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/request','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('request'))]); ?>Request <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/announcements','active' => request()->is('announcements')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/announcements','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('announcements'))]); ?>Announcements <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/officials','active' => request()->is('officials')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/officials','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('officials'))]); ?>Officials <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.navbar.navbar-link','data' => ['href' => '/about','active' => request()->is('about')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.navbar.navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/about','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('about'))]); ?>About <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $attributes = $__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__attributesOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32)): ?>
<?php $component = $__componentOriginal277ed278f22e39eb2b974e0f42b0ee32; ?>
<?php unset($__componentOriginal277ed278f22e39eb2b974e0f42b0ee32); ?>
<?php endif; ?>
                    <div class="notification-responsive">
                        
                    </div>
                </ul>
            </div>
        </div>
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="login-btn">Login</a>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            <div class="header-actions">
                <div class="btn-group">
                    <div class="mobile d-flex dropdown-end align-items-center justify-content-center">
                    <div class="desktop d-flex dropdown-center align-items-center justify-content-center">
                        <a href="#" class="notification-btn" data-bs-toggle="dropdown" aria-expanded="false"> 
                            <img class="notification" src="/images/bell-ring.png" alt="">
                            <?php if($unread != 0): ?>
                                <span class="badge-notification"><?php echo e(!$unread == 0 ? $unread : ' '); ?></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu notification dropdown-menu-end" id="dropdown-menu-notifications">
                            <div class="row">
                                <div class="col">
                                    <h1 class="fs-6">Notifications</h1>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <h1 class="badge fs-6">Unread: <?php echo e($unread); ?></h1>
                                </div>
                            </div>
                            <?php if($notifications->isNotEmpty()): ?>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="notification-list"  id="<?php echo e(is_null($notification->read_at) ? 'unread-notification' : ''); ?>" data-id="<?php echo e($notification->id); ?>" data-bs-toggle="modal" data-bs-target="#<?php echo e($notification->id); ?>">
                                        <div class="d-flex">
                                            <div class="col notification-sign p-1 d-flex align-items-center">
                                                <?php if($notification->data['notification_type'] == 'Document Request'): ?>
                                                    <?php if(isset($notification->data['status'])): ?>
                                                        <?php switch($notification->data['status']):
                                                            case ('Pending'): ?>
                                                                    <i class='bx bxs-hourglass-top' style="background-color: blue"></i>
                                                                <?php break; ?>
                                                            <?php case ('Processing'): ?>
                                                                    <i class='bx bx-cog' style="background-color: blue"></i>
                                                                <?php break; ?>
                                                            <?php case ('Ready for pick up'): ?>
                                                                    <i class='bx bxs-hand' style="background-color: green"></i>
                                                                <?php break; ?>
                                                            <?php case ('Completed'): ?>
                                                                    <i class='bx bx-check' style="background-color: green"></i> 
                                                                <?php break; ?>
                                                            <?php case ('Rejected'): ?>
                                                                    <i class='bx bx-x' style="background-color: blue"></i>
                                                                <?php break; ?>
                                                            <?php default: ?>
                                                                
                                                        <?php endswitch; ?>
                                                    <?php endif; ?>
                                                <?php elseif($notification->data['notification_type'] == 'Announcement'): ?>
                                                    <i class='bx bxs-calendar-check'></i>
                                                <?php elseif($notification->data['notification_type'] == 'Account Verification'): ?>
                                                    <?php if($notification->data['status']  == 'verified'): ?>
                                                        <i class='bx bx-user-check' style="background-color: green"></i>
                                                    <?php else: ?>
                                                        <i class='bx bx-user-x' style='color:#ffffff; background-color: red' ></i>
                                                    <?php endif; ?>
                                                <?php elseif($notification->data['notification_type'] == 'Complaint'): ?>

                                                    <?php switch($notification->data['status'] ?? ''):
                                                        case ('Pending'): ?>
                                                            <i class='bx bxs-hourglass-top' style="background-color: blue;"></i>
                                                            <?php break; ?>
                                                        <?php case ('In Review'): ?>
                                                            <i class='bx bx-search-alt-2' style="background-color: orange;"></i>
                                                            <?php break; ?>
                                                        <?php case ('Resolved'): ?>
                                                            <i class='bx bxs-hand' style="background-color: green;"></i>
                                                            <?php break; ?>
                                                        <?php case ('Escalated'): ?>
                                                            <i class='bx bx-check' style="background-color: green;"></i> 
                                                            <?php break; ?>
                                                        <?php case ('Rejected'): ?>
                                                            <i class='bx bx-x' style="background-color: red;"></i>
                                                            <?php break; ?>
                                                        <?php default: ?>
                                                            <i class='bx bx-info-circle' style="background-color: gray;"></i> 
                                                    <?php endswitch; ?>
                                                <?php else: ?>
                                                    <i class='bx bx-question-mark' style="background-color: gray;"></i>               
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <div>
                                                    <span style="font-size: 14px"><?php echo e($notification->data['notification_type'] ?? 'No message'); ?></span><br>
                                                    <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($notification->created_at)->diffForHumans()); ?></small><br>
                                                    <p style="font-size: 14px"><?php echo Str::limit(preg_replace('/\s+/', ' ', trim($notification->data['message'] ?? 'No message')), 200); ?></p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="text-center">
                                    <i class="bx bx-bell-off fs-3"></i>
                                    <p>No notifications found.</p>
                                </div>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-secondary dropdown-toggle profile-btn"><i class='bx bx-user' style="font-size: 20px"></i><span class="profile_name"><?php echo e(Auth::user()->firstname); ?></span></a>
                    <ul class="dropdown-menu" style="z-index: -1">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#view-profile">
                                Profile
                            </a>
                        </li>
                        <li>
                            <button type="submit" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#adminLogout">Log out</button>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
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
<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="<?php echo e($notification->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $notification->data['message'] ?? 'No message'; ?><br><br>
                    <?php if(isset($notification->data['additional_message'])): ?>
                        <?php if($notification->data['additional_message']): ?>
                            <label for="additional_message">Additional Message</label>
                            <input class="form-control" id="additional_message" type="text" value="<?php echo e($notification->data['additional_message'] ?? ''); ?>" disabled>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php if (isset($component)) { $__componentOriginal568e8f43327c30ba6f671d6d1020b34d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal568e8f43327c30ba6f671d6d1020b34d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.profile','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal568e8f43327c30ba6f671d6d1020b34d)): ?>
<?php $attributes = $__attributesOriginal568e8f43327c30ba6f671d6d1020b34d; ?>
<?php unset($__attributesOriginal568e8f43327c30ba6f671d6d1020b34d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal568e8f43327c30ba6f671d6d1020b34d)): ?>
<?php $component = $__componentOriginal568e8f43327c30ba6f671d6d1020b34d; ?>
<?php unset($__componentOriginal568e8f43327c30ba6f671d6d1020b34d); ?>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            $('.notification-list').on('click', function () {
                var notificationId = $(this).data('id');
                $.ajax({
                    url: '/notifications/' + notificationId + '/mark-as-read',
                    method: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>' 
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log('Notification marked as read');
                        }
                    },
                    error: function () {
                        console.log('Error marking notification as read');
                    }
                });
            });
        });
        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\bms\resources\views/components/user-components/navbar/navbar.blade.php ENDPATH**/ ?>