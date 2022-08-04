<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="home">
        <div id="controls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/images/sliders/slide_1.jpg" class="d-block w-100" alt="Slide">
              </div>
              <div class="carousel-item">
                <img src="/images/sliders/slide_2.jpg" class="d-block w-100" alt="Slide">
              </div>
              <div class="carousel-item">
                <img src="/images/sliders/slide_3.jpg" class="d-block w-100" alt="Slide">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#controls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#controls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <section class="display-products mt-5" data-token="<?php echo e($token); ?>" id="root">
            <h2>Featured Products</h2>
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <div class="block" v-cloak v-for="feature in featured">
                    <div class="card p-3 d-flex flex-column align-items-center">
                        <img :src="'/' + feature.image_path" width="100%" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{stringLimit(feature.name, 18)}}</h5>
                            <div class="d-flex flex-column">
                                <a class="btn btn-outline-success mb-2" :href="'/product/' + feature.id" class="">
                                See More
                                </a>
                                <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)" class="btn btn-danger">
                                    ${{feature.price}} - Add to cart
                                </button>
                                <button v-else disabled class="btn btn-danger">
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>All Products</h2>
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <div class="block" v-cloak v-for="product in products">
                    <div class="card p-3 d-flex flex-column align-items-center" data-equalizer-watch>
                        <img :src="'/' + product.image_path" width="100%" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{stringLimit(product.name, 18)}}</h5>
                            <div class="d-flex flex-column">
                                <a class="btn btn-outline-success mb-2" :href="'/product/' + product.id">
                                See More
                                </a>
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="btn btn-danger">
                                    ${{product.price}} - Add to cart
                                </button>
                                <button v-else class="btn btn-danger"disabled>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>