<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <div class="col-lg-12">
                    <div class="text-center mb-4">
                        <h1 class="h4 text-gray-900"><b>Register SIMRS</b></h1>
                    </div>
                    <img src="<?php echo e(asset('template/img/karuna.png')); ?>" alt="Login Image" class="img-fluid rounded">
                </div>

                <!-- Form login -->
                <div class="col-lg-12">
                    <div class="card-body">
                        <!-- Error Message -->
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <form class="user" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name"
                                aria-describedby="name" placeholder="Enter Full Name..." name="name"
                                value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"
                                value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                placeholder="Password" name="password" required autocomplete="current-password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                    </form>
                </div>
            </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/auth/register.blade.php ENDPATH**/ ?>