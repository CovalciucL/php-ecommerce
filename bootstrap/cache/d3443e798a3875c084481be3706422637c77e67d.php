<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('data-page-id', 'adminDashboard'); ?>
    
<?php $__env->startSection('content'); ?>

    <div class="dashboard">
        <div class="grid-x" data-equilizer data-equilizer-on="medium">
            
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="small-9 cell">
                            <p>Total Orders</p>
                            <h4><?php echo e($orders); ?></h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/admin/orders">Order Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-temperature-empty"></i>
                        </div>
                        <div class="small-9 cell ">
                            <p>Stock</p><h4><?php echo e($products); ?></h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/admin/products">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="small-9 cell ">
                            <p>Revenue</p>
                            <h4>$<?php echo e(number_format($payments,2)); ?></h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/admin/payments">Payment Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="small-12 medium-3 cell summary" data-equilizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="small-3 cell">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="small-9 cell">
                            <p>Users</p>
                            <h4><?php echo e($users); ?></h4>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="grid-x cell">
                            <a href="/admin/users">Registred Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-x cell">
            <div class="small-12 medium-6 cell monthly-sales">
                <div class="card">
                    <div class="card-section">
                        <h4>Monthly Orders</h4>
                        <canvas id="order"></canvas>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-6 cell monthly-sales">
                <div class="card">
                    <div class="card-section">
                        <h4>Monthly Revenue</h4>
                        <canvas id="revenue"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>