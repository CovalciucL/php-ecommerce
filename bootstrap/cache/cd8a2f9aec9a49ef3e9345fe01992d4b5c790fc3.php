<?php $__env->startSection('title','Create Product'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>
    
<?php $__env->startSection('content'); ?>
    <div class="add-product">
        <div class="grid-x">
            <div class="cell medium-11">
                <h2>Add Inventory Item</h2>
                <hr>
            </div>
        </div>
        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="/public/admin/product/create" method="POST" enctype="multipart/form-data">
            <div class="small-12 medium-11">
                <div class="grid-x grid-padding-x">
                    <div class="small-12 medium-6 cell">
                        <label>Product name:
                            <input type="text" name="name" placeholder="Product name" value="<?php echo e(\App\Classes\Request::old('post','name')); ?>">
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product price:
                            <input type="text" name="price" placeholder="Product price" value="<?php echo e(\App\Classes\Request::old('post','price')); ?>">
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Category:
                            <select name="category" id="product-category">
                                <option value="<?php echo e(\App\Classes\Request::old('post','category')?:""); ?>">
                                    <?php echo e(\App\Classes\Request::old('post','category')?:"Select Category"); ?>

                                </option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Subcategory:
                            <select name="subcategory" id="product-subcategory">
                                <option value="<?php echo e(\App\Classes\Request::old('post','subcategory')?:""); ?>">
                                    <?php echo e(\App\Classes\Request::old('post','subcategory')?:"Select Subcategory"); ?>

                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Quantity:
                            <select name="quantity">
                                <option value="<?php echo e(\App\Classes\Request::old('post','quantity')?:""); ?>">
                                    <?php echo e(\App\Classes\Request::old('post','quantity')?:"Select Quantity"); ?>

                                </option>
                                <?php for($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo e($i); ?>">
                                        <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                        </label>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <br>
                        <div class="input-group">
                            <span class="input-group-label">
                                Product Image:
                            </span>
                            <input type="file" name="productImage" class="input-group-field">
                        </div>
                    </div>
                    <div class="small-12 cell">
                        <label for="descriptyion">Description:
                            <textarea name="description" placeholder="Description"><?php echo e(\App\Classes\Request::old('post', 'description')); ?></textarea>
                        </label>
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>">
                        <button class="button alert" type="reset">
                            Reset
                        </button>
                        <input class="button success float-right" type="submit" value="Save Product">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/products/create.blade.php ENDPATH**/ ?>