<style>
    .btn{
        border-radius: 0px;
        font-size: 14px;
    }
</style>
<div class="modal fade" id="addDocument" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Document</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.document.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row-md-6">
                        <div class="col">
                            <label for="file_name" class="col-form-label">Document name</label>
                            <input class="form-control" type="text" id="file_name"
                                name="file_name">
                        </div>
                    </div>
                    <div class="row-md-6">
                        <label for="file_details" class="col-form-label">Document details</label>
                        <textarea class="form-control" name="file_details" id="file_details" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Document</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\bms\resources\views/components/admin-components/modal/add-document.blade.php ENDPATH**/ ?>