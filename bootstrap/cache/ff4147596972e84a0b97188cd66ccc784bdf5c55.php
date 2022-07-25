<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="site_wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        <div class="notify text-center">
            
        </div>
    </div>
    <?php echo $__env->yieldContent('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>