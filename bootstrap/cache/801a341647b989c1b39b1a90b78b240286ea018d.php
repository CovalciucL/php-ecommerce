<?php if(isset($detail['product'])): ?>
    <div class="col-md-2 mt-3">
        <img src="/<?php echo e($detail['product']['image_path']); ?>"
                 alt="<?php echo e($detail['product']['name']); ?>" height="50" width="50" >
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0"><?php echo e($detail['product']['name']); ?></p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0 small"><?php echo e($detail['quantity']); ?></p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0 small"><?php echo e($detail['total']); ?></p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
          <p class="text-muted mb-0 small"><?php echo e($detail['status']); ?></p>
    </div>
    <hr class="mt-3">
<?php endif; ?><?php /**PATH /var/www/html/resources/views/admin/details/items.blade.php ENDPATH**/ ?>