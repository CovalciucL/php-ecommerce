
<?php $__env->startSection('title', 'Payments'); ?>
<?php $__env->startSection('data-page-id', 'adminPayments'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Payments</h2> <hr />
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                <?php if(count($payments)): ?>
                    <table class="hover unstriped">
                        <thead>
                        <tr><th>Customer</th><th>Amount</th><th>Order No</th><th>Item Count</th><th width="70">Status</th><th>Date Created</th></tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($payment['customer']['fullname']); ?></td>
                                <td><?php echo e($payment['amount']); ?></td>
                                <td><?php echo e($payment['order_no']); ?></td>
                                <td><?php echo e($payment['item_count']); ?></td>
                                <td><?php echo e($payment['status']); ?></td>
                                <td><?php echo e($payment['added']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>You have not sold any product.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/details/payments.blade.php ENDPATH**/ ?>