<?php $__env->startSection('title','Manage Products'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>
    
<?php $__env->startSection('content'); ?>
    <div class="products">
        <div class="row expanded">
            <div class="column medium-11">
                <h2>Manage Inventory Items</h2>
                <hr>
            </div>
        </div>
        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="row expanded">
            <div class="small-12 medium-11 column">
                <a href="/public/admin/product/create" class="button float-right">
                <i class="fa-solid fa-plus"></i>   
            </a>
            </div>
       </div>
        <div class="row expanded">
            <div class="small-12 medium-11 column">
                <?php if(count($products)): ?>
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Date Created</th>
                                <th width="50">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><img src="/public/<?php echo e($product['image_path']); ?>" alt="<?php echo e($product['name']); ?>" height="40" width="40"></td>
                                    <td><?php echo e($product['name']); ?></td>
                                    <td><?php echo e($product['price']); ?></td>
                                    <td><?php echo e($product['quantity']); ?></td>
                                    <td><?php echo e($product['category_name']); ?></td>
                                    <td><?php echo e($product['sub_category_name']); ?></td>
                                    <td><?php echo e($product['added']); ?></td>
                                    <td width="50" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Product">
                                            <a href="/public/admin/product/<?php echo e($product['id']); ?>/edit">Edit <i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>You have not created any products</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/products/inventory.blade.php ENDPATH**/ ?>