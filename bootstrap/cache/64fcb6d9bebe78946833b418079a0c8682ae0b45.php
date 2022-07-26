<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<header class="navigation">
  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="main-menu"></button>
    <a href="/public/" class="title-bar-title">Store</a>
  </div>

  <div class="top-bar" id="main-menu">
    <div class="top-bar-title show-for-medium">
      <a href="/public/" class="logo">Store</a>
  </div>
    <div class="top-bar-left">
      <ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu>
        <li><a href="/public/products">Products</a></li>
        <?php if(count($categories)): ?>
          <li>
              <a href="/public/products/category">Categories</a>
              <ul class="menu vertical dropdown">
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                          <a href="/public/products/category/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a>
                          <?php if(count($category->subCategories)): ?>
                              <ul class="menu vertical">
                                  <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li>
                                          <a href="/public/products/category/<?php echo e($category->slug); ?>/<?php echo e($subCategory->slug); ?>">
                                              <?php echo e($subCategory->name); ?>

                                          </a>
                                      </li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                          <?php endif; ?>
                      </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </li>
      <?php endif; ?>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="dropdown menu vertical medium-horizontal">
        <?php if(isAuthenticated()): ?> 
          <li><a href="#"><?php echo e(user()->username); ?>  </a></li>
          <li>
            <a href="/public/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
          <li><a href="/public/logout">Logout</a></li>
        <?php else: ?>
          <li>
            <a href="/public/login">Sign In</a>
          </li>
          <li>
            <a href="/public/register">Register</a>
          </li>
          <li>
            <a href="/public/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</header><?php /**PATH /var/www/html/resources/views/includes/nav.blade.php ENDPATH**/ ?>