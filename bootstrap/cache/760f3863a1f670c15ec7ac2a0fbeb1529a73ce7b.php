
<?php $__env->startSection('title', 'Product Orders'); ?>
<?php $__env->startSection('data-page-id', 'adminOrders'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category ">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Product Orders</h2> <hr />
            </div>
        </div>
        <section class="h-100">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <?php if(isset($orders) && count($orders)): ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_no => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-3">
                      <h5 class="text-muted mb-0">Customer Name: <span><?php echo e($details['customer']['fullname']); ?></span></h5>
                    </div>
                    <div class="card-body p-4">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="small text-muted mb-0">Order Number : <?php echo e($order_no); ?></p>
                      </div>
                      <h2>Items</h2>
                      <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    Image
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Name
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Quantity
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Subtotal
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    Status
                                </div>
                            </div>
                          <div class="row">
                            <?php echo $__env->renderEach('admin.details.items', $details, 'detail'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between pt-2">
                        <p class="fw-bold mb-0">Order Details</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $<?php echo e($details['total']); ?></p>
                      </div>
                      <div class="d-flex justify-content-between pt-2">
                        <p class="text-muted mb-0">Address : <?php echo e($details['customer']['address']); ?></p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Order Date : <?php echo e($details['when']); ?></p>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php echo $links; ?>

                  <?php else: ?>
                      <h2>You have not made any sales.</h2>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/details/orders.blade.php ENDPATH**/ ?>