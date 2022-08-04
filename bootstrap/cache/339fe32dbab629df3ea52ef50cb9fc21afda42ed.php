<?php $__env->startSection('title'); ?> <?php echo e($product->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('data-page-id','product'); ?>
<?php $__env->startSection('content'); ?>
    <div class="product" id="product" data-token="<?php echo e($token); ?>" data-id="<?php echo e($product->id); ?>">
        <div class="position-fixed top-50 start-50">
            <div v-show='loading' class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <section class="item-container mt-3 mb-5" v-cloak v-if="loading == false">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a :href="'/products/category/' + category.slug">{{ category.name }}</a>
                    </li>
                    <li class="breadcrumb-item">
                    <a :href="'/products/category/' + category.slug + '/' + subCategory.slug">{{ subCategory.name }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{product.name}}</li>
                </ol>
            </nav>
            <div class="d-flex mt-5 product-info container">
                <img :src="'/' + product.image_path">
                <div>
                    <div class="product-details ">
                        <h2>{{product.name}}</h2>
                        <p>{{product.description}}</p>
                        <h2>${{product.price}}</h2>
                        <div class="d-grid mt-5">
                            <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="btn btn-danger">
                                ${{product.price}} - Add to cart
                            </button>
                            <button v-else class="btn btn-danger" disabled>
                                Out of Stock
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5" v-if="loading == false">
            <div class="display-products">
                <h2 class="mt-5">Similar Products</h2>
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    <div class="block" v-cloak v-for="similar in similarProducts">
                        <div class="card p-3 d-flex flex-column align-items-center">
                            <img :src="'/' + similar.image_path" width="100%" height="200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{stringLimit(similar.name, 18)}}</h5>
                                <div class="d-flex flex-column">
                                    <a class="btn btn-outline-success mb-2" :href="'/product/' + similar.id" class="">
                                    See More
                                    </a>
                                    <button v-if="similar.quantity > 0" @click.prevent="addToCart(similar.id)" class="btn btn-danger">
                                        ${{similar.price}} - Add to cart
                                    </button>
                                    <button v-else disabled class="btn btn-danger">
                                        Out of Stock
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/product.blade.php ENDPATH**/ ?>