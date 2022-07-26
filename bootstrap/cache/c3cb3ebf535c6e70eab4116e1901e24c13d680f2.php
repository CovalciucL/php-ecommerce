<?php $__env->startSection('title', 'Login to Your Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="login_form">
            <div class="grid-x align-center grid-padding-x">
                <div class="small-12 medium-7 medium-centered">
                    <h2 class="text-center">
                        Login
                    </h2>
                    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="/public/login" method="POST">
                    <input type="text" name="username" placeholder="Your Username or Email" value="<?php echo e(\App\Classes\Request::old('post','username')); ?>">
                    <input type="password" name="password" placeholder="Your Password">
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::token()); ?>">
                    <button class="button float-right">Login</button>
                </form>
                <p>Don't have an account? <a href="/public/register">Register Here</a></p>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/login.blade.php ENDPATH**/ ?>