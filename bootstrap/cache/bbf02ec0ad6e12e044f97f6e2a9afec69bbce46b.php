<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('data-page-id', 'products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="home">
        <section class="display-products" data-token="<?php echo e($token); ?>" id="root">
            <h2>Products</h2>
            <div class="d-flex flex-wrap justify-content-between">
                <div class="block" v-cloak v-for="product in products">
                    <div class="card p-3 d-flex flex-column align-items-center">
                        <img :src="'/' + product.image_path" width="100%" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{stringLimit(product.name, 18)}}</h5>
                            <div class="d-flex flex-column">
                                <a class="btn btn-outline-success mb-2" :href="'/product/' + product.id" class="">
                                See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="btn btn-danger">
                                    ${{product.price}} - Add to cart
                                </button>
                                <button v-else disabled class="btn btn-danger">
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed top-50 start-50">
                <div v-show='loading' class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/products.blade.php ENDPATH**/ ?>