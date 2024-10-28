<div class="modal fade" id="changePassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="change-password text-center">
                    <h4>Change your password</h4>
                    <p>Your password must contain a minimum of 8 characters.</p>
                    <form action="">
                        <div class="row-md-6">
                            <form action="<?php echo e(route('admin.changepass')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input class="form-control mb-3" type="password" name="current_pass" placeholder="Current password">
                                <input class="form-control mb-3" type="password" name="new_password" placeholder="New password">
                                <input class="form-control mb-3" type="password" name="confirm_password" placeholder="Confirm new password">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#adminProfile" data-bs-toggle="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php /**PATH E:\bms\resources\views/components/admin-components/modal/admin-change-password.blade.php ENDPATH**/ ?>