<div class="modal fade" id="adminLogout" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModalLabel">Confirm Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\bms\resources\views/components/admin-components/modal/admin-logout.blade.php ENDPATH**/ ?>