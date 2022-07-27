<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('data-page-id', 'users'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category admin_shared">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Users</h2> <hr />
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                <?php if(count($users)): ?>
                    <table class="hover unstriped">
                        <thead>
                        <tr><th>User</th><th>Name</th><th>Email</th><th>Role</th></tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user['username']); ?></td>
                                <td><?php echo e($user['fullname']); ?></td>
                                <td><?php echo e($user['email']); ?></td>
                                <td><?php echo e($user['role']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>There are no users.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/details/users.blade.php ENDPATH**/ ?>