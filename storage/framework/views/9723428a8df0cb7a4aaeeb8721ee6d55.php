

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/home.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
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
    <div class="hero-section">
        <div class="text-container">
            <h1 class="fs-1">Welcome to <span class="logo-name" style="font-weight: 600">EBARRIO</span>!</h1>
            <p>eBarrio simplifies barangay services, letting you request documents, <br> file complaints, and stay updated
                with ease.</p>
            <a href="<?php echo e(route('user.request')); ?>" class="cta-btn">Request Now</a>
        </div>
    </div>
    <div class="about">
        <div class="d-flex text-center">
            <div>
                <img class="about-image" src="/images/undraw_team_work_k80m.png" alt="">
            </div>
            <div>
                <div class="about-text-container align-items-center">
                    <div class="section-details">
                        <h1 class="fs-3" class="page-title" style="font-weight: 600">About us</h1>
                        <p>Committed to the community.</p>
                    </div>
                    <div class="d-flex flex-column gap-2 details">
                        <p class="text-start"><span style="color: # ; font-weight:600">EBARRIO </span>is an innovative
                            digital platform designed to enhance the efficiency and accessibility of
                            barangay services for residents. By leveraging technology, eBarangay allows community members
                            to:
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">1</span>
                            <div class="text-start">
                                <span class="text-start" style="font-weight: 600">Request Documents</span>
                                <p>Easily submit requests for barangay IDs, clearances, and certificates online.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">2</span>
                            <div class="text-start">
                                <span style="font-weight: 600">Manage Complaints</span>
                                <p>Report issues directly to barangay officials and track the resolution process.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="numbers">3</span>
                            <div class="text-start">
                                <span style="font-weight: 600">Stay Informed</span>
                                <p>Access important announcements and updates from the barangay administration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-start mt-3">
                        <a class="readMore" href="<?php echo e(route('about')); ?>">Read more <i id="read-more-icon"
                                class='bx bx-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="feature-section">
        <div class="section-details text-center">
            <h1 class="fs-3">Key Features</h1>
            <p class="fs-7">"Simplifying your experience"</p>
        </div>
        <div class="features">
            <div class="feature">
                <i class='bx bx-building-house'></i>
                <h1 class="fs-5">Resident Management</h1>
                <p>
                    This feature allows for the efficient management of resident information within the barangay.
                    It includes functionalities for registering new residents, updating their details, and organizing
                    their records.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-folder-open'></i>
                <h1 class="fs-5">Document Management</h1>
                <p>
                    This feature facilitates the creation, storage, and retrieval of various documents issued by the
                    barangay, such as IDs, clearances, certificates, and other official documents.
                </p>
            </div>
            <div class="feature">
                <i class='bx bxs-megaphone'></i>
                <h1 class="fs-5">Announcement</h1>
                <p>
                    The Announcement feature allows barangay officials to broadcast important information and updates to
                    residents.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-archive'></i>
                <h1 class="fs-5">Request and Complaint Management</h1>
                <p>
                    This feature allows for the efficient management of resident information within the barangay.
                </p>
            </div>
            <div class="feature">
                <i class='bx bx-chart'></i>
                <h1 class="fs-5">Descriptive Analytics</h1>
                <p>The Descriptive Analytics feature offers insights into various aspects of barangay operations by
                    summarizing historical data.</p>
            </div>
            <div class="feature">
                <i class='bx bxs-bot'></i>
                <h1 class="fs-5">Chatbot</h1>
                <p>The Chatbot feature provides an interactive way for residents to get quick responses to common inquiries
                    and navigate the barangay management system.</p>
            </div>
        </div>
    </div>
    <div class="announcements">
        <div class="section-details text-center">
            <h1 class="fs-3 text-center">Latest Announcements</h1>
            <p>Stay Informed with the Latest Updates</p>
            <div class="list">
                <?php if($latestAnnouncements->isNotEmpty()): ?>
                    <div>
                        <ul class="announcement-list-container w-100">
                            <?php $__currentLoopData = $latestAnnouncements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestAnnouncement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="announcement-container">    
                                        <div class="row">
                                            <div class="col-12 col-md-2 text-center mb-3 mb-md-0">
                                                <?php if(!empty($latestAnnouncement->image_path)): ?>
                                                    <img src="<?php echo e(Storage::url($latestAnnouncement->image_path)); ?>" alt="Announcement Image" class="img-fluid">
                                                <?php else: ?>
                                                    <img src="/images/barangaylogo.png" alt="Announcement Image" style="width: 150px" class="img-fluid">
                                                <?php endif; ?>
                                            </div>  
                                            <div class="col-12 col-md-10 text-start">
                                                <p class="announcement_title" style="font-weight: bold; font-style: 16px; color:#6D4C41"><?php echo e($latestAnnouncement->title); ?></p>
                                                <p style="font-size: 14px"><i class='bx bxs-calendar-check'></i><?php echo e(\Carbon\Carbon::parse($latestAnnouncement->created_at)->format('F j, Y')); ?></p>
                                                <p class="announcement_content" style="font-weight: 400"><?php echo e(Str::words(strip_tags($latestAnnouncement->content), 60, '...')); ?></p>
                                                <?php if (isset($component)) { $__componentOriginale60fdc5b62bd08f4911356f87728776c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale60fdc5b62bd08f4911356f87728776c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.modal.view-announcement-user','data' => ['announcement' => $latestAnnouncement,'modalId' => ''.e($latestAnnouncement->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.modal.view-announcement-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['announcement' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestAnnouncement),'modalId' => ''.e($latestAnnouncement->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale60fdc5b62bd08f4911356f87728776c)): ?>
<?php $attributes = $__attributesOriginale60fdc5b62bd08f4911356f87728776c; ?>
<?php unset($__attributesOriginale60fdc5b62bd08f4911356f87728776c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale60fdc5b62bd08f4911356f87728776c)): ?>
<?php $component = $__componentOriginale60fdc5b62bd08f4911356f87728776c; ?>
<?php unset($__componentOriginale60fdc5b62bd08f4911356f87728776c); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" style="background: transparent; color:black; border:none;" data-bs-toggle="modal" data-bs-target="#<?php echo e($latestAnnouncement->id); ?>">View Details</button>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="no-announcements-container text-center">
                        <img class="no_announcements" src="/images/undraw_Empty_re_opql.png" alt="">
                        <p>No announcements available at this time.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.querySelector('.toast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.user-components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/user/home.blade.php ENDPATH**/ ?>