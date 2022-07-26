
<?php $__env->startSection('title', 'Product Orders'); ?>
<?php $__env->startSection('data-page-id', 'adminOrders'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category ">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Product Orders</h2> <hr />
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                <?php if(isset($orders) && count($orders)): ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_no => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h4>Order Number: <?php echo e($order_no); ?></h4>
                        <table class="hover">
                            <tr><td><strong>Customer Name:</strong> &nbsp; <?php echo e($details['customer']['fullname']); ?></td></tr>
                            <tr><td><strong>Address:</strong> &nbsp; <?php echo e($details['customer']['address']); ?></td></tr>
                            <tr><td><strong>Order Date:</strong> &nbsp; <?php echo e($details['when']); ?></td></tr>
                            <tr><td><strong>Total:</strong> &nbsp; $<?php echo e($details['total']); ?></td></tr>
                            <tr>
                                <td>
                                    <h4>Items</h4>
                                    <table>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Product Name</th>
                                            <th width="5%">Qty</th>
                                            <th width="10%">Unit Price</th>
                                            <th width="10%">Total</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                        <?php echo $__env->renderEach('admin.details.items', $details, 'detail'); ?>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>You have not made any sales.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/details/orders.blade.php ENDPATH**/ ?>