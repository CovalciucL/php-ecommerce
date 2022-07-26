<?php $__env->startSection('title','Product Category'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>
    
<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Product Categories</h2>
                <hr>
            </div>
        </div>
        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
                <form action="/public/admin/product/categories" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="small-12 medium-5 end cell">
                <form action="/public/admin/product/categories" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name">
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>"/>
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                <?php if(count($categories)): ?>
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th width="50">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['name']); ?></td>
                                    <td><?php echo e($category['slug']); ?></td>
                                    <td><?php echo e($category['added']); ?></td>
                                    <td width="50" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Add Subcategory">
                                            <a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class="fa-solid fa-plus"></i></a>
                                        </span>
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Category">
                                            <a data-open="item-<?php echo e($category['id']); ?>"><i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                        <span style="display: inline-flex" data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Delete Category">
                                            <form action="/public/admin/product/categories/<?php echo e($category['id']); ?>/delete" method="POST" class="delete-item">
                                               <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>"/>
                                               <button type="submit"><i class="fa-solid fa-xmark delete"></i></button>
                                            </form>
                                        </span>
                                        
                                        <div class="reveal" id="item-<?php echo e($category['id']); ?>" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="item-name-<?php echo e($category['id']); ?>" type="text" value="<?php echo e($category['name']); ?>" name="name">
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button update-category" 
                                                        name="token" 
                                                        data-token="<?php echo e(\App\Classes\CSRFToken::token()); ?>" 
                                                        id="<?php echo e($category['id']); ?>" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        
                                        <div class="reveal" id="add-subcategory-<?php echo e($category['id']); ?>" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="subcategory-name-<?php echo e($category['id']); ?>" type="text">
                                                    <input type="hidden"/>
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button add-subcategory" 
                                                        name="token" 
                                                        data-token="<?php echo e(\App\Classes\CSRFToken::token()); ?>" 
                                                        id="<?php echo e($category['id']); ?>" value="Create">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>You have not created any category</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="subcategory">
        <div class="grid-x grid-padding-x">
           <div class="cell medium-11">
                <h2>Subcategories</h2>
                <hr>
           </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="small11-12 medium-11 cell">
                <?php if(count(\App\Models\SubCategory::all())): ?>
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>   
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th width="70">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($subcategory['name']); ?></td>
                                    <td><?php echo e($subcategory['slug']); ?></td>
                                    <td><?php echo e($subcategory['added']); ?></td>
                                    <td width="70" class="text-right">
                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Edit Subcategory">
                                            <a data-open="item-subcategory-<?php echo e($subcategory['id']); ?>"><i class="fa-solid fa-pencil"></i></a>
                                        </span>
                                        <span style="display: inline-flex" data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Delete Subcategory">
                                            <form action="/public/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete" method="POST" class="delete-item">
                                               <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>"/>
                                               <button type="submit"><i class="fa-solid fa-xmark delete"></i></button>
                                            </form>
                                        </span>
                                        
                                        <div class="reveal" id="item-subcategory-<?php echo e($subcategory['id']); ?>" data-reveal data-animation-in="scale-in-up">
                                            <div class="notification callout primary">
                                            </div>
                                            <h2>Edit Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="item-subcategory-name-<?php echo e($subcategory['id']); ?>" type="text" value="<?php echo e($subcategory['name']); ?>">
                                                    <label> 
                                                        <select id="item-category-<?php echo e($subcategory['category_id']); ?>">
                                                            <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($category->id == $subcategory['category_id']): ?>
                                                                    <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                <?php endif; ?>
                                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </label>
                                                    <div>
                                                        <input 
                                                        type="submit" 
                                                        class="button update-subcategory" 
                                                        data-category-id="<?php echo e($subcategory['category_id']); ?>" 
                                                        data-token="<?php echo e(\App\Classes\CSRFToken::token()); ?>" 
                                                        id="<?php echo e($subcategory['id']); ?>" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/public/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $subcategories_links; ?>

                <?php else: ?>
                    <h2>You have not created any subcategory</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/products/categories.blade.php ENDPATH**/ ?>