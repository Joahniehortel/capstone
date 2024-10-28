
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['modalId', 'announcement']));

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

foreach (array_filter((['modalId', 'announcement']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<style>
    .announcement_image{
        width: 150px;
    }
</style>
<div class="modal fade" id="<?php echo e($modalId); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="<?php echo e($modalId); ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ANNOUNCEMENT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="announcement-logo text-center mb-4">
                    <img class="barangay_logo mb-3" src="/images/dc.png" alt="" style="width: 100px" class="mb-4">
                    <div class="details" style="line-height: 0.3">
                    <div class="details" style="line-height: 0.3">
                        <p>Republic of the Philippines</p>
                        <p>Province of Davao del Sur</p>    
                        <p>Municipality of Davao City</p>
                        <strong style="font-weight: 500">Barangay 8-A Poblacion District</strong>
                    </div>
                </div>
                <div class="text-start mt-5 mb-3">
                    <h1 class="text-center" style="font-size: 24px"><?php echo e($announcement->title); ?></h1>
                    <div class="d-flex justify-content-center">
                        <img class="announcement_image" src="<?php echo e(Storage::url($announcement->image_path)); ?>" alt="Supporting File" style="width: 500px; height:250px" />
                    </div>
                    <p><?php echo $announcement->content; ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\bms\resources\views/components/admin-components/modal/view-announcement-user.blade.php ENDPATH**/ ?>