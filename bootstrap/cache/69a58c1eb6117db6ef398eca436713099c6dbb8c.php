<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" href="/public/css/all.css">
    <script src="https://kit.fontawesome.com/a7178e0ca6.js" crossorigin="anonymous"></script>
</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
    <?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="off-canvas-content admin_title_bar" data-off-canvas-content>
        <div class="title-bar">
            <div class="title-bar-left">
              <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
              <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
            </div>
          </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="/public/js/all.js"></script>
</body>
</html><?php /**PATH /var/www/html/resources/views/admin/layout/base.blade.php ENDPATH**/ ?>