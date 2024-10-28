<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => true, 'icon' => '', 'showIcon' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active' => true, 'icon' => '', 'showIcon' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<li <?php echo e($attributes(['class' => $active ? 'link_name active' : 'link_name'])); ?>>
    <div <?php echo e($attributes(['class' => $active ? 'line active' : 'line'])); ?>></div>
    <a <?php echo e($attributes(['class' => $active ? 'link_name active' : 'link_name'])); ?>>
        <i class="<?php echo e($icon); ?>"></i>
        <span class="link_name"><?php echo e($slot); ?></span>
        <?php if($showIcon == 'true'): ?>
            <div class="position-absolute fs-4 d-flex" style="right: 20px">
                <i class='bx bx-chevron-down arrow'></i>
            </div>
        <?php endif; ?>
    </a>
</li>


<?php /**PATH E:\bms\resources\views/components/admin-components/navbar/admin-navbar-link.blade.php ENDPATH**/ ?>