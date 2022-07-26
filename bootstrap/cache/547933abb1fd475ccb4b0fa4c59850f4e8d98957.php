<?php $__env->startSection('title','Edit Product'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>
    
<?php $__env->startSection('content'); ?>
    <div class="add-product">
        <div class="grid-x">
            <div class="cell medium-11">
                <h2>Edit <?php echo e($product->name); ?></h2>
                <hr>
            </div>
        </div>
        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11">
                <table data-form="deleteForm">
                    <tr >
                        <td style="border:1px solid white;">
                            <form action="/admin/product/<?php echo e($product->id); ?>/delete" method="POST" class="delete-item">
                                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>"/>
                                <button type="submit" class="button alert">Delete Product</button>
                             </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <form action="/admin/product/edit" method="POST" enctype="multipart/form-data">
            <div class="small-12 medium-11">
                <div class="grid-x grid-padding-x">
                    <div class="small-12 medium-6 cell">
                        <label>Product name:</label>
                            <input type="text" name="name" value="<?php echo e(\App\Classes\Request::old('post','name')?:$product->name); ?>">
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product price:</label>
                            <input type="text" name="price" value="<?php echo e(\App\Classes\Request::old('post','price')?:$product->price); ?>">
                    </div>
                    
                    <div class="small-12 medium-6 cell">
                        <label>Product Category:</label>
                            <select name="category" id="product-category">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(\App\Classes\Request::old('post','category') == $category->id || $category->id == $product->category->id ?'selected':''); ?> 
                                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Subcategory:</label>
                            <select name="subcategory" id="product-subcategory">
                            </select>
                    </div>
                    <div class="small-12 medium-6 cell">
                        <label>Product Quantity:</label>
                            <select name="quantity">
                                <option value="<?php echo e(\App\Classes\Request::old('post','quantity')?:$product->quantity); ?>">
                                    <?php echo e(\App\Classes\Request::old('post','quantity')?:$product->quantity); ?>

                                </option>
                                <?php for($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo e($i); ?>">
                                        <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
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
                        <label for="descriptyion">Description:</label>
                            <textarea name="description" placeholder="Description"><?php echo e(\App\Classes\Request::old('post','description')?:$product->description); ?></textarea>
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>">
                        <input type="hidden" name="product_id" value="<?php echo e($product_id?:$product->id); ?>">
                        <input class="button warning float-right mt-5" type="submit" value="Update Product">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>