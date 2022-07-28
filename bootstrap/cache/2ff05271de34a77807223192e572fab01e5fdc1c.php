<?php $__env->startSection('title'); ?>
    Categories
    <?php if(isset($category) && $showBreadCrumbs): ?> - <?php echo e($category->name); ?> <?php endif; ?>
    <?php if(isset($subcategory)): ?> - <?php echo e($subcategory->name); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('data-page-id', 'categories'); ?>
<?php $__env->startSection('content'); ?>
    <div class="home">
        <section class="display-products" data-token="<?php echo e($token); ?>" data-urlParams="<?php echo e($urlParams); ?>" id="root">
            <?php if(isset($category) && $showBreadCrumbs): ?>
                <div class="grid-x cell">
                    <nav aria-label="You are here:" role="navigation">
                        <ul class="breadcrumbs">
                            <li><a href="/products/category/<?php echo e($category->slug); ?>">
                                    <?php echo e($category->name); ?></a>
                            </li>
                           <?php if(isset($subcategory)): ?>
                                <li>
                                        <?php echo e($subcategory->name); ?>

                                </li>
                           <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <?php else: ?>
                    <h2>Categories</h2>
            <?php endif; ?>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="small-12 cell" v-cloak v-for="product in products">
                    <a :href="'/product/' + product.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                                <img :src="'/' + product.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    {{ stringLimit(product.name, 18) }}
                                </p>
                                <a :href="'/product/' + product.id" class="button more expanded">
                                    See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart expanded">
                                    ${{ product.price }} - Add to cart
                                </button>
                                <button v-else class="button cart expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                <h2 v-if="products.length === 0">No product in this category.</h2>
            </div>
            <div class="text-center">
                <i v-show='loading' class="fa-solid fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top: 60%; bottom:20%; color: #0a2b12;"></i>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/categories.blade.php ENDPATH**/ ?>