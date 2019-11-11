<?php $__env->startSection('main'); ?>

    <section id="form-login"><!--form-->
        <div class="container">
            <div class="row">
                <h2 class="title text-center"><?php echo e($title); ?></h2>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2><?php echo e(trans('account.title_login')); ?></h2>
                        <form action="<?php echo e(route('postLogin')); ?>" method="post"  class="box">
                            <?php echo csrf_field(); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="control-label"><?php echo e(trans('account.email')); ?></label>
                                    <input class="is_required validate account_input form-control <?php echo e(($errors->has('email'))?"input-error":""); ?>"   type="text" name="email" value="<?php echo e(old('email')); ?>" >
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('email')); ?>

                                            </span>
                                        <?php endif; ?>

                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="control-label"><?php echo e(trans('account.password')); ?></label>
                                    <input class="is_required validate account_input form-control <?php echo e(($errors->has('password'))?"input-error":""); ?>"   type="password"  name="password" value="" >
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('password')); ?>

                                            </span>
                                        <?php endif; ?>

                            </div>
                        <p class="lost_password form-group">
                            <a class="btn btn-link" href="<?php echo e(route('forgot')); ?>">
                                <?php echo e(trans('account.password_forgot')); ?>

                            </a>
                            <br>
                        </p>
                            <button type="submit" name="SubmitLogin" class="btn btn-default"><?php echo e(trans('account.login')); ?></button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2><?php echo e(trans('account.title_register')); ?></h2>
                        <form action="<?php echo e(route('postRegister')); ?>" method="post"  class="box">
                            <?php echo csrf_field(); ?>

                <div class="form_content <?php echo e((old('check_red'))?'in':''); ?>" id="collapseExample">
                    <div class="form-group<?php echo e($errors->has('reg_first_name') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_first_name'))?"input-error":""); ?>"   name="reg_first_name" placeholder="<?php echo e(trans('account.first_name')); ?>" value="<?php echo e(old('reg_first_name')); ?>">
                        <?php if($errors->has('reg_first_name')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_first_name')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo e($errors->has('reg_last_name') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_last_name'))?"input-error":""); ?>"   name="reg_last_name" placeholder="<?php echo e(trans('account.last_name')); ?>" value="<?php echo e(old('reg_last_name')); ?>">
                        <?php if($errors->has('reg_last_name')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_last_name')); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('reg_email') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_email'))?"input-error":""); ?>"   name="reg_email" placeholder="<?php echo e(trans('account.email')); ?>" value="<?php echo e(old('reg_email')); ?>">
                        <?php if($errors->has('reg_email')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_email')); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('reg_phone') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_phone'))?"input-error":""); ?>"   name="reg_phone" placeholder="<?php echo e(trans('account.phone')); ?>" value="<?php echo e(old('reg_phone')); ?>">
                        <?php if($errors->has('reg_phone')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_phone')); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('reg_address1') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_address1'))?"input-error":""); ?>"   name="reg_address1" placeholder="<?php echo e(trans('account.address1')); ?>" value="<?php echo e(old('reg_address1')); ?>">
                        <?php if($errors->has('reg_address1')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_address1')); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('reg_address2') ? ' has-error' : ''); ?>">
                        <input  type="text" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_address2'))?"input-error":""); ?>"   name="reg_address2" placeholder="<?php echo e(trans('account.address2')); ?>" value="<?php echo e(old('reg_address2')); ?>">
                        <?php if($errors->has('reg_address2')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_address2')); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('reg_country') ? ' has-error' : ''); ?>">
                            <select class="form-control reg_country" style="width: 100%;" name="reg_country" >
                                <option>__<?php echo e(trans('account.country')); ?>__</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php echo e((old('reg_country') ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                <?php if($errors->has('reg_country')): ?>
                                    <span class="help-block">
                                        <?php echo e($errors->first('reg_country')); ?>

                                    </span>
                                <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('reg_password') ? ' has-error' : ''); ?>">
                        <input  type="password" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_password'))?"input-error":""); ?>"   name="reg_password" placeholder="<?php echo e(trans('account.password')); ?>" value="">
                        <?php if($errors->has('reg_password')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_password')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo e($errors->has('reg_password_confirmation') ? ' has-error' : ''); ?>">
                        <input type="password" class="is_required validate account_input form-control <?php echo e(($errors->has('reg_password_confirmation'))?"input-error":""); ?>"  placeholder="<?php echo e(trans('account.password_confirm')); ?>" name="reg_password_confirmation" value="">
                        <?php if($errors->has('reg_password_confirmation')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('reg_password_confirmation')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="check_red" value="1">
                    <div class="submit">
                        <button type="submit" name="SubmitCreate" class="btn btn-default"><?php echo e(trans('account.signup')); ?></button>
                    </div>
                </div>

                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="active"><?php echo e($title); ?></li>
        </ol>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.'.sc_store('template').'.shop_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\s-cart\resources\views/templates/default/shop_login.blade.php ENDPATH**/ ?>