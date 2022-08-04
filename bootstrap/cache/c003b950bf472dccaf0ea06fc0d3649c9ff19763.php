<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/all.css">
    <script src="https://kit.fontawesome.com/a7178e0ca6.js" crossorigin="anonymous"></script>
</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
    <?php echo $__env->yieldContent('body'); ?>
    <script src="/js/all.js"></script>
    <script src="/js/ecommerce.js"></script>
    <?php echo $__env->yieldContent('stripe-checkout'); ?>
    <?php echo $__env->yieldContent('paypal-checkout'); ?>
</body>
</html><?php /**PATH /var/www/html/resources/views/layouts/base.blade.php ENDPATH**/ ?>