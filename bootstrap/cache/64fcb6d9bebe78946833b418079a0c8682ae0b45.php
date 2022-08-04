<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<nav class="navbar navbar-expand-lg sticky-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="text-white">Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        <?php if(count($categories)): ?>
        <li class="nav-item">
          <div class="dropdown show">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <span></span>
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="dropdown-submenu">
                <a class="dropdown-item nav-link" href="/products/category/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a>
                <span class="dropdown-toggle"></span>
                <?php if(count($category->subCategories)): ?>
                  <ul class="dropdown-menu bg-dark">
                    <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="dropdown-item">
                            <a class="nav-link" href="/products/category/<?php echo e($category->slug); ?>/<?php echo e($subCategory->slug); ?>">
                                <?php echo e($subCategory->name); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php else: ?>
                <ul class="dropdown-menu bg-dark">
                  <li class="nav-link">
                    No Subcategory Yet
                  </li>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if(isAuthenticated()): ?> 
        <li class="nav-item">
          <a class="nav-link" href="/admin"><?php echo e(user()->username); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart<i class="fa-solid fa-cart-shopping"></i> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/login">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart<i class="fa-solid fa-cart-shopping"></i></a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav><?php /**PATH /var/www/html/resources/views/includes/nav.blade.php ENDPATH**/ ?>