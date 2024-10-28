<div class="sidebar">
    <div class="logo-details1">
        <div class="logo-image">
            <img src="/images/dc.png" alt="">
        </div>
        <span class="logo_name">EBARRIO</span>
    </div>
    <ul class="nav-links">
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/dashboard','active' => request()->is('admin/dashboard'),'icon' => 'bx bxs-dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/dashboard','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/dashboard')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bxs-dashboard')]); ?>Dashboard <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/request','active' => request()->is('admin/request'),'icon' => 'bx bx-file']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/request','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/request')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-file')]); ?>Request <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/complaints','active' => request()->is('admin/complaints'),'icon' => 'bx bx-message-alt-error']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/complaints','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/complaints')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-message-alt-error')]); ?>Commplaints <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/document','active' => request()->is('admin/document'),'icon' => 'bx bx-folder-open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/document','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/document')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-folder-open')]); ?>Documents <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <li :active="request()->is('admin/residents')">
            <div class="icon-links <?php echo e(Request::is('admin/residents') || Request::is('admin/residents/add') ? 'active' : ''); ?>">
                <a href="#">
                    <i class='bx bx-male-female'></i>
                    <span class="link_name">Residents</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Category</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/residents') ? 'active' : ''); ?>" href="<?php echo e(route('admin-resident')); ?>" href="<?php echo e(route('admin-resident')); ?>">View Residents</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/residents/add') ? 'active' : ''); ?>" href="<?php echo e(route('resident.addpage')); ?>" href="#">Add Resident</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links <?php echo e(Request::is('admin/announcements') || Request::is('admin/announcements/create') ? 'active' : ' '); ?>">
                <a href="#">
                    <i class='bx bxs-megaphone'></i>
                    <span class="link_name">Announcement</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Add Announcements</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/announcements') ? 'active' : ''); ?>" href="<?php echo e(route('admin.announcement')); ?>">View Announcements</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/announcements/create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.announcement.create')); ?>">Add Announcements</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links <?php echo e(Request::is('admin/message') || Request::is('admin/message/logs') ? 'active' : ''); ?>">
                <a href="#">
                    <i class='bx bx-message-dots'></i>
                    <span class="link_name">SMS Message</span>    
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="link_name" href="#">Send Message</a>
                </li>
                <li>
                    <a class ="<?php echo e(Request::is('admin/message') ? 'active' : ''); ?>" href="<?php echo e(route('admin.message')); ?>">Send Message</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/message/logs') ? 'active' : ''); ?>" href="<?php echo e(route('admin.message.logs')); ?>">Message Log</a>
                </li>
            </ul>
        </li>
        <li class="dropdownlist">
            <div class="icon-links <?php echo e(Request::is('admin/official') || Request::is('admin/official/add') || Request::is('admin/official/edit/*') ? 'active' : ''); ?>">
                <a href="javascript:void(0);" onclick="toggleSubmenu(this)">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Officials</span>
                </a>
                <i class="bx bx-chevron-down arrow" style="cursor: pointer"></i>
            </div>
            <ul class="sub-menu">   
                <li>
                    <a class="<?php echo e(Request::is('admin/official') ? 'active' : ''); ?>" href="<?php echo e(route('admin.official')); ?>">View Officials</a>
                </li>
                <li>
                    <a class="<?php echo e(Request::is('admin/official/add') ? 'active' : ''); ?>" href="<?php echo e(route('official.create')); ?>">Add Official</a>
                </li>
            </ul>
        </li>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/users','active' => request()->is('admin/users') || request()->is('admin/users'),'icon' => 'bx bx-user','showIcon' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/users','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/users') || request()->is('admin/users')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-user'),'showIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>Users <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['href' => '/admin/verify','active' => request()->is('admin/verify') || request()->is('admin/verify'),'icon' => 'bx bx-check-shield','showIcon' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/admin/verify','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/verify') || request()->is('admin/verify')),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-check-shield'),'showIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>Verify Users <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.navbar.admin-navbar-link','data' => ['style' => 'cursor: pointer','icon' => 'bx bx-log-out','active' => false,'showIcon' => false,'dataBsToggle' => 'modal','dataBsTarget' => '#adminLogout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.navbar.admin-navbar-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'cursor: pointer','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('bx bx-log-out'),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'showIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'data-bs-toggle' => 'modal','data-bs-target' => '#adminLogout']); ?>Log out <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $attributes = $__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__attributesOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88)): ?>
<?php $component = $__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88; ?>
<?php unset($__componentOriginal39eb7f1d697284a29a4e3bc4523ceb88); ?>
<?php endif; ?>
    </ul>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function toggleSubmenu(element) {
        const submenu = element.closest('.icon-links').nextElementSibling; // Get the submenu
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block'; // Toggle visibility
    }
</script>
    <script>
        let linkName = document.querySelectorAll('.link_name');
        let dropdownItems = document.querySelectorAll('.dropdownlist');
        dropdownItems.forEach(item => {
            item.addEventListener("click", (e) => {
                if (!e.target.closest('a')) {
                    let submenu = item.querySelector('.sub-menu');

                    if (submenu.style.display === "none" || submenu.style.display === "") {
                        submenu.style.display = "block";  
                    } else {
                        submenu.style.display = "none";  
                    }
                }
            });
        });
        let arrow = document.querySelectorAll('.arrow');
        for (var i = 0; i < arrow.length; i++){
            arrow[i].addEventListener("click", (e)=>{
                console.log(e)
                let arrowParent = e.target.parentElement.parentElement;
                console.log(arrowParent)
                arrowParent.classList.toggle('showMenu')
            });
        }
        let sidebar = document.querySelector('.sidebar');
        let sidebarBtn = document.querySelector('.bx-menu');
        let content = document.querySelector('#content');
        let menuBtn = document.querySelector('#menu-btn');

        sidebarBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
            content.classList.toggle("collapsed");
            menuBtn.classList.toggle("collapsed");
            linkName.classList.toggle('show');

            console.log(linkName);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH E:\bms\resources\views/components/admin-components/navbar/admin-nav.blade.php ENDPATH**/ ?>