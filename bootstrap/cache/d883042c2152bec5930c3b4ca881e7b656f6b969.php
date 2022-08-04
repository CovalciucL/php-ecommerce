<?php $__env->startSection('title', 'Register Free Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="register_form">
            <div class="container-sm">
                    <h2 class="text-center">
                        Create Account
                    </h2>
                    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="/register" method="POST">
                        <div class="mb-3">
                            <input type="text" name="fullname" class="form-control" placeholder="Your Name" value="<?php echo e(\App\Classes\Request::old('post','fullname')); ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Your Email" value="<?php echo e(\App\Classes\Request::old('post','email')); ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Your Username" value="<?php echo e(\App\Classes\Request::old('post','username')); ?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>
                        <div class="mb-3">
                            <textarea name="address"class="form-control" placeholder="Your address"><?php echo e(\App\Classes\Request::old('post','address')); ?></textarea>
                        </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>">
                    <button class="btn btn-primary float-end">Register</button>
                </form>
                <p>Already Registred? <a href="/login"> Login Here</a></p>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/register.blade.php ENDPATH**/ ?>