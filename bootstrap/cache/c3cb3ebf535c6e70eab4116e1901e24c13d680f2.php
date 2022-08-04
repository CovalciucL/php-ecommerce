<?php $__env->startSection('title', 'Login to Your Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="login_form">
            <div class="container-sm">
                <h2 class="text-center">
                    Login
                </h2>
                <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="/login" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Your Username or Email" value="<?php echo e(\App\Classes\Request::old('post','username')); ?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>">
                    <button class="btn btn-primary float-end">Login</button>
                </form>
            <p>Don't have an account? <a href="/register">Register Here</a></p>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/login.blade.php ENDPATH**/ ?>