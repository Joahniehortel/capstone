

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/user-css/about.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <?php if (isset($component)) { $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-components.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>ABOUT <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $attributes = $__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__attributesOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b)): ?>
<?php $component = $__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b; ?>
<?php unset($__componentOriginal0432a44ca29adf7be6aba9c7cb09fa6b); ?>
<?php endif; ?>
        <div class="about">
            <div class="about-what">
                <div class="about">
                    <div class="d-flex text-center">
                        <div class="about-image">
                            <img class="about-image" src="/images/undraw_team_work_k80m.png" alt="" style="width: 75%">
                        </div>
                        <div>
                            <h1 class="title text-start">About EBARRIO</h1>
                            <div class="about-text-container align-items-center">
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
                            </div>
                        </div>
                    </div>
                    <div class="about-purpose">
                        <div class="about-residents">
                            <p><strong>EBARRIO </strong>aims to enhance the accessibility and efficiency of
                                barangay services for both officials and residents. It is developed
                                to reduce manual paperwork and minimize delays.
                            </p>
                            <p>
                                Our mission is to build a stronger, more connected community. We envision a barangay where
                                technology bridges the gap between officials and residents, ensuring communication is seamless,
                                information is readily accessible, and every resident feels empowered to actively engage in local
                                governance.
                                Together, we can reshape our barangay into a model of efficiency and inclusivity—a testament to how
                                technology can positively impact our lives. Join us on this journey to elevate barangay governance, one
                                digital step at a time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.user-components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/user/about.blade.php ENDPATH**/ ?>